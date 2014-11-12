<?php

use Illuminate\Database\Migrations\Migration;

class CreateVentasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
	
		Schema::create('ventas', function($table)
		{
			$table->increments('id');
            $table->integer('idCliente');
            $table->integer('idVendedor');
            $table->string('Pago');
            $table->string('Detalles');
            $table->dateTime('fecha');

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
		Schema::drop('ventas');
	}
}