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