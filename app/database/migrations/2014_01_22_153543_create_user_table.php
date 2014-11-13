<?php

use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('users', function($table)
        {
            $table->increments('id');
            
            $table->string('email');
            $table->string('password');
            $table->string('tipo');
            $table->string('full_name');
            $table->string('remember_token');
            
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
		Schema::drop('users');
	}

}