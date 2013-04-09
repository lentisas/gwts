<?php

class Create_Tif_Details {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		// create the tif_details table
		Schema::create('tif_details', function($table) {
			$table->engine = 'InnoDB';
		    $table->increments('id');
		    $table->integer('tif_id')->unsigned();
		    $table->string('reserve_code', 64);		    
		    $table->string('stock_survey_number');
		    $table->string('tree_number');
		    $table->integer('species_id')->unsigned();
		    $table->float('tree_length')->nullable();
		    $table->float('diameter1')->nullable();
		    $table->float('diameter2')->nullable();
		    $table->float('volume')->nullable();
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
		Schema::drop('tif_details');
	}

}