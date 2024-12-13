<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Vendeur;
use Illuminate\Http\Request;
use App\Http\Requests\ClientRequest;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::orderBy('created_at', 'desc')->paginate(10); // Orders clients by 'created_at' in descending order and paginates the results
    return view('clients.index', compact('clients')); // Pass the clients to the 'clients.index' view
   }
   
    public function create()
    {
        $vendeurs = Vendeur::all();
        return view('clients.create', compact('vendeurs')); // Retourne la vue de création de client
    }
// Affiche les détails d'un client spécifique
public function show(Client $client)
{
    return view('clients.show', compact('client')); // Retourne la vue 'clients.show' en passant le client à afficher
}

public function store(ClientRequest $request)
{
    Client::create($request->validated());
    return redirect()->route('clients.index')->with('success', 'Client ajouté avec succès.');
}
public function edit(Client $client)
{
    // Fetch all vendeurs to display in the dropdown
    $vendeurs = Vendeur::all();
    
    return view('clients.edit', compact('client', 'vendeurs'));
}


public function update(ClientRequest $request, Client $client)
{
    $client->update($request->validated());
    return redirect()->route('clients.index')->with('success', 'Client mis à jour avec succès.');
}

public function destroy(Client $client)
{
    try {
        $client->delete(); // Supprime le client de la base de données
        return redirect()->route('clients.index')->with('success', 'Client supprimé avec succès.'); // Redirige vers l'index des clients avec un message de succès
    } catch (\Exception $e) {
        // Log the error for debugging purposes
        \Log::error('Erreur lors de la suppression du client: ' . $e->getMessage());
        return redirect()->route('clients.index')->with('error', 'Erreur lors de la suppression du client.'); // Message d'erreur en cas de problème
    }
}

}
