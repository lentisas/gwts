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