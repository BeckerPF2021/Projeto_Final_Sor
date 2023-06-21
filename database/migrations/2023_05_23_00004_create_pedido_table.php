<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidoTable extends Migration
{

    public function up()
    {
        Schema::create('pedido', function (Blueprint $table) {
            $table->id();
            $table->date('DataPedido')->default(DB::raw('CURRENT_DATE'));
            $table->string('Descricao', 50)->nullable();
            $table->unsignedBigInteger('fk_Cliente_CodCliente')->nullable();
            $table->unsignedBigInteger('fk_Funcionario_CodFuncionario')->nullable();
            $table->float('PrecoPedido')->nullable();
            $table->timestamps();
            
            $table->foreign('fk_Cliente_CodCliente')->references('id')->on('cliente')->onDelete('cascade');
            $table->foreign('fk_Funcionario_CodFuncionario')->references('id')->on('funcionario')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('pedido');
    }
}
