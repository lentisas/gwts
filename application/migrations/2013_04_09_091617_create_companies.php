<?php

class Create_Companies {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		// create the companies table
		Schema::create('companies', function($table) {
			$table->engine = 'InnoDB';
		    $table->increments('id');
		    $table->string('name', 128)->unique();
		    $table->string('code', 10)->unique();
		    $table->date('date_registered');
		    $table->date('expires');
		    $table->text('postal_address')->nullable();
		    $table->text('physical_location')->nullable();
		    $table->string('telephone')->nullable();
		    $table->string('fax')->nullable();
		    $table->string('email')->nullable();
		    $table->string('contact_name');
		    $table->string('role');
		    $table->text('property_mark');
		    $table->date('mark_registered');
		    $table->date('mark_expired');
		    $table->text('company_type_id')->nullable();		    		    	    
		    $table->integer('created_by')->unsigned();
		    $table->integer('updated_by')->unsigned();		    
		    $table->timestamps();		    
		});


		// insert a default companies
		DB::table('companies')->insert(array(
			array(
				'id' => 1,
				'name' => 'John Bitar & Co',
				'code' => 'GHJBC',
            	'date_registered'	=> date('2011-05-01 00:00:00'), 
            	'expires'	=> date('2050-05-01 00:00:00'), 
            	'postal_address' => '',
				'physical_location' => 'Awaso',
            	'telephone'	=> '', 
            	'fax' => '',
				'email' => '',
            	'contact_name'	=> "Justice Nhyira",  
            	'role' => '',
				'property_mark' => "JCM",
            	'mark_registered'	=> date('2013-05-01 00:00:00'),
            	'mark_expired' => date('2015-05-01 00:00:00'),
            	'company_type_id'	=> 1,         
            	'created_by' => 1,
				'updated_by' => 1,
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s')
			),
			array(
				'id' => 2,
				'name' => 'Manu and Sons',
				'code' => 'GHMNS',
            	'date_registered'	=> date('2010-01-01 00:00:00'), 
            	'expires'	=> date('2050-01-01 00:00:00'), 
            	'postal_address' => '',
				'physical_location' => 'Assin Manso',
            	'telephone'	=> '', 
            	'fax' => '',
				'email' => '',
            	'contact_name'	=> "Peter Manu",  
            	'role' => '',
				'property_mark' => "JCM",
            	'mark_registered'	=> date('2013-04-01 00:00:00'),
            	'mark_expired' => date('2015-04-01 00:00:00'),
            	'company_type_id'	=> 1,         
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
		Schema::drop('companies');
	}

}