<?php

return array(

			/*
			|--------------------------------------------------------------------------
			| Default validation lookUp rule
			|--------------------------------------------------------------------------
			|The default validation rule for any look up table
			|which has the following columns id,name description.
			|This validation rule should be applied during inserts
			*/
			'default_lookup_rules' => array('name'=>'required|max:128'),
			/*
			|--------------------------------------------------------------------------
			| Default lookup update validation rule
			|--------------------------------------------------------------------------
			|The default validation rule for any look up table
			|which has the following columns id,name description.
			|This validation rule should be applied during updates
			|
			*/
			'default_loolup_update_rules' => array('id'=>'required|numeric','name'=>'required|max:128'),
			/*
			|--------------------------------------------------------------------------
			| User model validation rule
			|--------------------------------------------------------------------------
			|Validation rules to be applied to the user model before a save or update operation
			*/
			'user_rules' => array('firstName'=>'required|max:128','lastName'=>'required|max:128','email'=>'required|email',
										'password'=>'required|max:128','userName'=>'required|max:128',
												'roleId'=>'required|numeric'),
			/*
			|--------------------------------------------------------------------------
			| User model update_user_profile rules
			|--------------------------------------------------------------------------
			|Validation rules to be applied to the user model before a profile update
			*/
			'update_user_profile_rule' => array('firstName'=>'required|max:128','lastName'=>'required|max:128','email'=>'required|email','userName'=>'required|max:128'),
			/*
			|--------------------------------------------------------------------------
			| User model change password validation rule
			|--------------------------------------------------------------------------
			|Validation rules to be applied to the user model when changing a password
			*/
			'change_password' => array('oldPassword'=>'required|max:128','newPassword'=>'required|max:128','confirmPassword'=>'required|max:128'),
			/*
			|--------------------------------------------------------------------------
			| Module validation rule
			|--------------------------------------------------------------------------
			|Validation rules to be applied to the module entity
			*/
			'create_module_rule' => array('name'=>'required|max:128'),
			/*
			|--------------------------------------------------------------------------
			| Permissions Validation Rule
			|--------------------------------------------------------------------------
			|Validation rules to be applied to the Permissions entity
			*/
			'create_permisson_rule' => array('role_id'=>'required|numeric','securable_id'=>'required|numeric'),
			/*
			|--------------------------------------------------------------------------
			| Module Permission Validation Rule
			|--------------------------------------------------------------------------
			|Securable Validation rule
			*/
			'create_module_permission_rule' => array('moduleId'=>'required|numeric','roleId'=>'required|numeric','permissions'=>'required'),
            /*
			|--------------------------------------------------------------------------
			| Securable Validation Rule
			|--------------------------------------------------------------------------
			|Securable Validation rule
			*/
			'create_securable_rule' => array('name'=>'required|max:128','display_name'=>'required|max:128','module_id'=>'required|numeric'),
			/*
			|--------------------------------------------------------------------------
			| Patient Validation Rule
			|--------------------------------------------------------------------------
			|Patient Validation rule
			*/
			'patient_rules' => array('first_name'=>'required|max:128','last_name'=>'required|max:128',
				'gender'=>'required','date_of_birth'=>'required'),
			/*
			|--------------------------------------------------------------------------
			| Contact Person Validation Rule
			|--------------------------------------------------------------------------
			|Contact Person Validation rule
			*/
			'contact_person_rules' => array('name'=>'required|max:128','relation_id'=>'required|numeric'),
			/*
			|--------------------------------------------------------------------------
			| Exchange Rates validation rule
			|--------------------------------------------------------------------------
			|Exchange Rates validation rule
			*/
			'exchange_rate_rules' => array('currency_id'=>'required|numeric','rate'=>'required|numeric'),
			/*
			|--------------------------------------------------------------------------
			| Invoice validation rule
			|--------------------------------------------------------------------------
			|Invoice validation rule
			*/
			'invoice_rules' => array('patient_id'=>'required|numeric','total_amount'=>'required|numeric'),
			/*
			|--------------------------------------------------------------------------
			| Invoice validation rule
			|--------------------------------------------------------------------------
			|Invoice validation rule
			*/
			'invoice_item_rules' => array('service_id'=>'required|numeric','cost'=>'required|numeric'),
			/*
			|--------------------------------------------------------------------------
			| Payment validation rule
			|--------------------------------------------------------------------------
			|Payment validation rule
			*/
			'payment_rules' => array('patient_id'=>'required|numeric','amount'=>'required|numeric'),
			/*
			|--------------------------------------------------------------------------
			| Appointment validation rule
			|--------------------------------------------------------------------------
			|Appointment validation rule
			*/
			'appointment_rules' => array('patient_id'=>'required|numeric','assigned_to'=>'required|numeric','title'=>'required|max:128',
				'appointment_date'=>'required','start_time'=>'required','end_time'=>'required','appointment_status_id'=>'required|numeric',
				'appointment_type_id'=>'required|numeric')

			
		);
		
		
