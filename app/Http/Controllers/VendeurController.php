<?php

namespace App\Http\Controllers;

use App\Models\Vendeur;
use Illuminate\Http\Request;
use App\Http\Requests\StoreVendeurRequest;

class VendeurController extends Controller
{
    public function index()
    {
        $vendeurs = Vendeur::all();
        return view('vendeurs.index', compact('vendeurs'));
    }

    public function create()
    {
        return view('vendeurs.create');
    }

    public function store(StoreVendeurRequest $request)
    {
        // Utilisation des données validées
        $validatedData = $request->validated();
        $validatedData['password'] = bcrypt($validatedData['password']); // Hachage du mot de passe
        Vendeur::create($validatedData);

        return redirect()->route('vendeurs.index')->with('success', 'Vendeur ajouté avec succès.');
    }

    public function show(Vendeur $vendeur)
    {
        return view('vendeurs.show', compact('vendeur'));
    }

    public function edit(Vendeur $vendeur)
    {
        return view('vendeurs.edit', compact('vendeur'));
    }

    public function update(StoreVendeurRequest $request, Vendeur $vendeur)
    {
        $vendeur  ->update($request->validated());
 
        return redirect()->route('vendeurs.index')->with('success', 'Vendeur mis à jour avec succès.');
    }

    public function destroy(Vendeur $vendeur)
    {
        try {
            $vendeur->delete(); // Supprime le vendeur de la base de données
            return redirect()->route('vendeurs.index')->with('success', 'Vendeur supprimé avec succès.'); // Redirige vers l'index des vendeurs avec un message de succès
        } catch (\Exception $e) {
            // Log l'erreur pour le débogage
            \Log::error('Erreur lors de la suppression du vendeur: ' . $e->getMessage());
            return redirect()->route('vendeurs.index')->with('error', 'Erreur lors de la suppression du vendeur.'); // Message d'erreur en cas de problème
        }
    }
}    
