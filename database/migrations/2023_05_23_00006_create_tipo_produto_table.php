<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipoProdutoTable  extends Migration
{

    public function up()
    {
        Schema::create('tipoproduto', function (Blueprint $table) {
            $table->id();
            $table->string('Descricao', 50)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tipoproduto');
    }
}
