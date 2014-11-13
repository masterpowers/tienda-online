<?php

use Illuminate\Database\Migrations\Migration;

class CreateProductosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('productos', function($table){
			$table->increments('id');
            $table->string('nombre');
            $table->string('descripcion');
            $table->string('idCategoria');
            $table->integer('minimo');
            $table->string('modelo');
            $table->string('imagen');
            $table->string('precio');
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
		Schema::drop('productos');
	}

}