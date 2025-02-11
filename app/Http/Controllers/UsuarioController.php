<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UsuarioController extends Controller
{
    public function index()
    {
        $data = DB::table('administradores')->where('email', auth()->user()->email)->first();
        return view('app.usuario');
    }
}
