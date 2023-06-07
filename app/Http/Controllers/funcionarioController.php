<?php

namespace App\Http\Controllers;

use App\Models\funcionario;
use Illuminate\Http\Request;

class funcionarioController extends Controller
{
    public function index()
    {
        $funcionario = funcionario::all();
        return view('base.funcionario', ['funcionario' => $funcionario]);
    }
}
