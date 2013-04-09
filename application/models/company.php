<?php
class Company extends Eloquent{

	public function create_company($client_data){
		try{

			$inputs = array("name" => $client_data->name, 
				"code" => $client_data->code, 
				"date_registered" => $client_data->dateRegistered, 
				"expires" => $client_data->expires, 
				"contact_name" => $client_data->contactName, 
				"property_mark" => $client_data->propertyMark, 
				"mark_registered" => $client_data->markRegistered, 
				"mark_expired" => $client_data->markExpired, 
				"company_type_id" => $client_data->companyTypeId, 
				);
			$rules = array("name" => "required|max:128", 
				"code" => "required|max:128", 
				"date_registered" => "required", 
				"expires" => "required", 
				"contact_name" => "required|max:128", 
				"property_mark" => "required", 
				"mark_registered" => "required", 
				"mark_expired" => "required", 
				"company_type_id" => "required", 
				);

			$validation = MyValidator::validate_user_input($inputs,$rules);
			if($validation->fails())
				return HelperFunction::catch_error(null,false,HelperFunction::format_message($validation->errors->all()));

			$arr = DataHelper::create_audit_entries(HelperFunction::get_user_id());
			$arr["name"] = $client_data->name;
			$arr["code"] = $client_data->code;
			$arr["date_registered"] = $client_data->dateRegistered;
			$arr["expires"] = $client_data->expires;
			$arr["postal_address"] = $client_data->postalAddress;
			$arr["physical_location"] = $client_data->physicalLocation;
			$arr["telephone"] = $client_data->telephone;
			$arr["fax"] = $client_data->fax;
			$arr["email"] = $client_data->email;
			$arr["contact_name"] = $client_data->contactName;
			$arr["role"] = $client_data->role;
			$arr["property_mark"] = $client_data->propertyMark;
			$arr["mark_registered"] = $client_data->markRegistered;
			$arr["mark_expired"] = $client_data->markExpired;
			$arr["company_type_id"] = $client_data->companyTypeId;

			$inserted_record = DataHelper::insert_record('companies',$arr,'Company');
			if(!$inserted_record['success'])
				throw new Exception($inserted_record['message']);

			return $inserted_record;
		}catch(Exception $e){
			return HelperFunction::catch_error($e,true,HelperFunction::get_admin_error_msg());
		}
	}

	public static function update_company($client_data){
		try{

			$inpute = array("id" => $client_data->id,
				"name" => $client_data->name, 
				"code" => $client_data->code, 
				"date_registered" => $client_data->dateRegistered, 
				"expires" => $client_data->expires, 
				"contact_name" => $client_data->contactName, 
				"property_mark" => $client_data->propertyMark, 
				"mark_registered" => $client_data->markRegistered, 
				"mark_expired" => $client_data->markExpired, 
				"company_type_id" => $client_data->companyTypeId,
				);
			$rules = array("id" => "required|numeric", 
				"name" => "required|max:128", 
				"code" => "required|max:128", 
				"date_registered" => "required", 
				"expires" => "required", 
				"contact_name" => "required|max:128", 
				"property_mark" => "required", 
				"mark_registered" => "required", 
				"mark_expired" => "required", 
				"company_type_id" => "required", 
				);

			$validation = MyValidator::validate_user_input($inputs,$rules);
			if($validation->fails())
				return HelperFunction::catch_error(null,false,HelperFunction::format_message($validation->errors->all()));

			$arr = DataHelper::update_audit_entries(HelperFunction::get_user_id());
			$arr["id"] = $client_data->id;
			$arr["name"] = $client_data->name;
			$arr["code"] = $client_data->code;
			$arr["date_registered"] = $client_data->dateRegistered;
			$arr["expires"] = $client_data->expires;
			$arr["postal_address"] = $client_data->postalAddress;
			$arr["physical_location"] = $client_data->physicalLocation;
			$arr["telephone"] = $client_data->telephone;
			$arr["fax"] = $client_data->fax;
			$arr["email"] = $client_data->email;
			$arr["contact_name"] = $client_data->contactName;
			$arr["role"] = $client_data->role;
			$arr["property_mark"] = $client_data->propertyMark;
			$arr["mark_registered"] = $client_data->markRegistered;
			$arr["mark_expired"] = $client_data->markExpired;
			$arr["company_type_id"] = $client_data->companyTypeId;

			$updated_record = DataHelper::update_record('companies',$arr['id'],$arr,'Company');
			if(!$updated_record['success'])
				throw new Exception($updated_record['message'],1);

			return $updated_record;
		}catch(Exception $e){
			return HelperFunction::catch_error($e,true,HelperFunction::get_admin_error_msg());
		}
	}

	public static function delete_company($id){		
		try{

			$deleted_entry = DB::table('companies')->delete($id);
			return  DataHelper::return_json_data($deleted_entry,true,'Company has been deleted',1);

		}catch(Exception $e){
			return HelperFunction::catch_error($e,true);
		}
	}

	public static function get_companies($client_data){
		try{
			$filter_array = array();
			if(array_key_exists("id", $client_data))
				$filter_array["companies.id"] = $client_data["id"];
			if(array_key_exists("name", $client_data))
				$filter_array["companies.name"] = "%".$client_data["name"]."%";
			if(array_key_exists("code", $client_data))
				$filter_array["companies.code"] = "%".$client_data["code"]."%";

			if(array_key_exists("type", $client_data) && $client_data["type"] == "contractors")
				$filter_array["company_types.id"] = 1;

			$query_result = DB::table('companies')
								->join('company_types','companies.company_type_id','=','company_types.id')
								->where(function($query) use ($filter_array){				
									$query = DataHelper::filter_data($query,"companies.id",$filter_array,"int");
									$query = DataHelper::filter_data($query,"company_types.id",$filter_array,"int");
									$query = DataHelper::filter_data($query,"companies.name",$filter_array,"string","like");
									$query = DataHelper::filter_data($query,"companies.code",$filter_array,"string","like");	
			});

			$total = $query_result->count();

			$query_result = $query_result->order_by('companies.id','desc');

			$paging_result = array_key_exists('page', $client_data) ? 
					HelperFunction::paginate($client_data['page'],$client_data['limit'], $query_result):$query_result;

        	//execute query and specify columns to retrive
			$result = $paging_result->get(
						array("companies.id",
								"companies.name",
								"companies.code",
								"companies.date_registered",
								"companies.expires",
								"companies.postal_address",
								"companies.physical_location",
								"companies.telephone",
								"companies.fax",
								"companies.email",
								"companies.contact_name",
								"companies.role",
								"companies.property_mark",
								"companies.mark_registered",
								"companies.mark_expired",
								"companies.company_type_id",
								"company_types.name as company_type"
						));

			$out = array_map(function($data){

					$arr = array();
					$arr["id"] = $data->id;
					$arr["name"] = $data->name;
					$arr["code"] = $data->code;
					$arr["dateRegistered"] = HelperFunction::format_date_to_client($data->date_registered);
					$arr["expires"] = HelperFunction::format_date_to_client($data->expires);
					$arr["postalAddress"] = $data->postal_address;
					$arr["physicalLocation"] = $data->physical_location;
					$arr["telephone"] = $data->telephone;
					$arr["fax"] = $data->fax;
					$arr["email"] = $data->email;
					$arr["contactName"] = $data->contact_name;
					$arr["role"] = $data->role;
					$arr["propertyMark"] = $data->property_mark;
					$arr["markRegistered"] = HelperFunction::format_date_to_client($data->mark_registered);
					$arr["markExpired"] = HelperFunction::format_date_to_client($data->mark_expired);
					$arr["companyTypeId"] = $data->company_type_id;
					$arr["companyType"] = $data->company_type;
					
					return $arr;
			},$result);

			return HelperFunction::return_json_data($out,true,'record loaded',$total);
		}catch(Exception $e){
			return HelperFunction::catch_error($e,true,HelperFunction::get_admin_error_msg());
		}
	}
}
