<?php

use Illuminate\Database\Migrations\Migration;

class CreateVentaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//

		Schema::create('compras', function($table)
		{
			$table->increments('id');
            $table->string('comprobante');
            $table->string('idProveedor');
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
		Schema::drop('compras');
	}

}