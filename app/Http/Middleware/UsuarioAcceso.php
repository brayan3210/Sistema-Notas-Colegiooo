<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
//descomentariar esto si quiero volver a la normalidad
// class UsuarioAcceso
// {
//     /**
//      * Handle an incoming request.
//      *
//      * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
//      */
//     public function handle(Request $request, Closure $next): Response
//     {
//         $blockAccess = true;
//         if (Auth::check() && auth()->user()->is_admin == 1) {
//             $blockAccess = false;
//             return redirect('/dashboard');
//         } 

//         if (Auth::check() && auth()->user()->is_admin == 0) {
//             $blockAccess = false;

//         }
//         if ($blockAccess) {
//             return redirect('/login');
//         }
//         return $next($request);
//     }
// }
class UsuarioAcceso
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

        // Verificar si el usuario es un usuario normal
        if (auth()->user()->is_admin == 0) {
            return $next($request); // Permitir acceso a las rutas del usuario normal
        }

        // Redirigir según el rol activo
        if (auth()->user()->is_admin == 1) {
            return redirect('/dashboard'); // Administrador
        }

        if (auth()->user()->is_admin == 2) {
            return redirect('/profesor'); // Profesor
        }

        // Redirección predeterminada al login en caso de error
        return redirect('/login');
    }
}