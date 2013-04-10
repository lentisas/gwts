<?php

class Create_Lmccs {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		// create the lmccs table
		Schema::create('lmccs', function($table) {
			$table->engine = 'InnoDB';
		    $table->increments('id');
		    $table->string('reference_number', 128)->unique();
		    $table->integer('company_id')->unsigned();
		    $table->integer('forest_district_id')->unsigned();
		    $table->string('lif_ref');
		    $table->string('drivers_name')->nullable();
		    $table->string('vehicle_number')->nullable();
		    $table->string('destination')->nullable();
		    $table->string('check_point')->nullable();
		    $table->string('sawmill')->nullable();
		    $table->string('fsd_officer_name')->nullable();
		    $table->date('issue_date');
		    $table->date('expiry_date');
		    $table->string('property_mark_agent_name')->nullable();
		    $table->string('tidd_officer_name')->nullable();
		    $table->string('tidd_officer_number')->nullable();
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
		Schema::drop('lmccs');
	}

}