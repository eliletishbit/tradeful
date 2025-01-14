<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    //
       
    public function index()
    {
        $subscriptions = Subscription::All();
        return view('pages.back.subscriptions.index', compact('subscriptions'));
    }

    public function create()
    {
        return view('pages.back.subscriptions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $path = $request->file('image')->store('images/analyses', 'public');

        Subscription::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $path,
            'user_id' => auth()->id(), // Associe l'analyse à l'utilisateur connecté
        ]);

        return redirect()->route('analyses.index')->with('success', 'Abonnement ajoutée avec succès.');
    }

    public function show($id)
    {
        $mysubscription = Subscription::where('id', $id)->first();
        return view('pages.back.subscriptions.show', compact('mysubscription'));
    }

    public function edit($id)
    {
        $mysubscription = Subscription::find($id);
        return view('pages.back.subscriptions.edit', compact('mysubscription'));
    }

    public function update(Request $request, $id)
    {
        // $analyse = Subscription::find($id);

        // $request->validate([
        //     'title' => 'required|string|max:255',
        //     'description' => 'required|string',
        //     // rendre l'image facultative si elle n'est pas mise à jour
        //     'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        // ]);

        // if ($request->hasFile('image')) {
        //     $path = $request->file('image')->store('images/analyses', 'public');
        //     $analyse->image = $path;
        // }

        // $analyse->title = $request->title;
        // $analyse->description = $request->description;
        // $analyse->save();

        // return redirect()->route('analyses.index')->with('success', 'Analyse mise à jour avec succès.');
    }

    public function destroy( $id)
    {
        $subscription = Subscription::find($id);
        $subscription->delete();
        return redirect()->route('subscriptions.index')->with('success', 'Abonnement supprimée avec succès.');
    }

    
}
