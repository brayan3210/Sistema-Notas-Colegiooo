<?php

namespace App\Http\Controllers;

use App\Models\Administrador;
use Illuminate\Http\Request;

class ListarAdminController extends Controller
{
    public function index()
    {
        $datos = Administrador::all();

        return view('dashboard.index', compact('datos'));
    }
}
