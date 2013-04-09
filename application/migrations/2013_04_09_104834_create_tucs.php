<?php

class Create_Tucs {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		// create the tucs table
		Schema::create('tucs', function($table) {
			$table->engine = 'InnoDB';
		    $table->increments('id');
		    $table->string('reference_number', 128)->unique();
		    $table->string('name', 128);
		    $table->integer('company_id')->unsigned();
		    $table->string('mlnr_approval_ref', 128);
		    $table->date('date_of_award');
		    $table->date('date_of_expiry');
		    $table->float('duration_in_years');
		    $table->string('forest_reserve_code')->nullable();
		    $table->string('area');
		    $table->float('total_compartment_area')->nullable();
		    $table->date('date_of_grant');
		    $table->float('duration_of_grant');	
		    $table->date('date_of_endorsement');
		    $table->string('notification_letter_ref', 128);
		    $table->string('rights_invoice_ref', 128);
		    $table->string('payment_status', 128);
		    $table->string('forest_management_plan_ref', 128);
		    $table->string('delineation_completed', 128);
		    $table->string('map_ref', 128);	    		    	    
		    $table->integer('created_by')->unsigned();
		    $table->integer('updated_by')->unsigned();		    
		    $table->timestamps();		    
		});

		// insert a default lifs
		DB::table('tucs')->insert(array(
			array(
				'id' => 1,
				'reference_number' => 'BKTU0001',
				'name' => "John Menns",
            	'company_id'=> 1, 
            	'mlnr_approval_ref' => "LI0012".date('Ymd'),
				'date_of_award' => date('2013-04-01 00:00:00'),
            	'date_of_expiry'=> date('2020-04-01 00:00:00'),
            	'duration_in_years' => 7,
            	'forest_reserve_code'=> "FR0001".date('Ymd'),
            	'area' => '',
            	'total_compartment_area'=> 500.23,
            	'date_of_grant' => date('2013-03-01 00:00:00'),
				'duration_of_grant' => 7,
            	'date_of_endorsement'=> date('2013-04-01 00:00:00'),
            	'notification_letter_ref' => 'NTLT00102'.date('Ymd'),
            	'rights_invoice_ref'=> "RIN23451".date('Ymd'),
            	'payment_status' => 'paid',
            	'forest_management_plan_ref'=> "FMP001234".date('Ymd'),
            	'delineation_completed' => 'yes',
            	'map_ref'=> "MP00001".date('Ymd'),
            	'created_by' => 1,
				'updated_by' => 1,
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s')
			)));
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tucs');
	}

}