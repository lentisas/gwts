<?php

class Create_Lmcc_Details {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		// create the lmcc_details table
		Schema::create('lmcc_details', function($table) {
			$table->engine = 'InnoDB';
		    $table->increments('id');
		    $table->integer('lmcc_id')->unsigned();
		    $table->integer('tif_id')->unsigned();
		    $table->string('reserve_code', 64);	
		    $table->string('compartment_number');	    
		    $table->string('stock_number');
		    $table->string('tree_number');
		    $table->string('log_number');
		    $table->integer('species_id')->unsigned();
		    $table->float('db1')->nullable();
		    $table->float('db2')->nullable();
		    $table->float('db')->nullable();
		    $table->float('dt1')->nullable();
		    $table->float('dt2')->nullable();
		    $table->float('dt')->nullable();
		    $table->float('length')->nullable();
		    $table->float('volume')->nullable();
		    $table->string('defects')->nullable();
		    $table->string('grade')->nullable();
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
		Schema::drop('lmcc_details');
	}

}