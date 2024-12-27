<?php

namespace App\Http\Controllers;

use App\Models\ReglementClient;
use App\Models\Mode;
use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Requests\ReglementClientRequest;

class ReglementClientController extends Controller
{
    public function showByClient($clientId)
    {
        $client = Client::findOrFail($clientId);
        $mode = Mode::all(); 

        $reglements = ReglementClient::where('client_id', $clientId)
        ->orderBy('created_at', 'desc')->paginate(10); // Utilisez la pagination

        return view('reglements.show_by_client', compact('client', 'reglements', 'mode'));
    }

    public function createReglement($clientId)
{
    $client = Client::findOrFail($clientId); // Récupère le client par son ID
    $modes = Mode::all(); // Récupère tous les modes de paiement disponibles
    return view('reglements.create', compact('client', 'modes'));
}


public function storeReglement(ReglementClientRequest $request, $clientId)
{
    try {
        // Vérifier l'existence du client
        $client = Client::findOrFail($clientId);

        // Créer un nouveau règlement
        ReglementClient::create([
            'client_id' => $client->id, // ID du client
            'date' => $request->input('date'), // Récupère la date validée
            'montant' => $request->input('montant'), // Récupère le montant validé
            'mode_id' => $request->input('mode_id'), // Récupère le mode de paiement validé
            'observation' => $request->input('observation'), // Observation facultative
        ]);

        // Rediriger avec un message de succès
        return redirect()
            ->route('clients.reglements', $client->id)
            ->with('success', 'Règlement ajouté avec succès.');

    } catch (\Exception $e) {
        // Gérer les erreurs inattendues
        return redirect()
            ->back()
            ->withInput($request->all()) // Garder les données saisies
            ->withErrors(['error' => 'Erreur lors de l\'ajout du règlement : ' . $e->getMessage()]);
    }
}




public function edit($clientId, $reglementId)
{
    $client = Client::findOrFail($clientId); // Récupère le client par ID
    $reglement = ReglementClient::where('client_id', $clientId)
                                ->where('id', $reglementId)
                                ->firstOrFail(); // Récupère le règlement par son ID
    $modes = Mode::all(); // Récupère tous les modes de paiement

    return view('reglements.edit', compact('client', 'reglement', 'modes'));
}

public function update(ReglementClientRequest $request, $clientId, $reglementId)
{
    try {
        // Vérifier l'existence du client et du règlement
        $client = Client::findOrFail($clientId);
        $reglement = ReglementClient::where('client_id', $clientId)
                                    ->where('id', $reglementId)
                                    ->firstOrFail();

        // Mettre à jour les données du règlement
        $reglement->update([
            'date' => $request->input('date'), // Mettre à jour la date
            'montant' => $request->input('montant'), // Mettre à jour le montant
            'mode_id' => $request->input('mode_id'), // Mettre à jour le mode de paiement
            'observation' => $request->input('observation'), // Mettre à jour l'observation
        ]);

        // Rediriger avec un message de succès
        return redirect()
            ->route('clients.reglements', $client->id)
            ->with('success', 'Règlement mis à jour avec succès.');
    } catch (\Exception $e) {
        // Gérer les erreurs inattendues
        return redirect()
            ->back()
            ->withInput($request->all()) // Garder les données saisies
            ->withErrors(['error' => 'Erreur lors de la mise à jour du règlement : ' . $e->getMessage()]);
    }
}



// Supprime un règlement spécifique pour un client donné
public function destroy($reglementId)
{
    try {
        // Récupérer le règlement avec l'ID fourni
        $reglement = ReglementClient::findOrFail($reglementId);

        // Supprimer le règlement
        $reglement->delete();

        // Rediriger avec un message de succès vers la page des règlements du client
        return redirect()->route('clients.reglements', ['client' => $reglement->client_id])
                         ->with('success', 'Règlement supprimé avec succès.');
    } catch (\Exception $e) {
        // Gérer les erreurs et rediriger avec un message d'erreur
        return redirect()->route('clients.reglements')
                         ->with('error', 'Erreur lors de la suppression du règlement: ' . $e->getMessage());
    }
}






}

