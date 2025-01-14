<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function showLoginForm(){
        return view('pages.back.loginadmin');
    }

     // Logique de connexion admin
     public function storeAdmin(Request $request)
     {
         // Valider les données du formulaire
         $request->validate([
             'email' => 'required|email',
             'password' => 'required',
         ]);
 
         $credentials = $request->only('email', 'password');
 
         // Tenter d'authentifier l'utilisateur avec les identifiants fournis
         if (Auth::attempt($credentials)) {
             // Récupérer l'utilisateur authentifié
             $user = Auth::user();
 
             // Vérifiez si l'utilisateur est un administrateur
             if ($user->is_admin) { 
                 return redirect()->route('admindashboard'); // Redirection vers le tableau de bord admin
             } else {
                 Auth::logout(); // Déconnecter l'utilisateur s'il n'est pas admin
                 return redirect()->route('admin.login')->withErrors(['email' => 'Vous n\'êtes pas autorisé à accéder à cette page.']);
             }
         }
 
         // Si l'authentification échoue, renvoyer une erreur
         return back()->withErrors(['email' => 'Identifiants invalides.']);
     }

     
    public function showDashboardAdmin(){
        return view('pages.back.admindashboard');
    }
}
