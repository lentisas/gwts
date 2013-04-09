<?php
class Tuc extends Eloquent{

	public function create_tuc($client_data){
		try{

			$inputs = array("reference_number" => $client_data->referenceNumber, 
"name" => $client_data->name, 
"company_id" => $client_data->companyId, 
"mlnr_approval_ref" => $client_data->mlnrApprovalRef, 
"date_of_award" => $client_data->dateOfAward, 
"date_of_expiry" => $client_data->dateOfExpiry, 
"duration_in_years" => $client_data->durationInYears, 
"forest_reserve_code" => $client_data->forestReserveCode, 
"area" => $client_data->area, 
"total_compartment_area" => $client_data->totalCompartmentArea, 
"date_of_grant" => $client_data->dateOfGrant, 
"duration_of_grant" => $client_data->durationOfGrant, 
"date_of_endorsement" => $client_data->dateOfEndorsement, 
"notification_letter_ref" => $client_data->notificationLetterRef, 
"rights_invoice_ref" => $client_data->rightsInvoiceRef, 
"payment_status" => $client_data->paymentStatus, 
"forest_management_plan_ref" => $client_data->forestManagementPlanRef, 
"delineation_completed" => $client_data->delineationCompleted, 
"map_ref" => $client_data->mapRef, 
);
			$rules = array("reference_number" => "required|max:128", 
"name" => "required|max:128", 
"company_id" => "required|numeric", 
"mlnr_approval_ref" => "required|max:128", 
"date_of_award" => "required", 
"date_of_expiry" => "required", 
"duration_in_years" => "required", 
"forest_reserve_code" => "required|max:128", 
"area" => "required|max:128", 
"total_compartment_area" => "required", 
"date_of_grant" => "required", 
"duration_of_grant" => "required", 
"date_of_endorsement" => "required", 
"notification_letter_ref" => "required|max:128", 
"rights_invoice_ref" => "required|max:128", 
"payment_status" => "required|max:128", 
"forest_management_plan_ref" => "required|max:128", 
"delineation_completed" => "required|max:128", 
"map_ref" => "required|max:128", 
);

			$validation = MyValidator::validate_user_input($inputs,$rules);
			if($validation->fails())
				return HelperFunction::catch_error(null,false,HelperFunction::format_message($validation->errors->all()));

			$arr = DataHelper::create_audit_entries(HelperFunction::get_user_id());
$arr["reference_number"] = $client_data->referenceNumber;
$arr["name"] = $client_data->name;
$arr["company_id"] = $client_data->companyId;
$arr["mlnr_approval_ref"] = $client_data->mlnrApprovalRef;
$arr["date_of_award"] = $client_data->dateOfAward;
$arr["date_of_expiry"] = $client_data->dateOfExpiry;
$arr["duration_in_years"] = $client_data->durationInYears;
$arr["forest_reserve_code"] = $client_data->forestReserveCode;
$arr["area"] = $client_data->area;
$arr["total_compartment_area"] = $client_data->totalCompartmentArea;
$arr["date_of_grant"] = $client_data->dateOfGrant;
$arr["duration_of_grant"] = $client_data->durationOfGrant;
$arr["date_of_endorsement"] = $client_data->dateOfEndorsement;
$arr["notification_letter_ref"] = $client_data->notificationLetterRef;
$arr["rights_invoice_ref"] = $client_data->rightsInvoiceRef;
$arr["payment_status"] = $client_data->paymentStatus;
$arr["forest_management_plan_ref"] = $client_data->forestManagementPlanRef;
$arr["delineation_completed"] = $client_data->delineationCompleted;
$arr["map_ref"] = $client_data->mapRef;

			$inserted_record = DataHelper::insert_record('tucs',$arr,'Tuc');
			if(!$inserted_record['success'])
				throw new Exception($inserted_record['message']);

			return $inserted_record;
		}catch(Exception $e){
			return HelperFunction::catch_error($e,true,HelperFunction::get_admin_error_msg());
		}
	}

	public function update_tuc($client_data){
		try{

			$inputs = array("id" => $client_data->id, 
"reference_number" => $client_data->referenceNumber, 
"name" => $client_data->name, 
"company_id" => $client_data->companyId, 
"mlnr_approval_ref" => $client_data->mlnrApprovalRef, 
"date_of_award" => $client_data->dateOfAward, 
"date_of_expiry" => $client_data->dateOfExpiry, 
"duration_in_years" => $client_data->durationInYears, 
"forest_reserve_code" => $client_data->forestReserveCode, 
"area" => $client_data->area, 
"total_compartment_area" => $client_data->totalCompartmentArea, 
"date_of_grant" => $client_data->dateOfGrant, 
"duration_of_grant" => $client_data->durationOfGrant, 
"date_of_endorsement" => $client_data->dateOfEndorsement, 
"notification_letter_ref" => $client_data->notificationLetterRef, 
"rights_invoice_ref" => $client_data->rightsInvoiceRef, 
"payment_status" => $client_data->paymentStatus, 
"forest_management_plan_ref" => $client_data->forestManagementPlanRef, 
"delineation_completed" => $client_data->delineationCompleted, 
"map_ref" => $client_data->mapRef, 
);
			$rules = array("id" => "required|numeric", 
"reference_number" => "required|max:128", 
"name" => "required|max:128", 
"company_id" => "required|numeric", 
"mlnr_approval_ref" => "required|max:128", 
"date_of_award" => "required", 
"date_of_expiry" => "required", 
"duration_in_years" => "required", 
"forest_reserve_code" => "required|max:128", 
"area" => "required|max:128", 
"total_compartment_area" => "required", 
"date_of_grant" => "required", 
"duration_of_grant" => "required", 
"date_of_endorsement" => "required", 
"notification_letter_ref" => "required|max:128", 
"rights_invoice_ref" => "required|max:128", 
"payment_status" => "required|max:128", 
"forest_management_plan_ref" => "required|max:128", 
"delineation_completed" => "required|max:128", 
"map_ref" => "required|max:128", 
);

			$validation = MyValidator::validate_user_input($inputs,$rules);
			if($validation->fails())
				return HelperFunction::catch_error(null,false,HelperFunction::format_message($validation->errors->all()));

			$arr = DataHelper::update_audit_entries(HelperFunction::get_user_id());
$arr["id"] = $client_data->id;
$arr["reference_number"] = $client_data->referenceNumber;
$arr["name"] = $client_data->name;
$arr["company_id"] = $client_data->companyId;
$arr["mlnr_approval_ref"] = $client_data->mlnrApprovalRef;
$arr["date_of_award"] = $client_data->dateOfAward;
$arr["date_of_expiry"] = $client_data->dateOfExpiry;
$arr["duration_in_years"] = $client_data->durationInYears;
$arr["forest_reserve_code"] = $client_data->forestReserveCode;
$arr["area"] = $client_data->area;
$arr["total_compartment_area"] = $client_data->totalCompartmentArea;
$arr["date_of_grant"] = $client_data->dateOfGrant;
$arr["duration_of_grant"] = $client_data->durationOfGrant;
$arr["date_of_endorsement"] = $client_data->dateOfEndorsement;
$arr["notification_letter_ref"] = $client_data->notificationLetterRef;
$arr["rights_invoice_ref"] = $client_data->rightsInvoiceRef;
$arr["payment_status"] = $client_data->paymentStatus;
$arr["forest_management_plan_ref"] = $client_data->forestManagementPlanRef;
$arr["delineation_completed"] = $client_data->delineationCompleted;
$arr["map_ref"] = $client_data->mapRef;

			$updated_record = DataHelper::update_record('tucs',$arr['id'],$arr,'Tuc');
			if(!$updated_record['success'])
				throw new Exception($updated_record['message'],1);

			return $updated_record;
		}catch(Exception $e){
			return HelperFunction::catch_error($e,true,HelperFunction::get_admin_error_msg());
		}
	}

	public function delete_tuc($id){		
		try{

			$deleted_entry = DB::table('tucs')->delete($id);
			return  DataHelper::return_json_data($deleted_entry,true,'Tuc has been deleted',1);

		}catch(Exception $e){
			return HelperFunction::catch_error($e,true);
		}
	}

	public function get_tucs($client_data){
		try{
			$filter_array = array();
if(array_key_exists("id", $client_data))
$filter_array["tucs.id"] = $client_data["id"];
if(array_key_exists("referenceNumber", $client_data))
$filter_array["tucs.reference_number"] = "%".$client_data["referenceNumber"]."%";
if(array_key_exists("name", $client_data))
$filter_array["tucs.name"] = "%".$client_data["name"]."%";
if(array_key_exists("companyId", $client_data))
$filter_array["tucs.company_id"] = $client_data["companyId"];
if(array_key_exists("mlnrApprovalRef", $client_data))
$filter_array["tucs.mlnr_approval_ref"] = "%".$client_data["mlnrApprovalRef"]."%";
if(array_key_exists("dateOfAward", $client_data))
$filter_array["tucs.date_of_award"] = $client_data["dateOfAward"];
if(array_key_exists("dateOfExpiry", $client_data))
$filter_array["tucs.date_of_expiry"] = $client_data["dateOfExpiry"];
if(array_key_exists("durationInYears", $client_data))
$filter_array["tucs.duration_in_years"] = $client_data["durationInYears"];
if(array_key_exists("forestReserveCode", $client_data))
$filter_array["tucs.forest_reserve_code"] = "%".$client_data["forestReserveCode"]."%";
if(array_key_exists("area", $client_data))
$filter_array["tucs.area"] = "%".$client_data["area"]."%";
if(array_key_exists("totalCompartmentArea", $client_data))
$filter_array["tucs.total_compartment_area"] = $client_data["totalCompartmentArea"];
if(array_key_exists("dateOfGrant", $client_data))
$filter_array["tucs.date_of_grant"] = $client_data["dateOfGrant"];
if(array_key_exists("durationOfGrant", $client_data))
$filter_array["tucs.duration_of_grant"] = $client_data["durationOfGrant"];
if(array_key_exists("dateOfEndorsement", $client_data))
$filter_array["tucs.date_of_endorsement"] = $client_data["dateOfEndorsement"];
if(array_key_exists("notificationLetterRef", $client_data))
$filter_array["tucs.notification_letter_ref"] = "%".$client_data["notificationLetterRef"]."%";
if(array_key_exists("rightsInvoiceRef", $client_data))
$filter_array["tucs.rights_invoice_ref"] = "%".$client_data["rightsInvoiceRef"]."%";
if(array_key_exists("paymentStatus", $client_data))
$filter_array["tucs.payment_status"] = "%".$client_data["paymentStatus"]."%";
if(array_key_exists("forestManagementPlanRef", $client_data))
$filter_array["tucs.forest_management_plan_ref"] = "%".$client_data["forestManagementPlanRef"]."%";
if(array_key_exists("delineationCompleted", $client_data))
$filter_array["tucs.delineation_completed"] = "%".$client_data["delineationCompleted"]."%";
if(array_key_exists("mapRef", $client_data))
$filter_array["tucs.map_ref"] = "%".$client_data["mapRef"]."%";

			$query_result = DB::table('tucs')
								->where(function($query) use ($filter_array){				
									$query = DataHelper::filter_data($query,"tucs.id",$filter_array,"int");
$query = DataHelper::filter_data($query,"tucs.reference_number",$filter_array,"string","like");
$query = DataHelper::filter_data($query,"tucs.name",$filter_array,"string","like");
$query = DataHelper::filter_data($query,"tucs.company_id",$filter_array,"int");
$query = DataHelper::filter_data($query,"tucs.mlnr_approval_ref",$filter_array,"string","like");
$query = DataHelper::filter_data($query,"tucs.date_of_award",$filter_array,"date");
$query = DataHelper::filter_data($query,"tucs.date_of_expiry",$filter_array,"date");
$query = DataHelper::filter_data($query,"tucs.duration_in_years",$filter_array,"int");
$query = DataHelper::filter_data($query,"tucs.forest_reserve_code",$filter_array,"string","like");
$query = DataHelper::filter_data($query,"tucs.area",$filter_array,"string","like");
$query = DataHelper::filter_data($query,"tucs.total_compartment_area",$filter_array,"int");
$query = DataHelper::filter_data($query,"tucs.date_of_grant",$filter_array,"date");
$query = DataHelper::filter_data($query,"tucs.duration_of_grant",$filter_array,"int");
$query = DataHelper::filter_data($query,"tucs.date_of_endorsement",$filter_array,"date");
$query = DataHelper::filter_data($query,"tucs.notification_letter_ref",$filter_array,"string","like");
$query = DataHelper::filter_data($query,"tucs.rights_invoice_ref",$filter_array,"string","like");
$query = DataHelper::filter_data($query,"tucs.payment_status",$filter_array,"string","like");
$query = DataHelper::filter_data($query,"tucs.forest_management_plan_ref",$filter_array,"string","like");
$query = DataHelper::filter_data($query,"tucs.delineation_completed",$filter_array,"string","like");
$query = DataHelper::filter_data($query,"tucs.map_ref",$filter_array,"string","like");

							});

			$total = $query_result->count();

			$query_result = $query_result->order_by('tucs.id','desc');

			$paging_result = array_key_exists('page', $client_data) ? 
							HelperFunction::paginate($client_data['page'],$client_data['limit'], $query_result):$query_result;

        	//execute query and specify columns to retrive
			$result = $paging_result->get(
						array("tucs.id",
"tucs.reference_number",
"tucs.name",
"tucs.company_id",
"tucs.mlnr_approval_ref",
"tucs.date_of_award",
"tucs.date_of_expiry",
"tucs.duration_in_years",
"tucs.forest_reserve_code",
"tucs.area",
"tucs.total_compartment_area",
"tucs.date_of_grant",
"tucs.duration_of_grant",
"tucs.date_of_endorsement",
"tucs.notification_letter_ref",
"tucs.rights_invoice_ref",
"tucs.payment_status",
"tucs.forest_management_plan_ref",
"tucs.delineation_completed",
"tucs.map_ref",
"tucs.created_by",
"tucs.updated_by",
"tucs.created_at",
"tucs.updated_at",
)
						);

			$out = array_map(function($data){
				
					$arr = array();
					$arr["id"] = $data->id;
$arr["referenceNumber"] = $data->reference_number;
$arr["name"] = $data->name;
$arr["companyId"] = $data->company_id;
$arr["mlnrApprovalRef"] = $data->mlnr_approval_ref;
$arr["dateOfAward"] = HelperFunction::format_date_to_client($data->date_of_award);
$arr["dateOfExpiry"] = HelperFunction::format_date_to_client($data->date_of_expiry);
$arr["durationInYears"] = HelperFunction::format_to_2_decimal_places($data->duration_in_years);
$arr["forestReserveCode"] = $data->forest_reserve_code;
$arr["area"] = $data->area;
$arr["totalCompartmentArea"] = HelperFunction::format_to_2_decimal_places($data->total_compartment_area);
$arr["dateOfGrant"] = HelperFunction::format_date_to_client($data->date_of_grant);
$arr["durationOfGrant"] = HelperFunction::format_to_2_decimal_places($data->duration_of_grant);
$arr["dateOfEndorsement"] = HelperFunction::format_date_to_client($data->date_of_endorsement);
$arr["notificationLetterRef"] = $data->notification_letter_ref;
$arr["rightsInvoiceRef"] = $data->rights_invoice_ref;
$arr["paymentStatus"] = $data->payment_status;
$arr["forestManagementPlanRef"] = $data->forest_management_plan_ref;
$arr["delineationCompleted"] = $data->delineation_completed;
$arr["mapRef"] = $data->map_ref;
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
