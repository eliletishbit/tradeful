<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckUserSubscription
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect()->route('login'); // Rediriger vers la page de connexion si non connecté
        }

        $user = Auth::user();

        // Vérifie si l'utilisateur a un abonnement valide
        if (in_array($user->subscription_id, [1, 2, 3,4])) { // Autoriser les IDs 1, 2, 3 et 4
            return $next($request);
        }

        abort(403, 'Accès interdit'); // Interdire l'accès si l'utilisateur n'a pas les droits requis
        

        
    }
}
