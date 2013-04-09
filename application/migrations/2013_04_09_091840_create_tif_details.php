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

		// insert a default tif_details
		DB::table('tif_details')->insert(array(
			array(
				'id' => 1,
				'tif_id' => 1,
				'reserve_code' => 'BKTI0001',				
            	'stock_survey_number'=> '1', 
            	'tree_number' => '0010',
				'species_id' => 1,
            	'tree_length'	=> 45,
            	'diameter1' => 20,
				'diameter2' => 18,
            	'volume'	=> 112,
            	'created_by' => 1,
				'updated_by' => 1,
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s')
			),
			array(
				'id' => 2,
				'tif_id' => 1,
				'reserve_code' => 'BKTI0001',				
            	'stock_survey_number'=> '1', 
            	'tree_number' => '0011',
				'species_id' => 2,
            	'tree_length'	=> 40,
            	'diameter1' => 18,
				'diameter2' => 15,
            	'volume'	=> 110,
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
		Schema::drop('tif_details');
	}

}