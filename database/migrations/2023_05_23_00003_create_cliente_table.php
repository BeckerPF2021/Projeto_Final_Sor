<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClienteTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('cliente', function (Blueprint $table) {
            $table->id();
            $table->string('endereco', 200)->nullable();
            $table->string('Nome', 50);
            $table->string('CPF', 15);
            $table->string('Telefone', 20)->nullable();
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
		Schema::drop('cliente');
	}

}
