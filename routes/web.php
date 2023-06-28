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

Auth::routes();

Route::get('/cliente', function () {
    return view('base.cliente');
})->name('cliente');

Route::get('/funcionario', function () {
    return view('base.funcionario');
})->name('funcionario');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/cliente', [App\Http\Controllers\clienteController::class, 'index']);

// Rota para cliente
Route::get('/cliente',[App\Http\Controllers\clienteController::class, 'index']);
Route::put('/cliente/{CodCliente}',[App\Http\Controllers\clienteController::class, 'atualizar_cliente'])->name('atualizar_cliente');;
Route::post('/cliente',[App\Http\Controllers\clienteController::class, 'inserir_Cliente'])->name('inserir_Cliente');;
Route::delete('/cliente/{CodCliente}',[App\Http\Controllers\clienteController::class, 'deletar_cliente'])->name('deletar_cliente');;

// Rota para funcionario
Route::get('/funcionario',[App\Http\Controllers\funcionarioController::class, 'index']);
Route::put('/funcionario/{id}',[App\Http\Controllers\funcionarioController::class, 'atualizar_funcionario'])->name('atualizar_funcionario');;
Route::post('/funcionario',[App\Http\Controllers\funcionarioController::class, 'inserir_funcionario'])->name('inserir_funcionario');;
Route::delete('/funcionario/{id}',[App\Http\Controllers\funcionarioController::class, 'deletar_funcionario'])->name('deletar_funcionario');;

