<?php
class Tif extends Eloquent{

	public static function create_tif($client_data){
		try{
			//begin transaction;
            DB::connection()->pdo->beginTransaction();

			$inputs = array("reference_number" => $client_data->referenceNumber, 
							"tuc_id" => $client_data->tucId, 
							"forest_district_id" => $client_data->forestDistrictId, 
							"date" => $client_data->date, 
							"range_supervisors_name" => $client_data->rangeSupervisorsName, 
							"contractors_name" => $client_data->contractorsName, 
							);
			$rules = array("reference_number" => "required|max:128", 
							"tuc_id" => "required|numeric", 
							"forest_district_id" => "required|numeric", 
							"date" => "required", 
							"range_supervisors_name" => "required|max:128", 
							"contractors_name" => "required|max:128", 
							);

			$validation = MyValidator::validate_user_input($inputs,$rules);
			if($validation->fails())
				return HelperFunction::catch_error(null,false,HelperFunction::format_message($validation->errors->all()));

			$arr = DataHelper::create_audit_entries(HelperFunction::get_user_id());
			$arr["reference_number"] = $client_data->referenceNumber;
			$arr["tuc_id"] = $client_data->tucId;
			$arr["forest_district_id"] = $client_data->forestDistrictId;
			$arr["date"] = $client_data->date;
			$arr["range_supervisors_name"] = $client_data->rangeSupervisorsName;
			$arr["contractors_name"] = $client_data->contractorsName;

			$inserted_record = DataHelper::insert_record('tifs',$arr,'Tif');
			if(!$inserted_record['success'])
				throw new Exception($inserted_record['message']);

			TifDetail::create_tif_detail($inserted_record['data']['id'], $client_data->tifDetails);

			//commit transaction
            DB::connection()->pdo->commit();

			return $inserted_record;
		}catch(Exception $e){
			DB::connection()->pdo->rollback();
			return HelperFunction::catch_error($e,true,HelperFunction::get_admin_error_msg());
		}
	}

	public static function update_tif($client_data){
		try{
			//begin transaction;
            DB::connection()->pdo->beginTransaction();

			$inputs = array("id" => $client_data->id, 
				"reference_number" => $client_data->referenceNumber, 
				"tuc_id" => $client_data->tucId, 
				"forest_district_id" => $client_data->forestDistrictId, 
				"date" => $client_data->date, 
				"range_supervisors_name" => $client_data->rangeSupervisorsName, 
				"contractors_name" => $client_data->contractorsName, 
				);
			$rules = array("id" => "required|numeric", 
				"reference_number" => "required|max:128", 
				"tuc_id" => "required|numeric", 
				"forest_district_id" => "required|numeric", 
				"date" => "required", 
				"range_supervisors_name" => "required|max:128", 
				"contractors_name" => "required|max:128", 
				);

			$validation = MyValidator::validate_user_input($inputs,$rules);
			if($validation->fails())
				return HelperFunction::catch_error(null,false,HelperFunction::format_message($validation->errors->all()));

			$arr = DataHelper::update_audit_entries(HelperFunction::get_user_id());
			$arr["id"] = $client_data->id;
			$arr["reference_number"] = $client_data->referenceNumber;
			$arr["tuc_id"] = $client_data->tucId;
			$arr["forest_district_id"] = $client_data->forestDistrictId;
			$arr["date"] = $client_data->date;
			$arr["range_supervisors_name"] = $client_data->rangeSupervisorsName;
			$arr["contractors_name"] = $client_data->contractorsName;

			$updated_record = DataHelper::update_record('tifs',$arr['id'],$arr,'Tif');
			if(!$updated_record['success'])
				throw new Exception($updated_record['message'],1);

			//commit transaction
            DB::connection()->pdo->commit();

			return $updated_record;
		}catch(Exception $e){
			DB::connection()->pdo->rollback();
			return HelperFunction::catch_error($e,true,HelperFunction::get_admin_error_msg());
		}
	}

	public static function delete_tif($id){		
		try{

			$deleted_entry = DB::table('tifs')->delete($id);
			return  DataHelper::return_json_data($deleted_entry,true,'Tif has been deleted',1);

		}catch(Exception $e){
			return HelperFunction::catch_error($e,true);
		}
	}

	public static function get_tifs($client_data){
		try{
			$filter_array = array();
			if(array_key_exists("id", $client_data))
				$filter_array["tifs.id"] = $client_data["id"];
			if(array_key_exists("referenceNumber", $client_data))
				$filter_array["tifs.reference_number"] = "%".$client_data["referenceNumber"]."%";
			if(array_key_exists("tucId", $client_data))
				$filter_array["tifs.tuc_id"] = $client_data["tucId"];
			
			$query_result = DB::table('tifs')
							->where(function($query) use ($filter_array){				
								$query = DataHelper::filter_data($query,"tifs.id",$filter_array,"int");
								$query = DataHelper::filter_data($query,"tifs.reference_number",$filter_array,"string","like");
								$query = DataHelper::filter_data($query,"tifs.tuc_id",$filter_array,"int");
							});

			$total = $query_result->count();

			$query_result = $query_result->order_by('tifs.id','desc');

			$paging_result = array_key_exists('page', $client_data) ? 
								HelperFunction::paginate($client_data['page'],$client_data['limit'], $query_result):$query_result;

        	//execute query and specify columns to retrive
			$result = $paging_result->get(
							array("tifs.id",
								"tifs.reference_number",
								"tifs.tuc_id",
								"tifs.forest_district_id",
								"tifs.date",
								"tifs.range_supervisors_name",
								"tifs.contractors_name")
							);

			$out = array_map(function($data){

						$tif_details = TifDetail::get_tif_details($data->id);

						$arr = array();
						$arr["id"] = $data->id;
						$arr["referenceNumber"] = $data->reference_number;
						$arr["tucId"] = $data->tuc_id;
						$arr["forestDistrictId"] = $data->forest_district_id;
						$arr["date"] = HelperFunction::format_date_to_client($data->date);
						$arr["rangeSupervisorsName"] = $data->range_supervisors_name;
						$arr["contractorsName"] = $data->contractors_name;
						$arr["tifDetails"] = $tif_details;

						return $arr;
					},$result);

			return HelperFunction::return_json_data($out,true,'record loaded',$total);
		}catch(Exception $e){
			return HelperFunction::catch_error($e,true,HelperFunction::get_admin_error_msg());
		}
	}
}
