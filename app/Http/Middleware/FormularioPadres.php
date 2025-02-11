<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FormularioPadres
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Verificar si el registro ha sido completado correctamente
        if (!$request->session()->has('registro_completado')) {
            // Si no ha sido completado, redirigir al dashboard
            return redirect('Matricula')->with('error', 'Debes completar el registro primero.');
        }else{

             // Si el registro ha sido completado, permitir el acceso
        return $next($request);

        }

       
    }
}