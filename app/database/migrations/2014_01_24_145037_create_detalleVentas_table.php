<?php

use Illuminate\Database\Migrations\Migration;

class CreateDetalleVentasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('detalleVentas', function($table)
		{
			$table->increments('id');
            $table->integer('idVenta');
            $table->integer('idProducto');
            $table->decimal('precio', 10, 2);
            $table->integer('cantidad');

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
		Schema::drop('detalleVentas');
	}

}