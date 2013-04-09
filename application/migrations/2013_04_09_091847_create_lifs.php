<?php

class Create_Lifs {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		// create the lifs table
		Schema::create('lifs', function($table) {
			$table->engine = 'InnoDB';
		    $table->increments('id');
		    $table->string('reference_number', 128)->unique();
		    $table->integer('tuc_id')->unsigned();
		    $table->integer('tif_id')->unsigned();
		    $table->date('date');
		    $table->integer('total_number_of_logs');
		    $table->string('contractors_name')->nullable();
		    $table->integer('created_by')->unsigned();
		    $table->integer('updated_by')->unsigned();		    
		    $table->timestamps();		    
		});

		// insert a default lifs
		DB::table('lifs')->insert(array(
			array(
				'id' => 1,
				'reference_number' => 'BKTI0001',
				'tuc_id' => 1,
            	'tif_id'=> 1, 
            	'date' => date('Y-m-d H:i:s'),
				'total_number_of_logs' => 4,
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
		Schema::drop('lifs');
	}

}