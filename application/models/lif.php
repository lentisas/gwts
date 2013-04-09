<?php
class Lif extends Eloquent{

	public static function create_lif($client_data){
		try{
			//begin transaction;
            DB::connection()->pdo->beginTransaction();

			$inputs = array("reference_number" => $client_data->referenceNumber, 
							"tuc_id" => $client_data->tucId, 
							"tif_id" => $client_data->tifId, 
							"date" => $client_data->date, 
							"total_number_of_logs" => $client_data->totalNumberOfLogs, 
							"contractors_name" => $client_data->contractorsName,
							"lif_details" => $client_data->lifDetails 
							);
			$rules = array("reference_number" => "required|max:128", 
							"tuc_id" => "required|numeric", 
							"tif_id" => "required|numeric", 
							"date" => "required", 
							"total_number_of_logs" => "required|numeric", 
							"contractors_name" => "required|max:128",
							"lif_details" => "required" 
							);

			$validation = MyValidator::validate_user_input($inputs,$rules);
			if($validation->fails())
				return HelperFunction::catch_error(null,false,HelperFunction::format_message($validation->errors->all()));

			$arr = DataHelper::create_audit_entries(HelperFunction::get_user_id());
			$arr["reference_number"] = $client_data->referenceNumber;
			$arr["tuc_id"] = $client_data->tucId;
			$arr["tif_id"] = $client_data->tifId;
			$arr["date"] = $client_data->date;
			$arr["total_number_of_logs"] = $client_data->totalNumberOfLogs;
			$arr["contractors_name"] = $client_data->contractorsName;

			$inserted_record = DataHelper::insert_record('lifs',$arr,'Lif');
			if(!$inserted_record['success'])
				throw new Exception($inserted_record['message']);

			LifDetail::create_lif_details($inserted_record['data']['id'] ,$client_data->lifDetails);

			//commit transaction
            DB::connection()->pdo->commit();
			return $inserted_record;
		}catch(Exception $e){
			DB::connection()->pdo->rollback();
			return HelperFunction::catch_error($e,true,HelperFunction::get_admin_error_msg());
		}
	}

	public static function update_lif($client_data){
		try{
			//begin transaction;
            DB::connection()->pdo->beginTransaction();

			$inputs = array("id" => $client_data->id, 
							"reference_number" => $client_data->referenceNumber, 
							"tuc_id" => $client_data->tucId, 
							"tif_id" => $client_data->tifId, 
							"date" => $client_data->date, 
							"total_number_of_logs" => $client_data->totalNumberOfLogs, 
							"contractors_name" => $client_data->contractorsName,
							"lif_details" => $client_data->lifDetails 
							);
			$rules = array("id" => "required|numeric", 
							"reference_number" => "required|max:128", 
							"tuc_id" => "required|numeric", 
							"tif_id" => "required|numeric", 
							"date" => "required", 
							"total_number_of_logs" => "required|numeric", 
							"contractors_name" => "required|max:128",
							"lif_details" => "required"  
							);

			$validation = MyValidator::validate_user_input($inputs,$rules);
			if($validation->fails())
				return HelperFunction::catch_error(null,false,HelperFunction::format_message($validation->errors->all()));

			$arr = DataHelper::update_audit_entries(HelperFunction::get_user_id());
			$arr["id"] = $client_data->id;
			$arr["reference_number"] = $client_data->referenceNumber;
			$arr["tuc_id"] = $client_data->tucId;
			$arr["tif_id"] = $client_data->tifId;
			$arr["date"] = $client_data->date;
			$arr["total_number_of_logs"] = $client_data->totalNumberOfLogs;
			$arr["contractors_name"] = $client_data->contractorsName;

			$updated_record = DataHelper::update_record('lifs',$arr['id'],$arr,'Lif');
			if(!$updated_record['success'])
				throw new Exception($updated_record['message'],1);

			LifDetail::update_lif_details($client_data->lifDetails);

			//commit transaction
            DB::connection()->pdo->commit();
			return $updated_record;
		}catch(Exception $e){
			DB::connection()->pdo->rollback();
			return HelperFunction::catch_error($e,true,HelperFunction::get_admin_error_msg());
		}
	}

	public static function delete_lif($id){		
		try{

			$deleted_entry = DB::table('lifs')->delete($id);
			return  DataHelper::return_json_data($deleted_entry,true,'Lif has been deleted',1);

		}catch(Exception $e){
			return HelperFunction::catch_error($e,true);
		}
	}

	public static function get_lifs($client_data){
		try{
			$filter_array = array();
			if(array_key_exists("id", $client_data))
				$filter_array["lifs.id"] = $client_data["id"];
			if(array_key_exists("referenceNumber", $client_data))
				$filter_array["lifs.reference_number"] = "%".$client_data["referenceNumber"]."%";
			if(array_key_exists("tucId", $client_data))
				$filter_array["lifs.tuc_id"] = $client_data["tucId"];
			if(array_key_exists("tifId", $client_data))
				$filter_array["lifs.tif_id"] = $client_data["tifId"];

			$query_result = DB::table('lifs')
								->where(function($query) use ($filter_array){				
									$query = DataHelper::filter_data($query,"lifs.id",$filter_array,"int");
									$query = DataHelper::filter_data($query,"lifs.reference_number",$filter_array,"string","like");
									$query = DataHelper::filter_data($query,"lifs.tuc_id",$filter_array,"int");
									$query = DataHelper::filter_data($query,"lifs.tif_id",$filter_array,"int");
								});

			$total = $query_result->count();

			$query_result = $query_result->order_by('lifs.id','desc');

			$paging_result = array_key_exists('page', $client_data) ? 
									HelperFunction::paginate($client_data['page'],$client_data['limit'], $query_result):$query_result;

        	//execute query and specify columns to retrive
			$result = $paging_result->get(
								array("lifs.id",
									"lifs.reference_number",
									"lifs.tuc_id",
									"lifs.tif_id",
									"lifs.date",
									"lifs.total_number_of_logs",
									"lifs.contractors_name")
								);

			$out = array_map(function($data){
						
						$lif_details = LifDetail::get_lif_details($data->id);

						$arr = array();
						$arr["id"] = $data->id;
						$arr["referenceNumber"] = $data->reference_number;
						$arr["tucId"] = $data->tuc_id;
						$arr["tifId"] = $data->tif_id;
						$arr["date"] = HelperFunction::format_date_to_client($data->date);
						$arr["totalNumberOfLogs"] = $data->total_number_of_logs;
						$arr["contractorsName"] = $data->contractors_name;
						$arr["lifDetails"] = $lif_details;
						
						return $arr;
			},$result);

			return HelperFunction::return_json_data($out,true,'record loaded',$total);
		}catch(Exception $e){
			return HelperFunction::catch_error($e,true,HelperFunction::get_admin_error_msg());
		}
	}
}
