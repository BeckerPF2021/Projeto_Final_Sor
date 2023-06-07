<?php

namespace App\Http\Controllers;

use App\Models\pedido;
use Illuminate\Http\Request;

class pedidoController extends Controller
{
    public function index()
    {
        $pedido = pedido::all();
        return view('base.pedido', ['pedido' => $pedido]);
    }
}
