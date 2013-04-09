<?php

return array(

			/*
			|--------------------------------------------------------------------------
			| Flag to determine the type of messages to display.
			|--------------------------------------------------------------------------
			|By default the application assumes  it is in a development 
			|environment  so technical or exception messages are displayed on the client side.The application 
			|will display a user friendly message if environment = 'production' is set.
			|
			*/
			'environment' => 'production',
			/*
			|--------------------------------------------------------------------------
			| Generic friendly message to send to the client side when an error ocurrs
			|--------------------------------------------------------------------------
			|Generic Error message to display to a user when an error occures in a production 
			|environment.Techinical messages will always be displayed when app is in 
			|development mode.
			*/
			'global_error_message' => 'an error occurred.contact your admin',
			/*
			|--------------------------------------------------------------------------
			| Default Ticket_Status Id
			|--------------------------------------------------------------------------
			|Default ticket_status_id as auto-generated in the db table ticket_statuses
			|
			|
			*/
			'default_ticket_status'=>1,
			/*
			|--------------------------------------------------------------------------
			| Closed ticket_status Id
			|--------------------------------------------------------------------------
			|The id of a closed ticket_status in the ticket_statuses table
			|
			|
			*/
			'closed_ticket_status_id'=>2,
			/*
			|--------------------------------------------------------------------------
			| Resolved ticket_status Id
			|--------------------------------------------------------------------------
			|The id of a resolved ticket in the ticket_statuses table
			|
			|
			*/
			'resolved_ticket_status_id'=>3,
			/*
			|--------------------------------------------------------------------------
			| UnResolved ticket_status Id
			|--------------------------------------------------------------------------
			|The id of an unresolved ticket in the ticket_statuses table
			|
			|
			*/
			'unresolved_ticket_status_id'=>4,
			/*
			|--------------------------------------------------------------------------
			| Securable/System Object Permissions
			|--------------------------------------------------------------------------
			|Permissions to set on system objects.Will be used on the clientSide
			|
			|
			*/
			'secuable_permissions'=>array(

					array('canView'=>'Can View'),
					array('canInsert'=>'Can Insert'),
					array('canUpdate'=>'Can Update'),
					array('canDelete'=>'Can Delete'),
					array('canSearch'=>'Can Search'),
					array('canReport'=>'Can Report'),

				),
			/*
			|--------------------------------------------------------------------------
			| Modules Object Permissions
			|--------------------------------------------------------------------------
			|Permissions to set on system modules.Will be used on the clientSide
			|
			|
			*/
			'module_permissions'=>array(

					array('canView'=>'Can View'),
				),
			/*
			|--------------------------------------------------------------------------
			| Value to indicate whether the application should run in test mode or not
			|--------------------------------------------------------------------------
			|This config valud should be set to false if test are not being run
			|
			|
			*/
		'testing'=>true,

		/*
			|--------------------------------------------------------------------------
			| Value to indicate whether the application should run in test mode or not
			|--------------------------------------------------------------------------
			|This config valud should be set to false if test are not being run
			|
			|
			*/
			//'product_file_path'=>'..\pharmacy\Files\products_list.txt',
			'product_file_path'=>'..//pharmacy//Files//products_list.txt', //linux fix
           /*
			|--------------------------------------------------------------------------
			| DEFAULT CUSTOMER_ID VALUE
			|--------------------------------------------------------------------------
			|The default customer_id value to use during inserts into table that require
			|a customer_id.
			|
			*/
			'default_customer_id'=>1,
                        /*
			|--------------------------------------------------------------------------
			| DEFAULT PAYMENT_MODE_ID VALUE
			|--------------------------------------------------------------------------
			|The default customer_id value to use during inserts into table that require
			|a customer_id.
			|
			*/
			'default_payment_mode_id'=>1,
			/*
			|--------------------------------------------------------------------------
			| Closed state
			|--------------------------------------------------------------------------
			|This state will be used to represent the closed state on the profit percentages and 
			|purchase orders tables.
			|
			|
			*/
			'closed_state'=>0,
			/*
			|--------------------------------------------------------------------------
			| Opened state
			|--------------------------------------------------------------------------
			|This state will be used to represent the opened state on the profit percentages and 
			|purchase orders tables.
			*/
			'opened_state'=>1,
			/*
			|--------------------------------------------------------------------------
			| Default Page Number 
			|--------------------------------------------------------------------------
			|This state will be used to represent the opened state on the profit percentages and 
			|purchase orders table
			*/
			'default_page_size'=>25,
			/*
			|--------------------------------------------------------------------------
			| Purchases Stock HistoryId
			|--------------------------------------------------------------------------
			|The Id to use to represent a Purchase transaction in the StockHistorySource
			|table
			*/
			'purchase_stock_history_id'=>1,
			/*
			|--------------------------------------------------------------------------
			| Sales Stock History Id
			|--------------------------------------------------------------------------
			|The Id to use to represent a Sales transaction in the StockHistorySource
			|table
			*/
			'sales_stock_history_id'=>2,
			/*
			|--------------------------------------------------------------------------
			| System Administrator Id
			|--------------------------------------------------------------------------
			|This id is the id of the administrator role.
			*/
			'admin_id'=>1,
			/*
			|--------------------------------------------------------------------------
			| True state
			|--------------------------------------------------------------------------
			|This state will be used to represent the true state on the  
			|purchase orders table.
			*/
			'true_state'=>1,
			/*
			|--------------------------------------------------------------------------
			| False state
			|--------------------------------------------------------------------------
			|This state will be used to represent the false state on the  
			|purchase orders table.
			*/
			'false_state'=>0,
			/*
			|--------------------------------------------------------------------------
			| Purchase Type
			|--------------------------------------------------------------------------
			|This state will be used to show that the transaction is a purchase.			
			*/
			'is_purchase'=>1,
			/*
			|--------------------------------------------------------------------------
			| Sale Type
			|--------------------------------------------------------------------------
			|This state will be used to show that the transaction is a sale.
			*/
			'is_sale'=>2,
			/*
			|--------------------------------------------------------------------------
			| Sell Expired Products
			|--------------------------------------------------------------------------
			|Used to determine whether system should ignor expiry dates when making sells or not
			|
			*/
			'sell_expired_products'=>false,
			/*
			|--------------------------------------------------------------------------
			| appointments
			|--------------------------------------------------------------------------
			|Used to determine the users who can be assigned appointments
			|
			*/
			'appointments'=>2,
			/*
			|--------------------------------------------------------------------------
			| Opened appointment status id
			|--------------------------------------------------------------------------
			|Used to keep the id of the opened appointment status
			|
			*/
			'opened_appointment'=>1,
			/*
			|--------------------------------------------------------------------------
			| Closed appointment status id
			|--------------------------------------------------------------------------
			|Used to keep the id of the closed appointment status
			|
			*/
			'closed_appointment'=>2,
			/*
			|--------------------------------------------------------------------------
			| Cancelled appointment status id
			|--------------------------------------------------------------------------
			|Used to keep the id of the cancelled appointment status
			|
			*/
			'cancelled_appointment'=>3,
			/*
			|--------------------------------------------------------------------------
			| Cedi id
			|--------------------------------------------------------------------------
			|Used to keep the id of the cedi currency
			|
			*/
			'cedi_id'=>1,
			/*
			|--------------------------------------------------------------------------
			| dollar id
			|--------------------------------------------------------------------------
			|Used to keep the id of the dollar currency
			|
			*/
			'dollar_id'=>2,
			//custom validation messages
			'validation_messages' => array(
    			'StaffType_min' => 'Please select the staff type',
    			'ExpenseType_min' => 'Please select the expense type',
    			'Staff_min' => 'Please select the staff',
    			'DepositType_min' => 'Please select the deposit type',
    			'BankAccount_min' => 'Please select the bank account',
    			'Currency_min' => 'Please select the currency',
    			'Product_min' => 'Please select a product',
    			'StaffTitle_min' => 'please select the staff title'
			),
			/*
			|--------------------------------------------------------------------------
			| doctor staff type id
			|--------------------------------------------------------------------------
			|Used to keep the id of the doctor staff type
			|
			*/
			'doctor_staff_type_id' =>1,
			/*
			|--------------------------------------------------------------------------
			| Use File System
			|--------------------------------------------------------------------------
			|This config valud should be set to false if we decide to store images in the db
			|
			|
			*/
			'use_file_system'=>false,
			/*
			|--------------------------------------------------------------------------
			| Path for Uploaded Pictures
			|--------------------------------------------------------------------------
			|This config valud should be set to false if test are not being run
			|
			|
			*/
			//'pictures_path'=>'public/img/uploads/',
			'pictures_path' => path("public") . "uploads",
			/*
			|--------------------------------------------------------------------------
			| Path for Uploaded Pictures
			|--------------------------------------------------------------------------
			|This config valud should be set to false if test are not being run
			|
			|
			*/
			'picture_preview_path'=>'uploads'
);
