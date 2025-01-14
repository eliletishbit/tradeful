<?php

namespace App\Http\Controllers;

use App\Models\Discussion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DiscussionController extends Controller
{
    //logique des discussions

    public function index()
    {
        $discussions = Discussion::orderBy('created_at', 'desc')->get();
        return view('discussions.index', compact('discussions'));
    }

    public function create()
    {
        return view('discussions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'topic' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        Discussion::create([
            'topic' => $request->topic,
            'content' => $request->content,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('discussions.index')->with('success', 'Discussion ajoutée avec succès.');
    }

    public function show(Discussion $discussion)
    {
        return view('discussions.show', compact('discussion'));
    }

    public function edit(Discussion $discussion)
    {
        return view('discussions.edit', compact('discussion'));
    }

    public function update(Request $request, Discussion $discussion)
    {
        $request->validate([
            'topic' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $discussion->update($request->only(['topic', 'content']));

        return redirect()->route('discussions.index')->with('success', 'Discussion mise à jour avec succès.');
    }

    public function destroy(Discussion $discussion)
    {
        $discussion->delete();
        return redirect()->route('discussions.index')->with('success', 'Discussion supprimée avec succès.');
    }
}
