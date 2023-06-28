<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class funcionario extends Model
{
    protected $table = 'funcionario';

    protected $fillable = ['id', 'Nome', 'Senha', 'Cargo'];

    public function updateFuncionario($id, $Nome, $Senha, $Cargo)
    {
        $cliente = funcionario::find($id);
        $cliente->Nome = $Nome;
        $cliente->Senha = $Senha;
        $cliente->Cargo = $Cargo;
        $cliente->save();
    }

    // public function inserirFuncionario($id, $Nome, $Senha, $Cargo)
    // {
    //     $cliente = funcionario::find($id);
    //     $cliente->Nome = $Nome;
    //     $cliente->Senha = $Senha;
    //     $cliente->Cargo = $Cargo;
    //     $cliente->save();
    // }
};