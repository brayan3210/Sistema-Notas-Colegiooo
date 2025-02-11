<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
//descomentariar esto si quiero volver a lo normal sin lo del profesor
// class AccesoAdmin
// {
//     /**
//      * Handle an incoming request.
//      *
//      * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
//      */
//     public function handle(Request $request, Closure $next): Response
//     {
//         $blockAccess = true;
//         if (Auth::check() && auth()->user()->is_admin == 0) {
//             $blockAccess = false;
//             return redirect('/usuario');

//         } 

//         if (Auth::check() && auth()->user()->is_admin == 1) {
//             // dd(auth()->user()->is_admin);    
//             $blockAccess = false;

//         }

//         if ($blockAccess) {
//             return redirect('/login');
//         }

//         return $next($request);
//     }
// }
class AccesoAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Verificar si el usuario está autenticado
        if (!Auth::check()) {
            return redirect('/login');
        }

        // Verificar si el usuario es administrador
        if (auth()->user()->is_admin == 1) {
            return $next($request); // Permitir acceso a las rutas del administrador
        }

        // Redirigir según el rol activo
        if (auth()->user()->is_admin == 0) {
            return redirect('/usuario'); // Usuario normal
        }

        if (auth()->user()->is_admin == 2) {
            return redirect('/profesor'); // Profesor
        }

        // Redirección predeterminada al login en caso de error
        return redirect('/login');
    }
}