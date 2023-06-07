<?php

namespace App\Http\Controllers;

use App\Models\itens;
use Illuminate\Http\Request;

class itensController extends Controller
{
    public function index()
    {
        $itens = itens::all();
        return view('base.itens', ['itens' => $itens]);
    }
}
