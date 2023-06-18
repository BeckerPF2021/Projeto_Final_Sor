<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFuncionarioTable extends Migration {

	public function up()
	{
		Schema::create('funcionario', function (Blueprint $table) {
			$table->id();
			$table->string('Nome', 50);
			$table->string('Senha', 20)->nullable();
			$table->string('Cargo', 50)->nullable();
			$table->timestamps();
		});
	}
	

	public function down()
	{
		Schema::drop('funcionario');
	}

}
