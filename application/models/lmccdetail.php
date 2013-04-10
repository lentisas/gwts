<?php
class LmccDetail extends Eloquent{

	public static function create_lmcc_detail($lmcc_id, $details){
		
		foreach ($details as $client_data) {
			
			$inputs = array("tifRef" => $client_data->tifRef, 
							"compartment_number" => $client_data->compartmentNumber, 
							"stock_number" => $client_data->stockNumber, 
							"tree_number" => $client_data->treeNumber, 
							"log_number" => $client_data->logNumber, 
							"species_id" => $client_data->speciesId, 
							"db1" => $client_data->db1, 
							"db2" => $client_data->db2, 
							"db" => $client_data->db, 
							"dt1" => $client_data->dt1, 
							"dt2" => $client_data->dt2, 
							"dt" => $client_data->dt, 
							"length" => $client_data->length, 
							"defects" => $client_data->defect, 
							"grade" => $client_data->grade, 
							);
			$rules = array("tifRef" => "required", 
							"compartment_number" => "required|max:128", 
							"stock_number" => "required|max:128", 
							"tree_number" => "required|max:128", 
							"log_number" => "required|max:128", 
							"species_id" => "required|numeric", 
							"db1" => "required", 
							"db2" => "required", 
							"db" => "required", 
							"dt1" => "required", 
							"dt2" => "required", 
							"dt" => "required", 
							"length" => "required", 
							"defects" => "required|max:128", 
							"grade" => "required|max:128", 
							);

			$validation = MyValidator::validate_user_input($inputs,$rules);
			if($validation->fails())
				return HelperFunction::catch_error(null,false,HelperFunction::format_message($validation->errors->all()));

			$arr = DataHelper::create_audit_entries(HelperFunction::get_user_id());
			$arr["lmcc_id"] = $lmcc_id;
			$arr["tif_ref"] = $client_data->tifRef;
			$arr["reserve_code"] = "";//$client_data->reserveCode;
			$arr["compartment_number"] = $client_data->compartmentNumber;
			$arr["stock_number"] = $client_data->stockNumber;
			$arr["tree_number"] = $client_data->treeNumber;
			$arr["log_number"] = $client_data->logNumber;
			$arr["species_id"] = $client_data->speciesId;
			$arr["db1"] = $client_data->db1;
			$arr["db2"] = $client_data->db2;
			$arr["db"] = $client_data->db;
			$arr["dt1"] = $client_data->dt1;
			$arr["dt2"] = $client_data->dt2;
			$arr["dt"] = $client_data->dt;
			$arr["length"] = $client_data->length;
			$arr["volume"] = 00;//$client_data->volume;
			$arr["defects"] = $client_data->defect;
			$arr["grade"] = $client_data->grade;

			$inserted_record = DataHelper::insert_record('lmcc_details',$arr,'Lmcc Detail');
			if(!$inserted_record['success'])
				throw new Exception($inserted_record['message']);
		}

	}

	public static function update_lmcc_detail($details){
		
		foreach ($details as $client_data) {
			
			$inputs = array("id" => $client_data->id, 
							"lmcc_id" => $client_data->lmccId, 
							"tif_id" => $client_data->tifId, 
							"reserve_code" => $client_data->reserveCode, 
							"compartment_number" => $client_data->compartmentNumber, 
							"stock_number" => $client_data->stockNumber, 
							"tree_number" => $client_data->treeNumber, 
							"log_number" => $client_data->logNumber, 
							"species_id" => $client_data->speciesId, 
							"db1" => $client_data->db1, 
							"db2" => $client_data->db2, 
							"db" => $client_data->db, 
							"dt1" => $client_data->dt1, 
							"dt2" => $client_data->dt2, 
							"dt" => $client_data->dt, 
							"length" => $client_data->length, 
							"defects" => $client_data->defects, 
							"grade" => $client_data->grade, 
							);
			$rules = array("id" => "required|numeric", 
							"lmcc_id" => "required|numeric", 
							"tif_id" => "required|numeric", 
							"reserve_code" => "required|max:128", 
							"compartment_number" => "required|max:128", 
							"stock_number" => "required|max:128", 
							"tree_number" => "required|max:128", 
							"log_number" => "required|max:128", 
							"species_id" => "required|numeric", 
							"db1" => "required", 
							"db2" => "required", 
							"db" => "required", 
							"dt1" => "required", 
							"dt2" => "required", 
							"dt" => "required", 
							"length" => "required", 
							"defects" => "required|max:128", 
							"grade" => "required|max:128", 
							);

			$validation = MyValidator::validate_user_input($inputs,$rules);
			if($validation->fails())
				return HelperFunction::catch_error(null,false,HelperFunction::format_message($validation->errors->all()));

			$arr = DataHelper::update_audit_entries(HelperFunction::get_user_id());
			$arr["id"] = $client_data->id;
			$arr["lmcc_id"] = $client_data->lmccId;
			$arr["tif_id"] = $client_data->tifId;
			$arr["reserve_code"] = $client_data->reserveCode;
			$arr["compartment_number"] = $client_data->compartmentNumber;
			$arr["stock_number"] = $client_data->stockNumber;
			$arr["tree_number"] = $client_data->treeNumber;
			$arr["log_number"] = $client_data->logNumber;
			$arr["species_id"] = $client_data->speciesId;
			$arr["db1"] = $client_data->db1;
			$arr["db2"] = $client_data->db2;
			$arr["db"] = $client_data->db;
			$arr["dt1"] = $client_data->dt1;
			$arr["dt2"] = $client_data->dt2;
			$arr["dt"] = $client_data->dt;
			$arr["length"] = $client_data->length;
			$arr["volume"] = $client_data->volume;
			$arr["defects"] = $client_data->defects;
			$arr["grade"] = $client_data->grade;

			$updated_record = DataHelper::update_record('lmcc_details',$arr['id'],$arr,'Lmcc Detail');
			if(!$updated_record['success'])
				throw new Exception($updated_record['message'],1);

		}			
	}

	/*public static function delete_lmcc_detail($id){		
		try{

			$deleted_entry = DB::table('lmcc_details')->delete($id);
			return  DataHelper::return_json_data($deleted_entry,true,'Lmcc Detail has been deleted',1);

		}catch(Exception $e){
			return HelperFunction::catch_error($e,true);
		}
	}*/

	public static function get_lmcc_details($lmcc_id){
		try{
			$filter_array = array();
			$filter_array["lmcc_details.lmcc_id"] = $lmcc_id;
			
			$query_result = DB::table('lmcc_details')
							->join('species','lmcc_details.species_id','=','species.id')
							->where(function($query) use ($filter_array){				
									$query = DataHelper::filter_data($query,"lmcc_details.lmcc_id",$filter_array,"int");
				});

        	//execute query and specify columns to retrive
			$result = $query_result->get(
						array("lmcc_details.id",
							"lmcc_details.lmcc_id",
							"lmcc_details.tif_ref",
							"lmcc_details.reserve_code",
							"lmcc_details.compartment_number",
							"lmcc_details.stock_number",
							"lmcc_details.tree_number",
							"lmcc_details.log_number",
							"lmcc_details.species_id",
							"lmcc_details.db1",
							"lmcc_details.db2",
							"lmcc_details.db",
							"lmcc_details.dt1",
							"lmcc_details.dt2",
							"lmcc_details.dt",
							"lmcc_details.length",
							"lmcc_details.volume",
							"lmcc_details.defects",
							"lmcc_details.grade",
							"species.latin",
							"species.trade",
							"species.species_code")
						);

			$out = array_map(function($data){
	
					$arr = array();
					$arr["id"] = $data->id;
					$arr["lmccId"] = $data->lmcc_id;
					$arr["tifRef"] = $data->tif_ref;
					$arr["reserveCode"] = $data->reserve_code;
					$arr["compartmentNumber"] = $data->compartment_number;
					$arr["stockNumber"] = $data->stock_number;
					$arr["treeNumber"] = $data->tree_number;
					$arr["logNumber"] = $data->log_number;
					$arr["speciesId"] = $data->species_id;
					$arr["db1"] = HelperFunction::format_to_2_decimal_places($data->db1);
					$arr["db2"] = HelperFunction::format_to_2_decimal_places($data->db2);
					$arr["db"] = HelperFunction::format_to_2_decimal_places($data->db);
					$arr["dt1"] = HelperFunction::format_to_2_decimal_places($data->dt1);
					$arr["dt2"] = HelperFunction::format_to_2_decimal_places($data->dt2);
					$arr["dt"] = HelperFunction::format_to_2_decimal_places($data->dt);
					$arr["length"] = HelperFunction::format_to_2_decimal_places($data->length);
					$arr["volume"] = HelperFunction::format_to_2_decimal_places($data->volume);
					$arr["defect"] = $data->defects;
					$arr["grade"] = $data->grade;
					$arr["specieName"] = $data->latin;
					$arr["specieCode"] = $data->species_code;
					
					return $arr;
				},$result);

			return $out;
		}catch(Exception $e){
			return HelperFunction::catch_error($e,true,HelperFunction::get_admin_error_msg());
		}
	}
}
