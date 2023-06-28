<?php

namespace App\Http\Controllers;

use App\Models\cliente;
use Illuminate\Http\Request;

class clienteController extends Controller
{
    public function index()
    {
        $itenspagina = 8;
        $cliente = cliente::paginate($itenspagina);

        $cliente = cliente::all();
        return view('base.cliente', ['cliente' => $cliente]);
    }

    public function deletar_cliente($CodCliente)
    {
        $cliente = cliente::find($CodCliente);

        if ($cliente) {
            $cliente->delete();
            return view('base.cliente')->with('success', 'Usuário excluído com sucesso!');
        } else {
            return view('base.cliente')->with('error', 'Usuário não encontrado.');
        }
    }

    public function atualizar_cliente($CodCliente, Request $request)
    {

        $cliente = new cliente;
        $cliente->updateCliente($CodCliente, $request->endereco, $request->Nome, $request-> CPF, $request ->Telefone);
        return redirect('/cliente');
        
    }

    public function inserir_Cliente(Request $request)
    {
        $validar = $request->validate([
            'id' => 'required',
            'endereco' => 'required',
            'Nome' => 'required',
            'CPF' => 'required',
            'Telefone' => 'required',
        ]);
        cliente::create($validar);

        return redirect('/cliente');
    }
    
}