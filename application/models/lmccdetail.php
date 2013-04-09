<?php
class LmccDetail extends Eloquent{

	public function create_lmcc_detail($client_data){
		try{

			$inputs = array("lmcc_id" => $client_data->lmccId, 
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
				"volume" => $client_data->volume, 
				"defects" => $client_data->defects, 
				"grade" => $client_data->grade, 
				);
			$rules = array("lmcc_id" => "required|numeric", 
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
				"volume" => "required", 
				"defects" => "required|max:128", 
				"grade" => "required|max:128", 
				);

			$validation = MyValidator::validate_user_input($inputs,$rules);
			if($validation->fails())
				return HelperFunction::catch_error(null,false,HelperFunction::format_message($validation->errors->all()));

			$arr = DataHelper::create_audit_entries(HelperFunction::get_user_id());
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

			$inserted_record = DataHelper::insert_record('lmcc_details',$arr,'Lmcc Detail');
			if(!$inserted_record['success'])
				throw new Exception($inserted_record['message']);

			return $inserted_record;
		}catch(Exception $e){
			return HelperFunction::catch_error($e,true,HelperFunction::get_admin_error_msg());
		}
	}

	public function update_lmcc_detail($client_data){
		try{

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
				"volume" => $client_data->volume, 
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
				"volume" => "required", 
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

			return $updated_record;
		}catch(Exception $e){
			return HelperFunction::catch_error($e,true,HelperFunction::get_admin_error_msg());
		}
	}

	public function delete_lmcc_detail($id){		
		try{

			$deleted_entry = DB::table('lmcc_details')->delete($id);
			return  DataHelper::return_json_data($deleted_entry,true,'Lmcc Detail has been deleted',1);

		}catch(Exception $e){
			return HelperFunction::catch_error($e,true);
		}
	}

	public function get_lmcc_details($client_data){
		try{
			$filter_array = array();
			if(array_key_exists("id", $client_data))
				$filter_array["lmcc_details.id"] = $client_data["id"];
			if(array_key_exists("lmccId", $client_data))
				$filter_array["lmcc_details.lmcc_id"] = $client_data["lmccId"];
			if(array_key_exists("tifId", $client_data))
				$filter_array["lmcc_details.tif_id"] = $client_data["tifId"];
			if(array_key_exists("reserveCode", $client_data))
				$filter_array["lmcc_details.reserve_code"] = "%".$client_data["reserveCode"]."%";
			if(array_key_exists("compartmentNumber", $client_data))
				$filter_array["lmcc_details.compartment_number"] = "%".$client_data["compartmentNumber"]."%";
			if(array_key_exists("stockNumber", $client_data))
				$filter_array["lmcc_details.stock_number"] = "%".$client_data["stockNumber"]."%";
			if(array_key_exists("treeNumber", $client_data))
				$filter_array["lmcc_details.tree_number"] = "%".$client_data["treeNumber"]."%";
			if(array_key_exists("logNumber", $client_data))
				$filter_array["lmcc_details.log_number"] = "%".$client_data["logNumber"]."%";
			if(array_key_exists("speciesId", $client_data))
				$filter_array["lmcc_details.species_id"] = $client_data["speciesId"];
			if(array_key_exists("db1", $client_data))
				$filter_array["lmcc_details.db1"] = $client_data["db1"];
			if(array_key_exists("db2", $client_data))
				$filter_array["lmcc_details.db2"] = $client_data["db2"];
			if(array_key_exists("db", $client_data))
				$filter_array["lmcc_details.db"] = $client_data["db"];
			if(array_key_exists("dt1", $client_data))
				$filter_array["lmcc_details.dt1"] = $client_data["dt1"];
			if(array_key_exists("dt2", $client_data))
				$filter_array["lmcc_details.dt2"] = $client_data["dt2"];
			if(array_key_exists("dt", $client_data))
				$filter_array["lmcc_details.dt"] = $client_data["dt"];
			if(array_key_exists("length", $client_data))
				$filter_array["lmcc_details.length"] = $client_data["length"];
			if(array_key_exists("volume", $client_data))
				$filter_array["lmcc_details.volume"] = $client_data["volume"];
			if(array_key_exists("defects", $client_data))
				$filter_array["lmcc_details.defects"] = "%".$client_data["defects"]."%";
			if(array_key_exists("grade", $client_data))
				$filter_array["lmcc_details.grade"] = "%".$client_data["grade"]."%";

			$query_result = DB::table('lmcc_details')
			->where(function($query) use ($filter_array){				
				$query = DataHelper::filter_data($query,"lmcc_details.id",$filter_array,"int");
				$query = DataHelper::filter_data($query,"lmcc_details.lmcc_id",$filter_array,"int");
				$query = DataHelper::filter_data($query,"lmcc_details.tif_id",$filter_array,"int");
				$query = DataHelper::filter_data($query,"lmcc_details.reserve_code",$filter_array,"string","like");
				$query = DataHelper::filter_data($query,"lmcc_details.compartment_number",$filter_array,"string","like");
				$query = DataHelper::filter_data($query,"lmcc_details.stock_number",$filter_array,"string","like");
				$query = DataHelper::filter_data($query,"lmcc_details.tree_number",$filter_array,"string","like");
				$query = DataHelper::filter_data($query,"lmcc_details.log_number",$filter_array,"string","like");
				$query = DataHelper::filter_data($query,"lmcc_details.species_id",$filter_array,"int");
				$query = DataHelper::filter_data($query,"lmcc_details.db1",$filter_array,"int");
				$query = DataHelper::filter_data($query,"lmcc_details.db2",$filter_array,"int");
				$query = DataHelper::filter_data($query,"lmcc_details.db",$filter_array,"int");
				$query = DataHelper::filter_data($query,"lmcc_details.dt1",$filter_array,"int");
				$query = DataHelper::filter_data($query,"lmcc_details.dt2",$filter_array,"int");
				$query = DataHelper::filter_data($query,"lmcc_details.dt",$filter_array,"int");
				$query = DataHelper::filter_data($query,"lmcc_details.length",$filter_array,"int");
				$query = DataHelper::filter_data($query,"lmcc_details.volume",$filter_array,"int");
				$query = DataHelper::filter_data($query,"lmcc_details.defects",$filter_array,"string","like");
				$query = DataHelper::filter_data($query,"lmcc_details.grade",$filter_array,"string","like");

			});

$total = $query_result->count();

$query_result = $query_result->order_by('lmcc_details.id','desc');

$paging_result = array_key_exists('page', $client_data) ? 
HelperFunction::paginate($client_data['page'],$client_data['limit'], $query_result):$query_result;

        	//execute query and specify columns to retrive
$result = $paging_result->get(
	array("lmcc_details.id",
		"lmcc_details.lmcc_id",
		"lmcc_details.tif_id",
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
		"lmcc_details.created_by",
		"lmcc_details.updated_by",
		"lmcc_details.created_at",
		"lmcc_details.updated_at",
		)
	);

$out = array_map(function($data){
	
	$arr = array();
	$arr["id"] = $data->id;
	$arr["lmccId"] = $data->lmcc_id;
	$arr["tifId"] = $data->tif_id;
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
	$arr["defects"] = $data->defects;
	$arr["grade"] = $data->grade;
	$arr["createdBy"] = $data->created_by;
	$arr["updatedBy"] = $data->updated_by;
	$arr["createdAt"] = HelperFunction::format_date_to_client($data->created_at);
	$arr["updatedAt"] = HelperFunction::format_date_to_client($data->updated_at);

	return $arr;
},$result);

return HelperFunction::return_json_data($out,true,'record loaded',$total);
}catch(Exception $e){
	return HelperFunction::catch_error($e,true,HelperFunction::get_admin_error_msg());
}
}
}
