<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cliente extends Model
{
    protected $table = 'cliente';

    protected $fillable = ['id', 'endereco', 'Nome', 'CPF', 'Telefone'];

    public function updateCliente($CodCliente, $endereco, $Nome, $CPF, $Telefone)
    {
        $cliente = cliente::find($CodCliente);
        $cliente->endereco = $endereco;
        $cliente->Nome = $Nome;
        $cliente->CPF = $CPF;
        $cliente->Telefone = $Telefone;
        $cliente->save();
    }

    // public function inserirCliente($id, $endereco, $Nome, $CPF, $Telefone)
    // {
    //     $cliente = cliente::find($id);
    //     $cliente->endereco = $endereco;
    //     $cliente->Nome = $Nome;
    //     $cliente->CPF = $CPF;
    //     $cliente->Telefone = $Telefone;
    //     $cliente->save();
    // }

};