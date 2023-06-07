<?php

namespace App\Http\Controllers;

use App\Models\produto;
use Illuminate\Http\Request;

class produtoController extends Controller
{
    public function index()
    {
        $produto = produto::all();
        return view('base.produto', ['produto' => $produto]);
    }
}
