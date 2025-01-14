<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Resource;
use App\Models\User;

class RessourceController extends Controller
{
    //
    public function index()
    {
    // Récupérer l'utilisateur connecté
    $user = auth()->user();
    
    // Vérifier si l'utilisateur est un administrateur
    $isAdmin =  $user->is_admin;
    $userSubscriptionId = $user->subscription_id;

    // Récupérer les 5 dernières ressources PDF et vidéos
    $pdfResources = Resource::where('type', 'pdf')->orderBy('created_at', 'desc')->take(5)->get();
    $videoResources = Resource::where('type', 'video')->orderBy('created_at', 'desc')->take(5)->get();

    return view('pages.back.ressources.index', compact('pdfResources', 'videoResources', 'isAdmin', 'userSubscriptionId'));
    }


    public function create()
    {
        return view('pages.back.ressources.create');
    }

    public function store(Request $request)
{
    
    // Validation des données entrantes
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'link' => 'required|url', // Validation pour s'assurer que le lien est une URL valide
        'type' => 'required|string|in:pdf,video', // Type de ressource peut être PDF ou vidéo
        'is_paid' => 'required|boolean', // Indique si la ressource est payante (0 ou 1)
        
    ]);

    

    // Création de la ressource dans la base de données
    Resource::create([
        'title' => $request->title,
        'description' => $request->description,
        'link' => $request->link, // Ajout du lien vers la ressource
        'type' => $request->type, // Type de ressource (PDF ou vidéo)
        'is_paid' => $request->is_paid, // Indiquer si la ressource est payante
        
    ]);

    return redirect()->route('ressources.index')->with('success', 'Ressource ajoutée avec succès.');
}


    public function show(Resource $ressource)
    {
        return view('pages.back.ressources.show', compact('ressource'));
    }

    public function edit(Resource $ressource)
    {
        return view('pages.back.ressources.edit', compact('ressource'));
    }

    public function update(Request $request, Resource $ressource)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'link' => 'required|url', // Validation pour s'assurer que le lien est une URL valide
             // Type de ressource peut être PDF ou vidéo
            
        ]);

        $ressource->update($request->only(['title', 'description', 'link']));

        return redirect()->route('ressources.index')->with('success', 'Ressource mise à jour avec succès.');
    }

    public function destroy(Resource $ressource)
    {
        $ressource->delete();
        return redirect()->route('ressources.index')->with('success', 'Ressource supprimée avec succès.');
    }
}
