<?php
class Region extends Eloquent{

	public static function create_region($client_data){
		try{

			$inputs = array("name" => $client_data->name, 
				"code" => $client_data->code);
			$rules = array("name" => "required|max:128", 
				"code" => "required|max:128");

			$validation = MyValidator::validate_user_input($inputs,$rules);
			if($validation->fails())
				return HelperFunction::catch_error(null,false,HelperFunction::format_message($validation->errors->all()));

			$arr = DataHelper::create_audit_entries(HelperFunction::get_user_id());
			$arr["name"] = $client_data->name;
			$arr["code"] = $client_data->code;
			$arr["description"] = $client_data->description;

			$inserted_record = DataHelper::insert_record('regions',$arr,'Region');
			if(!$inserted_record['success'])
				throw new Exception($inserted_record['message']);

			return $inserted_record;
		}catch(Exception $e){
			return HelperFunction::catch_error($e,true,HelperFunction::get_admin_error_msg());
		}
	}

	public static function update_region($client_data){
		try{

			$inputs = array("id" => $client_data->id, 
				"name" => $client_data->name, 
				"code" => $client_data->code);
			$rules = array("id" => "required|numeric", 
				"name" => "required|max:128", 
				"code" => "required|max:128");

			$validation = MyValidator::validate_user_input($inputs,$rules);
			if($validation->fails())
				return HelperFunction::catch_error(null,false,HelperFunction::format_message($validation->errors->all()));

			$arr = DataHelper::update_audit_entries(HelperFunction::get_user_id());
			$arr["id"] = $client_data->id;
			$arr["name"] = $client_data->name;
			$arr["code"] = $client_data->code;
			$arr["description"] = $client_data->description;

			$updated_record = DataHelper::update_record('regions',$arr['id'],$arr,'Region');
			if(!$updated_record['success'])
				throw new Exception($updated_record['message'],1);

			return $updated_record;
		}catch(Exception $e){
			return HelperFunction::catch_error($e,true,HelperFunction::get_admin_error_msg());
		}
	}

	public static function delete_region($id){		
		try{

			$deleted_entry = DB::table('regions')->delete($id);
			return  DataHelper::return_json_data($deleted_entry,true,'Region has been deleted',1);

		}catch(Exception $e){
			return HelperFunction::catch_error($e,true);
		}
	}

	public static function get_regions($client_data){
		try{
			$filter_array = array();
			if(array_key_exists("id", $client_data))
				$filter_array["regions.id"] = $client_data["id"];
			if(array_key_exists("name", $client_data))
				$filter_array["regions.name"] = "%".$client_data["name"]."%";
			if(array_key_exists("code", $client_data))
				$filter_array["regions.code"] = "%".$client_data["code"]."%";

			$query_result = DB::table('regions')
							->where(function($query) use ($filter_array){				
									$query = DataHelper::filter_data($query,"regions.id",$filter_array,"int");
									$query = DataHelper::filter_data($query,"regions.name",$filter_array,"string","like");
									$query = DataHelper::filter_data($query,"regions.code",$filter_array,"string","like");
							});

			$total = $query_result->count();

			$query_result = $query_result->order_by('regions.id','desc');

			$paging_result = array_key_exists('page', $client_data) ? 
						HelperFunction::paginate($client_data['page'],$client_data['limit'], $query_result):$query_result;

        	//execute query and specify columns to retrive
			$result = $paging_result->get(
						array("regions.id",
							"regions.name",
							"regions.code",
							"regions.description")
						);

			$out = array_map(function($data){
				
						$arr = array();
						$arr["id"] = $data->id;
						$arr["name"] = $data->name;
						$arr["code"] = $data->code;
						$arr["description"] = $data->description;
						return $arr;
					},$result);

			return HelperFunction::return_json_data($out,true,'record loaded',$total);
		}catch(Exception $e){
			return HelperFunction::catch_error($e,true,HelperFunction::get_admin_error_msg());
		}
	}
}
