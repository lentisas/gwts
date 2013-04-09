<?php
class Specie extends Eloquent{

	public static function create_specie($client_data){
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

			$inserted_record = DataHelper::insert_record('species',$arr,'Species');
			if(!$inserted_record['success'])
				throw new Exception($inserted_record['message']);

			return $inserted_record;
		}catch(Exception $e){
			return HelperFunction::catch_error($e,true,HelperFunction::get_admin_error_msg());
		}
	}

	public static function update_specie($client_data){
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

			$updated_record = DataHelper::update_record('species',$arr['id'],$arr,'Specie');
			if(!$updated_record['success'])
				throw new Exception($updated_record['message'],1);

			return $updated_record;
		}catch(Exception $e){
			return HelperFunction::catch_error($e,true,HelperFunction::get_admin_error_msg());
		}
	}

	public static function delete_specie($id){		
		try{

			$deleted_entry = DB::table('species')->delete($id);
			return  DataHelper::return_json_data($deleted_entry,true,'Specie has been deleted',1);

		}catch(Exception $e){
			return HelperFunction::catch_error($e,true);
		}
	}

	public static function get_species($client_data){
		try{
			$filter_array = array();
			if(array_key_exists("id", $client_data))
				$filter_array["species.id"] = $client_data["id"];
			
			$query_result = DB::table('species')
						->where(function($query) use ($filter_array){				
								$query = DataHelper::filter_data($query,"species.id",$filter_array,"int");
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
								"species.star_class")
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

						return $arr;
					},$result);

			return HelperFunction::return_json_data($out,true,'record loaded',$total);
		}catch(Exception $e){
			return HelperFunction::catch_error($e,true,HelperFunction::get_admin_error_msg());
		}
	}
}
