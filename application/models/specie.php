<?php
class Specie extends Eloquent{

	public function create_specy($client_data){
		try{

			$inputs = array("latin" => $client_data->latin, 
"trade" => $client_data->trade, 
"felling_limit" => $client_data->fellingLimit, 
"species_code" => $client_data->speciesCode, 
"mean_tree_volume" => $client_data->meanTreeVolume, 
"star_class" => $client_data->starClass, 
);
			$rules = array("latin" => "required|max:128", 
"trade" => "required|max:128", 
"felling_limit" => "required|numeric", 
"species_code" => "required|max:128", 
"mean_tree_volume" => "required", 
"star_class" => "required|max:128", 
);

			$validation = MyValidator::validate_user_input($inputs,$rules);
			if($validation->fails())
				return HelperFunction::catch_error(null,false,HelperFunction::format_message($validation->errors->all()));

			$arr = DataHelper::create_audit_entries(HelperFunction::get_user_id());
$arr["latin"] = $client_data->latin;
$arr["trade"] = $client_data->trade;
$arr["felling_limit"] = $client_data->fellingLimit;
$arr["species_code"] = $client_data->speciesCode;
$arr["mean_tree_volume"] = $client_data->meanTreeVolume;
$arr["star_class"] = $client_data->starClass;

			$inserted_record = DataHelper::insert_record('species',$arr,'Specy');
			if(!$inserted_record['success'])
				throw new Exception($inserted_record['message']);

			return $inserted_record;
		}catch(Exception $e){
			return HelperFunction::catch_error($e,true,HelperFunction::get_admin_error_msg());
		}
	}

	public function update_specy($client_data){
		try{

			$inputs = array("id" => $client_data->id, 
"latin" => $client_data->latin, 
"trade" => $client_data->trade, 
"felling_limit" => $client_data->fellingLimit, 
"species_code" => $client_data->speciesCode, 
"mean_tree_volume" => $client_data->meanTreeVolume, 
"star_class" => $client_data->starClass, 
);
			$rules = array("id" => "required|numeric", 
"latin" => "required|max:128", 
"trade" => "required|max:128", 
"felling_limit" => "required|numeric", 
"species_code" => "required|max:128", 
"mean_tree_volume" => "required", 
"star_class" => "required|max:128", 
);

			$validation = MyValidator::validate_user_input($inputs,$rules);
			if($validation->fails())
				return HelperFunction::catch_error(null,false,HelperFunction::format_message($validation->errors->all()));

			$arr = DataHelper::update_audit_entries(HelperFunction::get_user_id());
$arr["id"] = $client_data->id;
$arr["latin"] = $client_data->latin;
$arr["trade"] = $client_data->trade;
$arr["felling_limit"] = $client_data->fellingLimit;
$arr["species_code"] = $client_data->speciesCode;
$arr["mean_tree_volume"] = $client_data->meanTreeVolume;
$arr["star_class"] = $client_data->starClass;

			$updated_record = DataHelper::update_record('species',$arr['id'],$arr,'Specy');
			if(!$updated_record['success'])
				throw new Exception($updated_record['message'],1);

			return $updated_record;
		}catch(Exception $e){
			return HelperFunction::catch_error($e,true,HelperFunction::get_admin_error_msg());
		}
	}

	public function delete_specy($id){		
		try{

			$deleted_entry = DB::table('species')->delete($id);
			return  DataHelper::return_json_data($deleted_entry,true,'Specy has been deleted',1);

		}catch(Exception $e){
			return HelperFunction::catch_error($e,true);
		}
	}

	public function get_species($client_data){
		try{
			$filter_array = array();
if(array_key_exists("id", $client_data))
$filter_array["species.id"] = $client_data["id"];
if(array_key_exists("latin", $client_data))
$filter_array["species.latin"] = "%".$client_data["latin"]."%";
if(array_key_exists("trade", $client_data))
$filter_array["species.trade"] = "%".$client_data["trade"]."%";
if(array_key_exists("fellingLimit", $client_data))
$filter_array["species.felling_limit"] = $client_data["fellingLimit"];
if(array_key_exists("speciesCode", $client_data))
$filter_array["species.species_code"] = "%".$client_data["speciesCode"]."%";
if(array_key_exists("meanTreeVolume", $client_data))
$filter_array["species.mean_tree_volume"] = $client_data["meanTreeVolume"];
if(array_key_exists("starClass", $client_data))
$filter_array["species.star_class"] = "%".$client_data["starClass"]."%";

			$query_result = DB::table('species')
								->where(function($query) use ($filter_array){				
									$query = DataHelper::filter_data($query,"species.id",$filter_array,"int");
$query = DataHelper::filter_data($query,"species.latin",$filter_array,"string","like");
$query = DataHelper::filter_data($query,"species.trade",$filter_array,"string","like");
$query = DataHelper::filter_data($query,"species.felling_limit",$filter_array,"int");
$query = DataHelper::filter_data($query,"species.species_code",$filter_array,"string","like");
$query = DataHelper::filter_data($query,"species.mean_tree_volume",$filter_array,"int");
$query = DataHelper::filter_data($query,"species.star_class",$filter_array,"string","like");

							});

			$total = $query_result->count();

			$query_result = $query_result->order_by('species.id','desc');

			$paging_result = array_key_exists('page', $client_data) ? 
							HelperFunction::paginate($client_data['page'],$client_data['limit'], $query_result):$query_result;

        	//execute query and specify columns to retrive
			$result = $paging_result->get(
						array("species.id",
"species.latin",
"species.trade",
"species.felling_limit",
"species.species_code",
"species.mean_tree_volume",
"species.star_class",
"species.created_by",
"species.updated_by",
"species.created_at",
"species.updated_at",
)
						);

			$out = array_map(function($data){
				
					$arr = array();
					$arr["id"] = $data->id;
$arr["latin"] = $data->latin;
$arr["trade"] = $data->trade;
$arr["fellingLimit"] = $data->felling_limit;
$arr["speciesCode"] = $data->species_code;
$arr["meanTreeVolume"] = HelperFunction::format_to_2_decimal_places($data->mean_tree_volume);
$arr["starClass"] = $data->star_class;
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
