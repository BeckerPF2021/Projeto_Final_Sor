<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProdutoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('produto', function (Blueprint $table) {
            $table->id();
            $table->string('Nome', 50);
            $table->string('Descricao', 100);
            $table->double('Preco', 8, 2);
			$table->integer('idTipoProduto')->index('fk_tipo_produto_id');
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
		Schema::drop('produto');
	}

}
