<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Verificar si el usuario está autenticado
        if (auth()->check()) {
            // Verificar si el rol del usuario es 'admin' o 'auth' (vendedor)
            if (auth()->user()->rol === 'admin' || auth()->user()->rol === 'auth') {
            return $next($request);
            }
        }          
        
        // Abortar con un estado HTTP 403 si el usuario no tiene permisos
        abort(403, 'Acceso no autorizado');
    }

}
