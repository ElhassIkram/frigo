<?php

namespace App\Http\Controllers;

use App\Models\ReglementClient;
use App\Models\Mode;
use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Requests\ReglementRequest;

class ReglementClientController extends Controller
{
    public function index()
    {
        $reglements = ReglementClient::all();
        return view('reglements.index', compact('reglements'));
    }

    // public function create()
    // {
    //     return view('reglements.create');
    // }


    public function showByClient($clientId)
    {
        $client = Client::findOrFail($clientId);
        $mode = Mode::all(); 

        $reglements = ReglementClient::where('client_id', $clientId)->paginate(10); // Utilisez la pagination

        return view('reglements.show_by_client', compact('client', 'reglements', 'mode'));
    }

    public function createReglement($clientId)
{
    $client = Client::findOrFail($clientId); // Récupère le client par son ID
    $modes = Mode::all(); // Récupère tous les modes de paiement disponibles
    return view('reglements.create', compact('client', 'modes'));
}


public function storeReglement(ReglementRequest $request, $clientId)
{
    ReglementClient::create([
        'client_id' => $clientId,
        'mode_id' => $request->mode_id,
        'montant' => $request->montant,
        'date' => $request->date,
        'observation' => $request->observation, // Valeur fournie ou NULL si vide
    ]);

    return redirect()->route('clients.index')->with('success', 'Règlement ajouté avec succès.');
}




    public function edit(ReglementClient $reglement)
    {
        return view('reglements.edit', compact('reglement'));
    }

    // public function update(ReglementRequest $request, ReglementClient $reglement)
    // {
    //     $reglement->update($request->validated());
    
    //     return redirect()->route('reglements.index')->with('success', 'Règlement client mis à jour avec succès.');
    // }
    

    public function destroy(ReglementClient $reglement)
    {
        $reglement->delete();
        return redirect()->route('reglements.index')->with('success', 'Règlement client supprimé avec succès.');
    }
}
