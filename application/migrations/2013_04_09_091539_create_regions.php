<?php

class Create_Regions {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		// create the regions table
		Schema::create('regions', function($table) {
			$table->engine = 'InnoDB';
		    $table->increments('id');
		    $table->string('name', 128)->unique();
		    $table->string('code', 4)->unique();
		    $table->text('description')->nullable();		    		    	    
		    $table->integer('created_by')->unsigned();
		    $table->integer('updated_by')->unsigned();		    
		    $table->timestamps();		    
		});


		// insert a default regions
		DB::table('regions')->insert(array(
			array(
				'id' => 1,
				'name' => 'Western Region',
				'code' => 'WNR',
            	'description'	=> '',            
            	'created_by' => 1,
				'updated_by' => 1,
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s')
			),
			array(
				'id' => 2,
				'name' => 'Central Region',
				'code' => 'CLR',
            	'description'	=> '',            
            	'created_by' => 1,
				'updated_by' => 1,
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s')
			),
			array(
				'id' => 3,
				'name' => 'Ashanti Region',
				'code' => 'AIR',
            	'description'	=> '',            
            	'created_by' => 1,
				'updated_by' => 1,
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s')
			),
			array(
				'id' => 4,
				'name' => 'Northern Region',
				'code' => 'NNR',
            	'description'	=> '',            
            	'created_by' => 1,
				'updated_by' => 1,
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s')
			),
			array(
				'id' => 5,
				'name' => 'Greater Accra Region',
				'code' => 'GAR',
            	'description'	=> '',            
            	'created_by' => 1,
				'updated_by' => 1,
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s')
			),
			array(
				'id' => 6,
				'name' => 'Volta Region',
				'code' => 'VAR',
            	'description'	=> '',            
            	'created_by' => 1,
				'updated_by' => 1,
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s')
			),
			array(
				'id' => 7,
				'name' => 'Brong Ahafo Region',
				'code' => 'BAR',
            	'description'	=> '',            
            	'created_by' => 1,
				'updated_by' => 1,
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s')
			),
			array(
				'id' => 8,
				'name' => 'Eastern Region',
				'code' => 'ENR',
            	'description'	=> '',            
            	'created_by' => 1,
				'updated_by' => 1,
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s')
			),
			array(
				'id' => 9,
				'name' => 'Upper East Region',
				'code' => 'UER',
            	'description'	=> '',            
            	'created_by' => 1,
				'updated_by' => 1,
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s')
			),
			array(
				'id' => 10,
				'name' => 'Upper West Region',
				'code' => 'UWR',
            	'description'	=> '',            
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
		Schema::drop('regions');
	}

}