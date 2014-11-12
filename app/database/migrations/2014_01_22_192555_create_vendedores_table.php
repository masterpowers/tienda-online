<?php

use Illuminate\Database\Migrations\Migration;

class CreateVendedoresTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('vendedores', function($table){
			$table->increments('id');
            $table->string('nombre');
            $table->string('direccion');
            $table->string('telefono');
            $table->string('contacto');
            $table->string('nit');
            $table->string('email');
            $table->boolean('activo');

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
		Schema::drop('vendedores');
	}

}