<?php

class Create_Species {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		// create the species table
		Schema::create('species', function($table) {
			$table->engine = 'InnoDB';
		    $table->increments('id');
		    $table->string('latin', 128);
		    $table->string('trade')->nullable();
		    $table->integer('felling_limit');
		    $table->string('species_code', 4)->nullable()->unique();
		    $table->float('mean_tree_volume');
		    $table->string('star_class', 128)->nullable();		    		    	    
		    $table->integer('created_by')->unsigned();
		    $table->integer('updated_by')->unsigned();		    
		    $table->timestamps();		    
		});

		// insert a default species
		DB::table('species')->insert(array(
			array(
				'id' => 1,
				'latin' => 'Afzelia africana',
				'trade' => 'PAPAO',
            	'felling_limit'	=> 90,  
            	'species_code' => 'AFZ',
				'mean_tree_volume' => 6.8,
            	'star_class'	=> 'RED',            
            	'created_by' => 1,
				'updated_by' => 1,
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s')
			),
			array(
				'id' => 2,
				'latin' => 'Albizia adianthifolia',
				'trade' => 'ALBIZIA',
            	'felling_limit'	=> 90,  
            	'species_code' => 'ALA',
				'mean_tree_volume' => 8.6,
            	'star_class'	=> 'PINK',            
            	'created_by' => 1,
				'updated_by' => 1,
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s')
			),
			array(
				'id' => 3,
				'latin' => 'Albizia ferruginea',
				'trade' => 'ALBIZIA',
            	'felling_limit'	=> 90,  
            	'species_code' => 'ALF',
				'mean_tree_volume' => 14.6,
            	'star_class'	=> 'SCARLET',            
            	'created_by' => 1,
				'updated_by' => 1,
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s')
			),
			array(
				'id' => 4,
				'latin' => 'Albizia zygia',
				'trade' => 'ALBIZIA',
            	'felling_limit'	=> 90,  
            	'species_code' => 'ALZ',
				'mean_tree_volume' => 10.8,
            	'star_class'	=> 'PINK',            
            	'created_by' => 1,
				'updated_by' => 1,
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s')
			),
			array(
				'id' => 5,
				'latin' => 'Alstonia boonei',
				'trade' => 'SINURO',
            	'felling_limit'	=> 110,  
            	'species_code' => 'ABO',
				'mean_tree_volume' => 20.1,
            	'star_class'	=> 'PINK',            
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
		Schema::drop('species');
	}

}