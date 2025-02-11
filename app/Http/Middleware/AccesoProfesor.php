<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AccesoProfesor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Si el usuario no ha iniciado sesión
        if (!Auth::check()) {
            return redirect('/login');
        }

        // Validar si el usuario tiene el rol de profesor
        if (auth()->user()->is_admin == 2) {
            return $next($request); // Permitir acceso a la ruta protegida
        }

        // Si no tiene el rol adecuado, redirigir según corresponda
        if (auth()->user()->is_admin == 0) {
            return redirect('/usuario');
        }

        if (auth()->user()->is_admin == 1) {
            return redirect('/dashboard');
        }

        // En caso de que no cumpla ninguna condición, redirigir al login
        return redirect('/login');
    }
}
