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

		// insert a default lif_details
		DB::table('lif_details')->insert(array(
			array(
				'id' => 1,
				'lif_id' => 1,
				'tif_id' => 1,
				'reserve_code' => 'BKTI0001',				
            	'stock_survey_number'=> '1', 
            	'tree_number' => '0010',
				'species_id' => 1,
				'log_number'	=> 1,
            	'log_length'	=> 35,
            	'db1' => 20,
				'db2' => 18,
				'dt1' => 14,
				'dt2' => 17,
            	'volume'	=> 145,
            	'created_by' => 1,
				'updated_by' => 1,
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s')
			),
			array(
				'id' => 2,
				'lif_id' => 1,
				'tif_id' => 1,
				'reserve_code' => 'BKTI0001',				
            	'stock_survey_number'=> '1', 
            	'tree_number' => '0010',
				'species_id' => 1,
				'log_number'	=> 2,
            	'log_length'	=> 45,
            	'db1' => 21,
				'db2' => 19,
				'dt1' => 15,
				'dt2' => 14,
            	'volume'	=> 135,
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
		Schema::drop('lif_details');
	}

}