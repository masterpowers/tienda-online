<?php

use Illuminate\Database\Migrations\Migration;

class CreateCategorias extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		////
		Schema::create('categorias', function($table)
        {
            $table->increments('id');
            
            $table->string('categoria');
            $table->string('descripcion');
            $table->timestamps();
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
	 	//
		Schema::drop('categorias');
	}

}