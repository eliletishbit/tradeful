<?php

namespace App\Http\Controllers;

use App\Models\Analyse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AnalyseController extends Controller
{
    //logique des analyses

    public function index()
    {
        $analyses = Analyse::orderBy('created_at', 'desc')->get();
        return view('pages.back.analyses.index', compact('analyses'));
    }

    public function create()
    {
        return view('pages.back.analyses.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $path = $request->file('image')->store('images/analyses', 'public');

        Analyse::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $path,
            'user_id' => auth()->id(), // Associe l'analyse à l'utilisateur connecté
        ]);

        return redirect()->route('analyses.index')->with('success', 'Analyse ajoutée avec succès.');
    
    }

    public function show($id)
    {
        $analyse = Analyse::where('id', $id)->first();
        return view('pages.back.analyses.show', compact('analyse'));
    }

    public function edit($id)
    {
        $analyse = Analyse::find($id);
        return view('pages.back.analyses.edit', compact('analyse'));
    }

    public function update(Request $request, $id)
    {
        $analyse = Analyse::find($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            // rendre l'image facultative si elle n'est pas mise à jour
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images/analyses', 'public');
            $analyse->image = $path;
        }

        $analyse->title = $request->title;
        $analyse->description = $request->description;
        $analyse->save();

        return redirect()->route('analyses.index')->with('success', 'Analyse mise à jour avec succès.');
    }

    public function destroy( $id)
    {
        $analyse = Analyse::find($id);
        $analyse->delete();
        return redirect()->route('analyses.index')->with('success', 'Analyse supprimée avec succès.');
    }
   
}


/*

les ressources

.index: affiche la ressource
.edit: affiche le form de mise ajour
.update: met a jour
.create: affich form de creation
.store: creer une ressource
show : monttre un element specifique
delete: supprimer une ressource specifique

*/