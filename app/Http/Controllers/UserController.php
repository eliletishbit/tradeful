<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    //renvoyer tous lsutilisateurs(reserver a l'admin)
    public function index(){
        $users = User::all();
        return view('pages.back.utilisateurs.index', compact('users') );
    }

    public function create()
    {

        return view('pages.back.utilisateurs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string',
            'phone'=>'required|string',
            'subscription_id'=>'required|integer',
            'password'=>'string|required|string', 
            'photo'=>'required|',
            // Ajoutez d'autres validations selon vos besoins
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone'=>$request->phone,
            'subscription_id'=>$request->subscription_id,
            'password'=>$request->password, 
            'photo'=>$request->photo,
        ]);

        return redirect()->route('users.index')->with('success', 'Ressource ajoutée avec succès.');
    }

    public function show(User $user)
    {
        return view('pages.back.utilisateurs.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('pages.back.utilisateurs.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'phone' => 'required|string',
            'subscription_id' => 'required|integer',
            'password' => 'nullable|string|min:8', // Rendre le mot de passe facultatif
            'photo' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif|max:2048'],
        ]);

        // Mettre à jour les champs non sensibles
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->subscription_id = $request->subscription_id;

        // Mettre à jour le mot de passe si fourni
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password); // Hachage du mot de passe
        }

        // Gestion de la photo
        if ($request->hasFile('photo')) {
            // Stocker la nouvelle photo
            $path = $request->file('photo')->store('photos', 'public');
            $user->photo = $path;
        }

        // Enregistrer les modifications
        $user->save();

        return redirect()->route('users.index')->with('success', 'Ressource mise à jour avec succès.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Ressource supprimée avec succès.');
    }




}
