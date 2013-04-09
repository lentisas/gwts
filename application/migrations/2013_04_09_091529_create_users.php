<?php

class Create_Users {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		// create the users table
		Schema::create('users', function($table) {
			$table->engine = 'InnoDB';
		    $table->increments('id');
		    $table->string('name', 256);
		    $table->string('user_name', 128);
		    $table->string('email', 128)->nullable();
		    $table->string('phone', 45)->nullable();
		    $table->string('password', 128);	    
		    $table->integer('created_by')->unsigned();
		    $table->integer('updated_by')->unsigned();
		    $table->timestamps();		    
		});	

		// insert default users
		DB::table('users')->insert(array(
			'id' => 1,
			'name' => 'Sylva Vortia',
			'user_name' => 'admin',
			'email'	=> 'svort@gwts.com',
            'phone' => '0244556699',
            'password'	=> Hash::make('admin'),
            'created_by' => 1,
			'updated_by' => 1,
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}