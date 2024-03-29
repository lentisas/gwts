<?php
class TifDetail extends Eloquent{

	public static function create_tif_detail($tif_id, $details){
		
		foreach ($details as $client_data) {
			$inputs = array("reserve_code" => $client_data->reserveCode, 
							"stock_survey_number" => $client_data->stockSurveyNumber, 
							"tree_number" => $client_data->treeNumber, 
							"species_id" => $client_data->speciesId, 
							"tree_length" => $client_data->treeLength, 
							"diameter1" => $client_data->diameter1, 
							"diameter2" => $client_data->diameter2, 
							"volume" => $client_data->volume, 
							);
			$rules = array("reserve_code" => "required|max:128", 
							"stock_survey_number" => "required|max:128", 
							"tree_number" => "required|max:128", 
							"species_id" => "required|numeric", 
							"tree_length" => "required", 
							"diameter1" => "required", 
							"diameter2" => "required", 
							"volume" => "required", 
							);

			$validation = MyValidator::validate_user_input($inputs,$rules);
			if($validation->fails())
				return HelperFunction::catch_error(null,false,HelperFunction::format_message($validation->errors->all()));

			$arr = DataHelper::create_audit_entries(HelperFunction::get_user_id());
			$arr["tif_id"] = $tif_id;
			$arr["reserve_code"] = $client_data->reserveCode;
			$arr["stock_survey_number"] = $client_data->stockSurveyNumber;
			$arr["tree_number"] = $client_data->treeNumber;
			$arr["species_id"] = $client_data->speciesId;
			$arr["tree_length"] = $client_data->treeLength;
			$arr["diameter1"] = $client_data->diameter1;
			$arr["diameter2"] = $client_data->diameter2;
			$arr["volume"] = $client_data->volume;

			$inserted_record = DataHelper::insert_record('tif_details',$arr,'Tif Detail');
			if(!$inserted_record['success'])
				throw new Exception($inserted_record['message']);
		}
	}

	public static function update_tif_detail($client_data){
		try{

			$inputs = array("id" => $client_data->id, 
				"tif_id" => $client_data->tifId, 
				"reserve_code" => $client_data->reserveCode, 
				"stock_survey_number" => $client_data->stockSurveyNumber, 
				"tree_number" => $client_data->treeNumber, 
				"species_id" => $client_data->speciesId, 
				"tree_length" => $client_data->treeLength, 
				"diameter1" => $client_data->diameter1, 
				"diameter2" => $client_data->diameter2, 
				"volume" => $client_data->volume, 
				);
			$rules = array("id" => "required|numeric", 
				"tif_id" => "required|numeric", 
				"reserve_code" => "required|max:128", 
				"stock_survey_number" => "required|max:128", 
				"tree_number" => "required|max:128", 
				"species_id" => "required|numeric", 
				"tree_length" => "required", 
				"diameter1" => "required", 
				"diameter2" => "required", 
				"volume" => "required", 
				);

			$validation = MyValidator::validate_user_input($inputs,$rules);
			if($validation->fails())
				return HelperFunction::catch_error(null,false,HelperFunction::format_message($validation->errors->all()));

			$arr = DataHelper::update_audit_entries(HelperFunction::get_user_id());
			$arr["id"] = $client_data->id;
			$arr["tif_id"] = $client_data->tifId;
			$arr["reserve_code"] = $client_data->reserveCode;
			$arr["stock_survey_number"] = $client_data->stockSurveyNumber;
			$arr["tree_number"] = $client_data->treeNumber;
			$arr["species_id"] = $client_data->speciesId;
			$arr["tree_length"] = $client_data->treeLength;
			$arr["diameter1"] = $client_data->diameter1;
			$arr["diameter2"] = $client_data->diameter2;
			$arr["volume"] = $client_data->volume;

			$updated_record = DataHelper::update_record('tif_details',$arr['id'],$arr,'Tif Detail');
			if(!$updated_record['success'])
				throw new Exception($updated_record['message'],1);

			return $updated_record;
		}catch(Exception $e){
			return HelperFunction::catch_error($e,true,HelperFunction::get_admin_error_msg());
		}
	}

	/*public static function delete_tif_detail($id){		
		try{

			$deleted_entry = DB::table('tif_details')->delete($id);
			return  DataHelper::return_json_data($deleted_entry,true,'Tif Detail has been deleted',1);

		}catch(Exception $e){
			return HelperFunction::catch_error($e,true);
		}
	}*/

	public static function get_tif_details($tif_id){
		try{
			$filter_array = array();
			$filter_array["tif_details.tif_id"] = $tif_id;
			

			$query_result = DB::table('tif_details')
								->where(function($query) use ($filter_array){				
									$query = DataHelper::filter_data($query,"tif_details.tif_id",$filter_array,"int");
								});

			//execute query and specify columns to retrive
			$result = $query_result->get(
				array("tif_details.id",
					"tif_details.tif_id",
					"tif_details.reserve_code",
					"tif_details.stock_survey_number",
					"tif_details.tree_number",
					"tif_details.species_id",
					"tif_details.tree_length",
					"tif_details.diameter1",
					"tif_details.diameter2",
					"tif_details.volume")
				);

			$out = array_map(function($data){
				
				$arr = array();
				$arr["id"] = $data->id;
				$arr["tifId"] = $data->tif_id;
				$arr["reserveCode"] = $data->reserve_code;
				$arr["stockSurveyNumber"] = $data->stock_survey_number;
				$arr["treeNumber"] = $data->tree_number;
				$arr["speciesId"] = $data->species_id;
				$arr["treeLength"] = HelperFunction::format_to_2_decimal_places($data->tree_length);
				$arr["diameter1"] = HelperFunction::format_to_2_decimal_places($data->diameter1);
				$arr["diameter2"] = HelperFunction::format_to_2_decimal_places($data->diameter2);
				$arr["volume"] = HelperFunction::format_to_2_decimal_places($data->volume);

				return $arr;
			},$result);

			return $out;
		}catch(Exception $e){
			return HelperFunction::catch_error($e,true,HelperFunction::get_admin_error_msg());
		}
	}
}
