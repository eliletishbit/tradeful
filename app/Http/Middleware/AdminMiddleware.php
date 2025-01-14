<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
   
     public function handle($request, Closure $next)
    {
        // Vérifier si l'utilisateur est authentifié et s'il est un admin
        if (Auth::check() && Auth::user()->is_admin) {
            return $next($request); // Autoriser l'accès si c'est un admin
        }

        // Rediriger si l'utilisateur n'est pas un admin
        return redirect('/login')->with('error', "Accès refusé. Vous n'avez pas les autorisations nécessaires.");
    }
    
    
}
