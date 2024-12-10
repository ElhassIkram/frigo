<?php

namespace App\Http\Controllers;

use App\Models\Famille;
use Illuminate\Http\Request;

class FamilleController extends Controller
{
    public function index()
    {
        $familles = Famille::all();
        return view('familles.index', compact('familles'));
    }

    public function create()
    {
        return view('familles.create');
    }

    public function store(Request $request)
    {
        Famille::create($request->all());
        return redirect()->route('familles.index')->with('success', 'Famille ajoutée avec succès.');
    }

    
    public function show(Famille $famille)
    {
        return view('familles.show', compact('famille'));
    }
    public function edit(Famille $famille)
    {
        return view('familles.edit', compact('famille'));
    }
    public function update(Request $request, Famille $famille)
    {
        $request->validate([
            'famille' => 'required|string|max:255',
        ]);
    
        $famille->update($request->all());
    
        return redirect()->route('familles.index')->with('success', 'Famille mise à jour avec succès.');
    }

    public function destroy(Famille $famille)
    {
       try{ $famille->delete();
        return redirect()->route('familles.index')->with('success', 'Famille supprimée avec succès.');
    }
    catch (\Exception $e) {
        return redirect()->route('familles.index')->with('error', 'Erreur lors de la suppression.');
    }
}
}
