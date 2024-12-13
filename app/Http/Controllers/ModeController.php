<?php

namespace App\Http\Controllers;

use App\Models\Mode;
use Illuminate\Http\Request;
use App\Http\Requests\ModeRequest;

class ModeController extends Controller
{
    public function index()
    {
        $modes = Mode::all();
        return view('modes.index', compact('modes'));
    }

    public function create()
    {
        return view('modes.create');
    }

    public function store(ModeRequest $request) // Use ModeRequest for validation
    {
        Mode::create($request->validated()); // Only use validated data
        return redirect()->route('modes.index')->with('success', 'Mode ajouté avec succès.');
    }
    public function show(Mode $mode)
{
    return view('modes.show', compact('mode'));
}


    public function edit(Mode $mode)
    {
        return view('modes.edit', compact('mode'));
    }

    public function update(ModeRequest $request, Mode $mode) // Use ModeRequest for validation
    {
        $mode->update($request->validated()); // Only use validated data
        return redirect()->route('modes.index')->with('success', 'Mode mis à jour avec succès.');
    }

    public function destroy(Mode $mode)
    {
        $mode->delete();
        return redirect()->route('modes.index')->with('success', 'Mode supprimé avec succès.');
    }
}
