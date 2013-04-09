<?php

class Create_Forest_Districts {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		// create the forest_districts table
		Schema::create('forest_districts', function($table) {
			$table->engine = 'InnoDB';
		    $table->increments('id');
		    $table->string('name', 128);
		    $table->string('address')->nullable();
		    $table->string('telephone')->nullable();
		    $table->string('locality_mark');
		    $table->string('stool_land_owner');	
		    $table->string('district_assembly');
		    $table->integer('region_id')->unsigned()->default(1);	    		    	    
		    $table->integer('created_by')->unsigned();
		    $table->integer('updated_by')->unsigned();		    
		    $table->timestamps();		    
		});

		// insert a default forest_districts
		DB::table('forest_districts')->insert(array(
			array(
				'id' => 1,
				'name' => 'Bekwai',
				'address' => 'P.O. Box 11, Bekwai',
            	'telephone'	=> '0322 390793', 
            	'locality_mark' => 'W/1',
				'stool_land_owner' => 'Bekwai',
            	'district_assembly'	=> "Bekwai",
            	'region_id' => 3,  
            	'created_by' => 1,
				'updated_by' => 1,
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s')
			),
			array(
				'id' => 2,
				'name' => 'Sehwi Wiaso',
				'address' => '',
            	'telephone'	=> '', 
            	'locality_mark' => 'W/2',
				'stool_land_owner' => 'S/Winso',
            	'district_assembly'	=> "Sehwi Wiaso",
            	'region_id' => 3,  
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
		Schema::drop('forest_districts');
	}

}