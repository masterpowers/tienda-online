<?php

use Illuminate\Database\Migrations\Migration;

class CreateDetalleCompraTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//

		Schema::create('detalleCompras', function($table)
		{
			$table->increments('id');
            $table->integer('idCompra');
            $table->integer('idProducto');
            $table->decimal('precioSinIva', 10, 2);
            $table->decimal('precioConIva', 10, 2);
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
		Schema::drop('detalleCompras');
	}

}