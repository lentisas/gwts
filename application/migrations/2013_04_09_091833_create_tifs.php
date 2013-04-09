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

		// insert a default tifs
		DB::table('tifs')->insert(array(
			array(
				'id' => 1,
				'reference_number' => 'BKTI0001',
				'tuc_id' => 1,
            	'forest_district_id'=> 1, 
            	'date' => date('Y-m-d H:i:s'),
				'range_supervisors_name' => 'John Appiah',
            	'contractors_name'	=> "Kojo Manu",
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
		Schema::drop('tifs');
	}

}