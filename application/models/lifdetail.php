<?php
class LifDetail extends Eloquent{

	public static function create_lif_details($lif_id, $details){
		foreach ($details as $client_data) {
			$inputs = array("tif_id" => $client_data->tifId, 
							"reserve_code" => $client_data->reserveCode, 
							"stock_survey_number" => $client_data->stockSurveyNumber, 
							"tree_number" => $client_data->treeNumber, 
							"species_id" => $client_data->speciesId, 
							"log_number" => $client_data->logNumber, 
							"log_length" => $client_data->logLength, 
							"db1" => $client_data->db1, 
							"db2" => $client_data->db2, 
							"dt1" => $client_data->dt1, 
							"dt2" => $client_data->dt2, 
							"volume" => $client_data->volume, 
							);
			$rules = array("tif_id" => "required|numeric", 
							"reserve_code" => "required|max:128", 
							"stock_survey_number" => "required|max:128", 
							"tree_number" => "required|max:128", 
							"species_id" => "required|numeric", 
							"log_number" => "required|max:128", 
							"log_length" => "required", 
							"db1" => "required", 
							"db2" => "required", 
							"dt1" => "required", 
							"dt2" => "required", 
							"volume" => "required", 
							);

			$validation = MyValidator::validate_user_input($inputs,$rules);
			if($validation->fails())
				return HelperFunction::catch_error(null,false,HelperFunction::format_message($validation->errors->all()));

			$arr = DataHelper::create_audit_entries(HelperFunction::get_user_id());
			$arr["lif_id"] = $lif_id;
			$arr["tif_id"] = $client_data->tifId;
			$arr["reserve_code"] = $client_data->reserveCode;
			$arr["stock_survey_number"] = $client_data->stockSurveyNumber;
			$arr["tree_number"] = $client_data->treeNumber;
			$arr["species_id"] = $client_data->speciesId;
			$arr["log_number"] = $client_data->logNumber;
			$arr["log_length"] = $client_data->logLength;
			$arr["db1"] = $client_data->db1;
			$arr["db2"] = $client_data->db2;
			$arr["dt1"] = $client_data->dt1;
			$arr["dt2"] = $client_data->dt2;
			$arr["volume"] = $client_data->volume;

			$inserted_record = DataHelper::insert_record('lif_details',$arr,'Lif Detail');
			if(!$inserted_record['success'])
				throw new Exception($inserted_record['message']);
		}
	}

	public static function update_lif_details($details){
		foreach ($details as $client_data) {
			$inputs = array("id" => $client_data->id, 
							"lif_id" => $client_data->lifId, 
							"tif_id" => $client_data->tifId, 
							"reserve_code" => $client_data->reserveCode, 
							"stock_survey_number" => $client_data->stockSurveyNumber, 
							"tree_number" => $client_data->treeNumber, 
							"species_id" => $client_data->speciesId, 
							"log_number" => $client_data->logNumber, 
							"log_length" => $client_data->logLength, 
							"db1" => $client_data->db1, 
							"db2" => $client_data->db2, 
							"dt1" => $client_data->dt1, 
							"dt2" => $client_data->dt2, 
							"volume" => $client_data->volume, 
							);
			$rules = array("id" => "required|numeric", 
							"lif_id" => "required|numeric", 
							"tif_id" => "required|numeric", 
							"reserve_code" => "required|max:128", 
							"stock_survey_number" => "required|max:128", 
							"tree_number" => "required|max:128", 
							"species_id" => "required|numeric", 
							"log_number" => "required|max:128", 
							"log_length" => "required", 
							"db1" => "required", 
							"db2" => "required", 
							"dt1" => "required", 
							"dt2" => "required", 
							"volume" => "required", 
							);

			$validation = MyValidator::validate_user_input($inputs,$rules);
			if($validation->fails())
				return HelperFunction::catch_error(null,false,HelperFunction::format_message($validation->errors->all()));

			$arr = DataHelper::update_audit_entries(HelperFunction::get_user_id());
			$arr["id"] = $client_data->id;
			$arr["lif_id"] = $client_data->lifId;
			$arr["tif_id"] = $client_data->tifId;
			$arr["reserve_code"] = $client_data->reserveCode;
			$arr["stock_survey_number"] = $client_data->stockSurveyNumber;
			$arr["tree_number"] = $client_data->treeNumber;
			$arr["species_id"] = $client_data->speciesId;
			$arr["log_number"] = $client_data->logNumber;
			$arr["log_length"] = $client_data->logLength;
			$arr["db1"] = $client_data->db1;
			$arr["db2"] = $client_data->db2;
			$arr["dt1"] = $client_data->dt1;
			$arr["dt2"] = $client_data->dt2;
			$arr["volume"] = $client_data->volume;

			$updated_record = DataHelper::update_record('lif_details',$arr['id'],$arr,'Lif Detail');
			if(!$updated_record['success'])
				throw new Exception($updated_record['message'],1);
		}
	}

	/*public static function delete_lif_details($id){		
		try{

			$deleted_entry = DB::table('lif_details')->delete($id);
			return  DataHelper::return_json_data($deleted_entry,true,'Lif Details has been deleted',1);

		}catch(Exception $e){
			return HelperFunction::catch_error($e,true);
		}
	}*/

	public static function get_lif_details($lif_id){
		try{
			$filter_array = array();
			$filter_array["lif_details.lif_id"] = $lif_id;

			$query_result = DB::table('lif_details')
							->where(function($query) use ($filter_array){				
									$query = DataHelper::filter_data($query,"lif_details.lif_id",$filter_array,"int");
							});

			//execute query and specify columns to retrive
			$result = $query_result->get(
							array("lif_details.id",
								"lif_details.lif_id",
								"lif_details.tif_id",
								"lif_details.reserve_code",
								"lif_details.stock_survey_number",
								"lif_details.tree_number",
								"lif_details.species_id",
								"lif_details.log_number",
								"lif_details.log_length",
								"lif_details.db1",
								"lif_details.db2",
								"lif_details.dt1",
								"lif_details.dt2",
								"lif_details.volume")
							);

			$out = array_map(function($data){

						$arr = array();
						$arr["id"] = $data->id;
						$arr["lifId"] = $data->lif_id;
						$arr["tifId"] = $data->tif_id;
						$arr["reserveCode"] = $data->reserve_code;
						$arr["stockSurveyNumber"] = $data->stock_survey_number;
						$arr["treeNumber"] = $data->tree_number;
						$arr["speciesId"] = $data->species_id;
						$arr["logNumber"] = $data->log_number;
						$arr["logLength"] = HelperFunction::format_to_2_decimal_places($data->log_length);
						$arr["db1"] = HelperFunction::format_to_2_decimal_places($data->db1);
						$arr["db2"] = HelperFunction::format_to_2_decimal_places($data->db2);
						$arr["dt1"] = HelperFunction::format_to_2_decimal_places($data->dt1);
						$arr["dt2"] = HelperFunction::format_to_2_decimal_places($data->dt2);
						$arr["volume"] = HelperFunction::format_to_2_decimal_places($data->volume);

						return $arr;
					},$result);

			return $out;
		}catch(Exception $e){
			return HelperFunction::catch_error($e,true,HelperFunction::get_admin_error_msg());
		}
	}
}
