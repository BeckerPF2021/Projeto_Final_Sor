<?php

namespace App\Http\Controllers;

use App\Models\tipoproduto;
use Illuminate\Http\Request;

class tipoprodutoController extends Controller
{
    public function index()
    {
        $tipoproduto = tipoproduto::all();
        return view('base.tipoproduto', ['tipoproduto' => $tipoproduto]);
    }
}
