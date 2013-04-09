<?php

class Create_Lif_Details {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		// create the lif_details table
		Schema::create('lif_details', function($table) {
			$table->engine = 'InnoDB';
		    $table->increments('id');
		    $table->integer('lif_id')->unsigned();
		    $table->integer('tif_id')->unsigned();
		    $table->string('reserve_code', 64);		    
		    $table->string('stock_survey_number');
		    $table->string('tree_number');
		    $table->integer('species_id')->unsigned();
		    $table->string('log_number');
		    $table->float('log_length')->nullable();
		    $table->float('db1')->nullable();
		    $table->float('db2')->nullable();
		    $table->float('dt1')->nullable();
		    $table->float('dt2')->nullable();
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
		Schema::drop('lif_details');
	}

}