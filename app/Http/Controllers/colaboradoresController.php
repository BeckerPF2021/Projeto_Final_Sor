<?php

namespace App\Http\Controllers;

use App\Models\colaboradores;
use Illuminate\Http\Request;

class colaboradoresController extends Controller
{
    public function index()
    {
        $users = colaboradores::all();
        return view('base.colaboradores', ['users' => $users]);
    }
}
