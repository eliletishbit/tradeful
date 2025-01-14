<?php

namespace App\Http\Controllers;

use App\Models\Signaux;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SignauxController extends Controller
{
    //logique signaux

    public function index()
    {
        $signaux = Signaux::orderBy('created_at', 'desc')->get();
        return view('pages.back.signaux.index', compact('signaux'));
    }

    public function create()
    {
        return view('pages.back.signaux.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'entry_price' => 'required',
            'stop_loss' => 'required',
            'sl' => 'nullable',
            'be' => 'nullable',
        ]);

        Signaux::create([
            'title' => $request->title,
            'entry_price' => $request->entry_price,
            'stop_loss' => $request->stop_loss,
            'sl' => $request->sl,
            'be' => $request->be,
            'user_id' => auth()->id(), // Associe le signal à l'utilisateur connecté
        ]);

        return redirect()->route('signaux.index')->with('success', 'Signal ajouté avec succès.');
    }

    public function show($id)
    {
        $signal = Signaux::where('id', $id)->first();
        
        return view('pages.back.signaux.show', compact('signal'));
    }

    public function edit($id)
    {
        $signal = Signaux::where('id', $id)->first();
        return view('pages.back.signaux.edit', compact('signal'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'entry_price' => 'required|numeric',
            'stop_loss' => 'required|numeric',
            'sl' => 'nullable|numeric',
            'be' => 'nullable|numeric',
        ]);

        $signal = Signaux::find($id);
        $signal->update($request->only(['title', 'entry_price', 'stop_loss', 'sl', 'be']));

        return redirect()->route('signaux.index')->with('success', 'Signal mis à jour avec succès.');
    }

    public function destroy($id)
    {
        $signal = Signaux::find($id);
        $signal->delete($id);
        return redirect()->route('signaux.index')->with('success', 'Signal supprimé avec succès.');
    }
}
