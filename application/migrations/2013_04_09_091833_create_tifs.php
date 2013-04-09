<?php

class Create_Tifs {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		// create the tifs table
		Schema::create('tifs', function($table) {
			$table->engine = 'InnoDB';
		    $table->increments('id');
		    $table->string('reference_number', 128)->unique();
		    $table->integer('tuc_id')->unsigned();
		    $table->integer('forest_district_id')->unsigned();
		    $table->date('date');
		    $table->string('range_supervisors_name')->nullable();
		    $table->string('contractors_name')->nullable();
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
		Schema::drop('tifs');
	}

}