<?php
class ForestDistrict extends Eloquent{

	public function create_forest_district($client_data){
		try{

			$inputs = array("name" => $client_data->name, 
							"locality_mark" => $client_data->localityMark, 
							"stool_land_owner" => $client_data->stoolLandOwner, 
							"district_assembly" => $client_data->districtAssembly, 
							);
			$rules = array("name" => "required|max:128", 
							"locality_mark" => "required|max:128", 
							"stool_land_owner" => "required|max:128", 
							"district_assembly" => "required|max:128", 
							);

			$validation = MyValidator::validate_user_input($inputs,$rules);
			if($validation->fails())
				return HelperFunction::catch_error(null,false,HelperFunction::format_message($validation->errors->all()));

			$arr = DataHelper::create_audit_entries(HelperFunction::get_user_id());
			$arr["name"] = $client_data->name;
			$arr["address"] = $client_data->address;
			$arr["telephone"] = $client_data->telephone;
			$arr["locality_mark"] = $client_data->localityMark;
			$arr["stool_land_owner"] = $client_data->stoolLandOwner;
			$arr["district_assembly"] = $client_data->districtAssembly;

			$inserted_record = DataHelper::insert_record('forest_districts',$arr,'Forest District');
			if(!$inserted_record['success'])
				throw new Exception($inserted_record['message']);

			return $inserted_record;
		}catch(Exception $e){
			return HelperFunction::catch_error($e,true,HelperFunction::get_admin_error_msg());
		}
	}

	public function update_forest_district($client_data){
		try{

			$inputs = array("id" => $client_data->id, 
							"name" => $client_data->name, 
							"locality_mark" => $client_data->localityMark, 
							"stool_land_owner" => $client_data->stoolLandOwner, 
							"district_assembly" => $client_data->districtAssembly, 
							);
			$rules = array("id" => "required|numeric", 
							"name" => "required|max:128", 
							"locality_mark" => "required|max:128", 
							"stool_land_owner" => "required|max:128", 
							"district_assembly" => "required|max:128", 
							);

			$validation = MyValidator::validate_user_input($inputs,$rules);
			if($validation->fails())
				return HelperFunction::catch_error(null,false,HelperFunction::format_message($validation->errors->all()));

			$arr = DataHelper::update_audit_entries(HelperFunction::get_user_id());
			$arr["id"] = $client_data->id;
			$arr["name"] = $client_data->name;
			$arr["address"] = $client_data->address;
			$arr["telephone"] = $client_data->telephone;
			$arr["locality_mark"] = $client_data->localityMark;
			$arr["stool_land_owner"] = $client_data->stoolLandOwner;
			$arr["district_assembly"] = $client_data->districtAssembly;

			$updated_record = DataHelper::update_record('forest_districts',$arr['id'],$arr,'Forest District');
			if(!$updated_record['success'])
				throw new Exception($updated_record['message'],1);

			return $updated_record;
		}catch(Exception $e){
			return HelperFunction::catch_error($e,true,HelperFunction::get_admin_error_msg());
		}
	}

	public function delete_forest_district($id){		
		try{

			$deleted_entry = DB::table('forest_districts')->delete($id);
			return  DataHelper::return_json_data($deleted_entry,true,'Forest District has been deleted',1);

		}catch(Exception $e){
			return HelperFunction::catch_error($e,true);
		}
	}

	public function get_forest_districts($client_data){
		try{
			$filter_array = array();
			if(array_key_exists("id", $client_data))
				$filter_array["forest_districts.id"] = $client_data["id"];
			if(array_key_exists("name", $client_data))
				$filter_array["forest_districts.name"] = "%".$client_data["name"]."%";
			
			$query_result = DB::table('forest_districts')
								->where(function($query) use ($filter_array){				
										$query = DataHelper::filter_data($query,"forest_districts.id",$filter_array,"int");
										$query = DataHelper::filter_data($query,"forest_districts.name",$filter_array,"string","like");
								});

			$total = $query_result->count();

			$query_result = $query_result->order_by('forest_districts.id','desc');

			$paging_result = array_key_exists('page', $client_data) ? 
									HelperFunction::paginate($client_data['page'],$client_data['limit'], $query_result):$query_result;

        	//execute query and specify columns to retrive
			$result = $paging_result->get(
								array("forest_districts.id",
									"forest_districts.name",
									"forest_districts.address",
									"forest_districts.telephone",
									"forest_districts.locality_mark",
									"forest_districts.stool_land_owner",
									"forest_districts.district_assembly")
								);

			$out = array_map(function($data){
						
						$arr = array();
						$arr["id"] = $data->id;
						$arr["name"] = $data->name;
						$arr["address"] = $data->address;
						$arr["telephone"] = $data->telephone;
						$arr["localityMark"] = $data->locality_mark;
						$arr["stoolLandOwner"] = $data->stool_land_owner;
						$arr["districtAssembly"] = $data->district_assembly;
						
						return $arr;
			},$result);

			return HelperFunction::return_json_data($out,true,'record loaded',$total);
		}catch(Exception $e){
			return HelperFunction::catch_error($e,true,HelperFunction::get_admin_error_msg());
		}
	}
}
