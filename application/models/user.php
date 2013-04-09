<?php
class User extends Eloquent{

	public function create_user($client_data){
		try{

			$inputs = array("name" => $client_data->name, 
"user_name" => $client_data->userName, 
"email" => $client_data->email, 
"phone" => $client_data->phone, 
"password" => $client_data->password, 
);
			$rules = array("name" => "required|max:128", 
"user_name" => "required|max:128", 
"email" => "required|max:128", 
"phone" => "required|max:128", 
"password" => "required|max:128", 
);

			$validation = MyValidator::validate_user_input($inputs,$rules);
			if($validation->fails())
				return HelperFunction::catch_error(null,false,HelperFunction::format_message($validation->errors->all()));

			$arr = DataHelper::create_audit_entries(HelperFunction::get_user_id());
$arr["name"] = $client_data->name;
$arr["user_name"] = $client_data->userName;
$arr["email"] = $client_data->email;
$arr["phone"] = $client_data->phone;
$arr["password"] = $client_data->password;

			$inserted_record = DataHelper::insert_record('users',$arr,'User');
			if(!$inserted_record['success'])
				throw new Exception($inserted_record['message']);

			return $inserted_record;
		}catch(Exception $e){
			return HelperFunction::catch_error($e,true,HelperFunction::get_admin_error_msg());
		}
	}

	public function update_user($client_data){
		try{

			$inputs = array("id" => $client_data->id, 
"name" => $client_data->name, 
"user_name" => $client_data->userName, 
"email" => $client_data->email, 
"phone" => $client_data->phone, 
"password" => $client_data->password, 
);
			$rules = array("id" => "required|numeric", 
"name" => "required|max:128", 
"user_name" => "required|max:128", 
"email" => "required|max:128", 
"phone" => "required|max:128", 
"password" => "required|max:128", 
);

			$validation = MyValidator::validate_user_input($inputs,$rules);
			if($validation->fails())
				return HelperFunction::catch_error(null,false,HelperFunction::format_message($validation->errors->all()));

			$arr = DataHelper::update_audit_entries(HelperFunction::get_user_id());
$arr["id"] = $client_data->id;
$arr["name"] = $client_data->name;
$arr["user_name"] = $client_data->userName;
$arr["email"] = $client_data->email;
$arr["phone"] = $client_data->phone;
$arr["password"] = $client_data->password;

			$updated_record = DataHelper::update_record('users',$arr['id'],$arr,'User');
			if(!$updated_record['success'])
				throw new Exception($updated_record['message'],1);

			return $updated_record;
		}catch(Exception $e){
			return HelperFunction::catch_error($e,true,HelperFunction::get_admin_error_msg());
		}
	}

	public function delete_user($id){		
		try{

			$deleted_entry = DB::table('users')->delete($id);
			return  DataHelper::return_json_data($deleted_entry,true,'User has been deleted',1);

		}catch(Exception $e){
			return HelperFunction::catch_error($e,true);
		}
	}

	public function get_users($client_data){
		try{
			$filter_array = array();
if(array_key_exists("id", $client_data))
$filter_array["users.id"] = $client_data["id"];
if(array_key_exists("name", $client_data))
$filter_array["users.name"] = "%".$client_data["name"]."%";
if(array_key_exists("userName", $client_data))
$filter_array["users.user_name"] = "%".$client_data["userName"]."%";
if(array_key_exists("email", $client_data))
$filter_array["users.email"] = "%".$client_data["email"]."%";
if(array_key_exists("phone", $client_data))
$filter_array["users.phone"] = "%".$client_data["phone"]."%";
if(array_key_exists("password", $client_data))
$filter_array["users.password"] = "%".$client_data["password"]."%";

			$query_result = DB::table('users')
								->where(function($query) use ($filter_array){				
									$query = DataHelper::filter_data($query,"users.id",$filter_array,"int");
$query = DataHelper::filter_data($query,"users.name",$filter_array,"string","like");
$query = DataHelper::filter_data($query,"users.user_name",$filter_array,"string","like");
$query = DataHelper::filter_data($query,"users.email",$filter_array,"string","like");
$query = DataHelper::filter_data($query,"users.phone",$filter_array,"string","like");
$query = DataHelper::filter_data($query,"users.password",$filter_array,"string","like");

							});

			$total = $query_result->count();

			$query_result = $query_result->order_by('users.id','desc');

			$paging_result = array_key_exists('page', $client_data) ? 
							HelperFunction::paginate($client_data['page'],$client_data['limit'], $query_result):$query_result;

        	//execute query and specify columns to retrive
			$result = $paging_result->get(
						array("users.id",
"users.name",
"users.user_name",
"users.email",
"users.phone",
"users.password",
"users.created_by",
"users.updated_by",
"users.created_at",
"users.updated_at",
)
						);

			$out = array_map(function($data){
				
					$arr = array();
					$arr["id"] = $data->id;
$arr["name"] = $data->name;
$arr["userName"] = $data->user_name;
$arr["email"] = $data->email;
$arr["phone"] = $data->phone;
$arr["password"] = $data->password;
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
