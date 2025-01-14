<?php

namespace App\Http\Controllers;

use App\Models\Live;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LiveController extends Controller
{
    //logique des lives

    public function index()
    {
        $lives = Live::orderBy('scheduled_at', 'desc')->get();
        return view('pages.back.live', compact('lives'));
    }

    public function create()
    {
        return view('live.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'scheduled_at' => 'required|date',
        ]);

        Live::create([
            'title' => $request->title,
            'description' => $request->description,
            'scheduled_at' => $request->scheduled_at,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('live.index')->with('success', 'Live ajouté avec succès.');
    }

    public function show(Live $live)
    {
        return view('live.show', compact('live'));
    }

    public function edit(Live $live)
    {
        return view('live.edit', compact('live'));
    }

    public function update(Request $request, Live $live)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'scheduled_at' => 'required|date',
        ]);

        $live->update($request->only(['title', 'description', 'scheduled_at']));

        return redirect()->route('live.index')->with('success', 'Live mis à jour avec succès.');
    }

    public function destroy(Live $live)
    {
        $live->delete();
        return redirect()->route('live.index')->with('success', 'Live supprimé avec succès.');
    }
}
