<?php

namespace App\Http\Controllers;

use App\Models\ReglementVendeur;
use App\Models\Mode;
use App\Models\Vendeur;
use Illuminate\Http\Request;
use App\Http\Requests\ReglementVendeurRequest;

class ReglementVendeurController extends Controller
{
    // Affiche les règlements pour un vendeur donné
    public function showByVendeur($vendeurId)
    {
        // Récupérer le vendeur
        $vendeur = Vendeur::findOrFail($vendeurId);
        
        // Récupérer tous les règlements pour ce vendeur
        $reglements = ReglementVendeur::where('vendeur_id', $vendeurId)
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        
        // Calculer le total des montants
        $totalMontant = $reglements->sum('montant');
    
        // Passer les données à la vue
        return view('reglement_vendeurs.index', compact('vendeur', 'reglements', 'totalMontant'));
    }
    

    // Affiche le formulaire de création d'un règlement pour un vendeur
    public function create($vendeurId)
    {
        $vendeur = Vendeur::findOrFail($vendeurId); // Récupère le vendeur par son ID
        $modes = Mode::all(); // Récupère tous les modes de paiement disponibles

        return view('reglement_vendeurs.create', compact('vendeur', 'modes'));
    }

    // Enregistre un règlement pour un vendeur
    public function storeReglement(ReglementVendeurRequest $request, $vendeurId)
    {
        try {
            // Vérifier l'existence du vendeur
            $vendeur = Vendeur::findOrFail($vendeurId);
    
            // Créer un nouveau règlement pour le vendeur
            ReglementVendeur::create([
                'vendeur_id' => $vendeur->id,
                'date' => $request->validated('date'),
                'montant' => $request->validated('montant'),
                'mode_id' => $request->validated('mode_id'),
                'observation' => $request->validated('observation'),
            ]);
    
            // Redirection vers la route affichant les règlements du vendeur
            return redirect()
                ->route('vendeurs.reglements', ['vendeurId' => $vendeur->id])
                ->with('success', 'Règlement ajouté avec succès.');
        } catch (\Exception $e) {
            // Gestion des erreurs
            return redirect()
                ->back()
                ->withInput($request->all())
                ->withErrors(['error' => 'Erreur lors de l\'ajout du règlement : ' . $e->getMessage()]);
        }
    }
    

    // Affiche le formulaire d'édition d'un règlement
    public function edit($vendeurId, $reglementId)
    {
        $vendeur = Vendeur::findOrFail($vendeurId); // Récupère le vendeur par ID
        $reglement = ReglementVendeur::where('vendeur_id', $vendeurId)
                                     ->where('id', $reglementId)
                                     ->firstOrFail(); // Récupère le règlement par son ID
        $modes = Mode::all(); // Récupère tous les modes de paiement disponibles

        return view('reglement_vendeurs.edit', compact('vendeur', 'reglement', 'modes'));
    }

    // Met à jour un règlement pour un vendeur
    public function updateReglement(ReglementVendeurRequest $request, $vendeurId, $reglementId)
    {
        try {
            // Récupérer le règlement à mettre à jour
            $reglement = ReglementVendeur::where('vendeur_id', $vendeurId)
                                         ->where('id', $reglementId)
                                         ->firstOrFail();
    
            // Mise à jour des informations du règlement
            $reglement->update([
                'date' => $request->validated('date'),
                'montant' => $request->validated('montant'),
                'mode_id' => $request->validated('mode_id'),
                'observation' => $request->validated('observation'),
            ]);
    
            // Redirection vers la route affichant les règlements du vendeur
            return redirect()
                ->route('vendeurs.reglements', ['vendeurId' => $vendeurId])
                ->with('success', 'Règlement mis à jour avec succès.');
        } catch (\Exception $e) {
            // Gestion des erreurs
            return redirect()
                ->back()
                ->withErrors(['error' => 'Erreur lors de la mise à jour : ' . $e->getMessage()]);
        }
    }
    
    // Supprime un règlement spécifique pour un vendeur donné
// Supprime un règlement spécifique pour un vendeur donné
// Supprime un règlement spécifique pour un client donné
// Supprime un règlement spécifique pour un vendeur donné
public function destroy($reglementId)
{
    try {
        // Récupérer le règlement avec l'ID fourni
        $reglement = ReglementVendeur::findOrFail($reglementId);

        // Supprimer le règlement
        $reglement->delete();

        // Rediriger avec un message de succès vers la page des règlements du vendeur
        return redirect()->route('vendeurs.reglements', ['vendeurId' => $reglement->vendeur_id])
                         ->with('success', 'Règlement supprimé avec succès.');
    } catch (\Exception $e) {
        // Gérer les erreurs et rediriger avec un message d'erreur
        return redirect()->route('vendeurs.reglements', ['vendeurId' => $reglement->vendeur_id])
                         ->with('error', 'Erreur lors de la suppression du règlement: ' . $e->getMessage());
    }
}



}
