<?php

use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('clientes', function($table)
        {
            $table->increments('id');
            
            $table->string('nombre');
            $table->string('direccion');
            $table->string('telefono');
            $table->string('dui');
            $table->string('nit');
            $table->string('email');
            $table->string('categoria');
            $table->string('trabajo');
            $table->string('telTrabajo');

            
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
		Schema::drop("clientes");
	}

}