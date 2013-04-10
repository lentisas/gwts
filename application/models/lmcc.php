<?php
class Lmcc extends Eloquent{

	public static function create_lmcc($client_data){
		try{
			//begin transaction;
            DB::connection()->pdo->beginTransaction();

			$inputs = array("reference_number" => $client_data->referenceNumber, 
							"company_id" => $client_data->companyId, 
							"forest_district_id" => $client_data->forestDistrictId, 
							"lifReference" => $client_data->lifReference, 
							"driverName" => $client_data->driverName, 
							"vehicle_number" => $client_data->vehicleNumber, 
							"destination" => $client_data->destination, 
							"check_point" => $client_data->checkPoint, 
							"sawmill" => $client_data->sawmill,
							"lmccDetails" => $client_data->logs 
							);
			$rules = array("reference_number" => "required|max:128", 
							"company_id" => "required|numeric", 
							"forest_district_id" => "required|numeric", 
							"lifReference" => "required", 
							"driverName" => "required|max:128", 
							"vehicle_number" => "required|max:128", 
							"destination" => "required|max:128", 
							"check_point" => "required|max:128", 
							"sawmill" => "required|max:128",
							"lmccDetails" => "required" 
							);

			$validation = MyValidator::validate_user_input($inputs,$rules);
			if($validation->fails())
				return HelperFunction::catch_error(null,false,HelperFunction::format_message($validation->errors->all()));

			$arr = DataHelper::create_audit_entries(HelperFunction::get_user_id());
			$arr["reference_number"] = $client_data->referenceNumber;
			$arr["company_id"] = $client_data->companyId;
			$arr["forest_district_id"] = $client_data->forestDistrictId;
			$arr["lif_ref"] = $client_data->lifReference;
			$arr["drivers_name"] = $client_data->driverName;
			$arr["vehicle_number"] = $client_data->vehicleNumber;
			$arr["destination"] = $client_data->destination;
			$arr["check_point"] = $client_data->checkPoint;
			$arr["sawmill"] = $client_data->sawmill;
			$arr["fsd_officer_name"] = "";//$client_data->fsdOfficerName;
			$arr["issue_date"] = date('Y-m-d H:i:s');//$client_data->issueDate;
			$arr["expiry_date"] = date('Y-m-d H:i:s');//$client_data->expiryDate;
			$arr["property_mark_agent_name"] = "";//$client_data->propertyMarkAgentName;
			$arr["tidd_officer_name"] = "";//$client_data->tiddOfficerName;
			$arr["tidd_officer_number"] = "";//$client_data->tiddOfficerNumber;
			
			$inserted_record = DataHelper::insert_record('lmccs',$arr,'Lmcc');
			if(!$inserted_record['success'])
				throw new Exception($inserted_record['message']);

			LmccDetail::create_lmcc_detail($inserted_record['data']['id'], $client_data->logs);

			//commit transaction
            DB::connection()->pdo->commit();

			return $inserted_record;
		}catch(Exception $e){
			DB::connection()->pdo->rollback();
			return HelperFunction::catch_error($e,true,HelperFunction::get_admin_error_msg());
		}
	}

	public static function update_lmcc($client_data){
		try{
			//begin transaction;
            DB::connection()->pdo->beginTransaction();

			$inputs = array("id" => $client_data->id, 
							"reference_number" => $client_data->referenceNumber, 
							"company_id" => $client_data->companyId, 
							"forest_district_id" => $client_data->forestDistrictId, 
							"lif_id" => $client_data->lifId, 
							"drivers_name" => $client_data->driversName, 
							"vehicle_number" => $client_data->vehicleNumber, 
							"destination" => $client_data->destination, 
							"check_point" => $client_data->checkPoint, 
							"sawmill" => $client_data->sawmill, 
							"fsd_officer_name" => $client_data->fsdOfficerName, 
							"issue_date" => $client_data->issueDate, 
							"expiry_date" => $client_data->expiryDate, 
							"property_mark_agent_name" => $client_data->propertyMarkAgentName, 
							"tidd_officer_name" => $client_data->tiddOfficerName, 
							"tidd_officer_number" => $client_data->tiddOfficerNumber,
							"lmccDetails" => $client_data->lmccDetails 
							);
			$rules = array("id" => "required|numeric", 
							"reference_number" => "required|max:128", 
							"company_id" => "required|numeric", 
							"forest_district_id" => "required|numeric", 
							"lif_id" => "required|numeric", 
							"drivers_name" => "required|max:128", 
							"vehicle_number" => "required|max:128", 
							"destination" => "required|max:128", 
							"check_point" => "required|max:128", 
							"sawmill" => "required|max:128", 
							"fsd_officer_name" => "required|max:128", 
							"issue_date" => "required", 
							"expiry_date" => "required", 
							"property_mark_agent_name" => "required|max:128", 
							"tidd_officer_name" => "required|max:128", 
							"tidd_officer_number" => "required|max:128", 
							"lmccDetails" => "required" 
							);

			$validation = MyValidator::validate_user_input($inputs,$rules);
			if($validation->fails())
				return HelperFunction::catch_error(null,false,HelperFunction::format_message($validation->errors->all()));

			$arr = DataHelper::update_audit_entries(HelperFunction::get_user_id());
			$arr["id"] = $client_data->id;
			$arr["reference_number"] = $client_data->referenceNumber;
			$arr["company_id"] = $client_data->companyId;
			$arr["forest_district_id"] = $client_data->forestDistrictId;
			$arr["lif_id"] = $client_data->lifId;
			$arr["drivers_name"] = $client_data->driversName;
			$arr["vehicle_number"] = $client_data->vehicleNumber;
			$arr["destination"] = $client_data->destination;
			$arr["check_point"] = $client_data->checkPoint;
			$arr["sawmill"] = $client_data->sawmill;
			$arr["fsd_officer_name"] = $client_data->fsdOfficerName;
			$arr["issue_date"] = $client_data->issueDate;
			$arr["expiry_date"] = $client_data->expiryDate;
			$arr["property_mark_agent_name"] = $client_data->propertyMarkAgentName;
			$arr["tidd_officer_name"] = $client_data->tiddOfficerName;
			$arr["tidd_officer_number"] = $client_data->tiddOfficerNumber;

			$updated_record = DataHelper::update_record('lmccs',$arr['id'],$arr,'Lmcc');
			if(!$updated_record['success'])
				throw new Exception($updated_record['message'],1);

			LmccDetail::update_lmcc_detail($client_data->lmccDetails);

			//commit transaction
            DB::connection()->pdo->commit();

			return $updated_record;
		}catch(Exception $e){
			DB::connection()->pdo->rollback();
			return HelperFunction::catch_error($e,true,HelperFunction::get_admin_error_msg());
		}
	}

	public static function delete_lmcc($id){		
		try{

			$deleted_entry = DB::table('lmccs')->delete($id);
			return  DataHelper::return_json_data($deleted_entry,true,'Lmcc has been deleted',1);

		}catch(Exception $e){
			return HelperFunction::catch_error($e,true);
		}
	}

	public static function get_lmccs($client_data){
		try{
			$filter_array = array();
			if(array_key_exists("id", $client_data))
				$filter_array["lmccs.id"] = $client_data["id"];
			if(array_key_exists("referenceNumber", $client_data))
				$filter_array["lmccs.reference_number"] = "%".$client_data["referenceNumber"]."%";

			$query_result = DB::table('lmccs')
						->join('forest_districts','lmccs.forest_district_id','=','forest_districts.id')
						->join('companies','lmccs.company_id','=','companies.id')
						->where(function($query) use ($filter_array){				
							$query = DataHelper::filter_data($query,"lmccs.id",$filter_array,"int");
							$query = DataHelper::filter_data($query,"lmccs.reference_number",$filter_array,"string","like");
						});

			$total = $query_result->count();

			$query_result = $query_result->order_by('lmccs.id','desc');

			$paging_result = array_key_exists('page', $client_data) ? 
					HelperFunction::paginate($client_data['page'],$client_data['limit'], $query_result):$query_result;

        	//execute query and specify columns to retrive
			$result = $paging_result->get(
						array("lmccs.id",
							"lmccs.reference_number",
							"lmccs.company_id",
							"lmccs.forest_district_id",
							"lmccs.lif_ref",
							"lmccs.drivers_name",
							"lmccs.vehicle_number",
							"lmccs.destination",
							"lmccs.check_point",
							"lmccs.sawmill",
							"lmccs.fsd_officer_name",
							"lmccs.issue_date",
							"lmccs.expiry_date",
							"lmccs.property_mark_agent_name",
							"lmccs.tidd_officer_name",
							"lmccs.tidd_officer_number",
							"companies.name as company",
							"forest_districts.name as forest_district",
							"forest_districts.locality_mark as locality_mark")
						);

			$out = array_map(function($data){

					$lmcc_details = LmccDetail::get_lmcc_details($data->id);

					$arr = array();
					$arr["id"] = $data->id;
					$arr["referenceNumber"] = $data->reference_number;
					$arr["companyId"] = $data->company_id;
					$arr["forestDistrictId"] = $data->forest_district_id;
					$arr["lifRef"] = $data->lif_ref;
					$arr["driversName"] = $data->drivers_name;
					$arr["vehicleNumber"] = $data->vehicle_number;
					$arr["destination"] = $data->destination;
					$arr["checkPoint"] = $data->check_point;
					$arr["sawmill"] = $data->sawmill;
					$arr["company"] = $data->company;
					$arr["forestDistrict"] = $data->forest_district;
					$arr["localityMark"] = $data->locality_mark;
					$arr["fsdOfficerName"] = $data->fsd_officer_name;
					$arr["issueDate"] = HelperFunction::format_date_to_client($data->issue_date);
					$arr["expiryDate"] = HelperFunction::format_date_to_client($data->expiry_date);
					$arr["propertyMarkAgentName"] = $data->property_mark_agent_name;
					$arr["tiddOfficerName"] = $data->tidd_officer_name;
					$arr["tiddOfficerNumber"] = $data->tidd_officer_number;
					$arr["logs"] = $lmcc_details;
					$arr["units"] = count($arr['logs']);
					
					return $arr;
				},$result);

			return HelperFunction::return_json_data($out,true,'record loaded',$total);
		}catch(Exception $e){
			return HelperFunction::catch_error($e,true,HelperFunction::get_admin_error_msg());
		}
	}
}
