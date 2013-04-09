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
		Schema::drop('forest_districts');
	}

}