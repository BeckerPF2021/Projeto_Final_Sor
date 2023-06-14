<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/sobre', function () {
    return view('base.sobre');
})->name('sobre');

Route::get('/noticias', function () {
    return view('base.noticias');
})->name('noticias');

Route::get('/clientes', function () {
    return view('base.cliente');
})->name('clientes');

Auth::routes();

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::get('/colaboradores',[App\Http\Controllers\colaboradoresController::class, 'index']);
Route::get('/cliente',[App\Http\Controllers\clienteController::class, 'index']);
Route::put('/cliente/{CodCliente}',[App\Http\Controllers\clienteController::class, 'atualizar_cliente'])->name('atualizar_cliente');;
Route::delete('/cliente/{CodCliente}',[App\Http\Controllers\clienteController::class, 'deletar_cliente'])->name('deletar_cliente');;










Route::get('/funcionarios',[App\Http\Controllers\funcionarioController::class, 'index']);
Route::get('/itens',[App\Http\Controllers\itensController::class, 'index']);
Route::get('/pedido',[App\Http\Controllers\pedidoController::class, 'index']);
Route::get('/produtos',[App\Http\Controllers\produtoController::class, 'index']);
Route::get('/tipoproduto',[App\Http\Controllers\tipoprodutoController::class, 'index']);

