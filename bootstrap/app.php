<?php

use App\Http\Middleware\AccesoAdmin;
use App\Http\Middleware\AccesoProfesor;
use App\Http\Middleware\AccesoRango;
use App\Http\Middleware\FormularioPadres;
use App\Http\Middleware\UsuarioAcceso;
use App\Models\Administrador;
use App\Models\DocumentosEstudiante;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->appendToGroup('AccesoAdmin', [
            AccesoAdmin::class
        ]);
        $middleware->appendToGroup('acceso-rango', [
            AccesoRango::class
        ]);
       $middleware->appendToGroup('AccesoUsuario', [
            UsuarioAcceso::class
        ]);
        $middleware->appendToGroup('ProtegerDatospadres', [
            FormularioPadres::class
        ]);
        $middleware->appendToGroup('ProtegerVistasubirdocumentos', [
            DocumentosEstudiante::class
        ]);
        //lo agg , borrar junto el middewware creado para volver a la normalidad 
        $middleware->appendToGroup('AccesoProfesor', [
            AccesoProfesor::class
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
