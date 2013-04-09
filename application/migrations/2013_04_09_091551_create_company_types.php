<?php

class Create_Company_Types {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		// create the company_types table
		Schema::create('company_types', function($table) {
			$table->engine = 'InnoDB';
		    $table->increments('id');
		    $table->string('name', 128);
		    $table->string('description')->nullable();
		    $table->integer('created_by')->unsigned();
		    $table->integer('updated_by')->unsigned();		    
		    $table->timestamps();		    
		});

		// insert a default company_types
		DB::table('company_types')->insert(array(
			array(
				'id' => 1,
				'name' => 'CONTRACTOR',
				'description' => '',
            	'created_by' => 1,
				'updated_by' => 1,
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s')
			),
			array(
				'id' => 2,
				'name' => 'BUYER',
				'description' => '',
            	'created_by' => 1,
				'updated_by' => 1,
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s')
			),
			array(
				'id' => 3,
				'name' => 'EXPORTER',
				'description' => '',
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
		Schema::drop('company_types');
	}

}