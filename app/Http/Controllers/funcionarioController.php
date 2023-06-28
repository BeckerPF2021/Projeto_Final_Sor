<?php

namespace App\Http\Controllers;

use App\Models\funcionario;
use Illuminate\Http\Request;

class funcionarioController extends Controller
{
    public function index()
    {
        $itenspagina = 8;
        $funcionario = funcionario::paginate($itenspagina);

        $funcionario = funcionario::all();
        return view('base.funcionario', ['funcionario' => $funcionario]);
    }

    public function deletar_funcionario($id)
    {
        $funcionario = funcionario::find($id);

        if ($funcionario) {
            $funcionario->delete();
            return view('base.funcionario')->with('success', 'Usuário excluído com sucesso!');
        } else {
            return view('base.funcionario')->with('error', 'Usuário não encontrado.');
        }
    }

    public function atualizar_funcionario($id, Request $request)
    {

        $funcionario = new funcionario;
        $funcionario->updateFuncionario($id, $request->Nome, $request->Senha, $request-> Cargo);
        return redirect('/funcionario');
        
    }

    public function inserir_funcionario(Request $request)
    {
        $validar = $request->validate([
            'id' => 'required',
            'Nome' => 'required',
            'Senha' => 'required',
            'Cargo' => 'required',
        ]);
        funcionario::create($validar);

        return redirect('/funcionario');
    }
}
