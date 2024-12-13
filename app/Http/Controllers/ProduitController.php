<?php

namespace App\Http\Controllers;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use App\Models\Produit;
use App\Models\Famille;

class ProduitController extends Controller
{
    public function index()
    {
        $produits = Produit::all();
        return view('produits.index', compact('produits'));
    }

    public function create()
    {
        $familles = Famille::all();
        return view('produits.create', compact('familles'));
    }

    public function store(Request $request)
{
    // Validation des données
    $request->validate([
        'designation' => 'required|string',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validation de l'image
        'famille_id' => 'required|exists:familles,id',
    ]);

    // Récupérer les données validées sauf l'image
    $validatedData = $request->only('designation', 'famille_id');

    // Vérifier si une image est téléchargée
    if ($request->hasFile('image')) {
        // Récupérer l'image
        $image = $request->file('image');

        // Créer un chemin de stockage pour l'image
        $imagePath = 'images/' . uniqid() . '.' . $image->getClientOriginalExtension();

        // Créer le dossier s'il n'existe pas
        $imageDirectory = public_path('storage/images');
        if (!file_exists($imageDirectory)) {
            mkdir($imageDirectory, 0755, true); // Crée le dossier si nécessaire
        }

        // Charger l'image
        $img = Image::make($image);

        // Créer une image carrée de 300x300 avec un fond blanc
        $img->fit(650, 350, function ($constraint) {
            $constraint->upsize(); // Permet d'agrandir les petites images
        });

        // Sauvegarder l'image dans le dossier 'public/images'
        $img->save(public_path('storage/' . $imagePath));

        // Ajouter le chemin de l'image redimensionnée à l'array des données validées
        $validatedData['image'] = $imagePath;
    }

    // Créer un nouveau produit avec les données validées
    Produit::create($validatedData);

    // Rediriger avec un message de succès
    return redirect()->route('produits.index')->with('success', 'Produit ajouté avec succès.');
}


    public function show(Produit $produit)
    {
        return view('produits.show', compact('produit'));
    }

    public function edit(Produit $produit)
    {
        $familles = Famille::all();
        return view('produits.edit', compact('produit', 'familles'));
    }
    public function update(Request $request, Produit $produit)
    {
        // Validation des données
        $request->validate([
            'designation' => 'required|string',
            'famille_id' => 'required|exists:familles,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Image est optionnelle
        ]);
    
        // Mettre à jour les informations du produit (sans l'image pour le moment)
        $validatedData = $request->only('designation', 'famille_id');
    
        // Vérifier si une nouvelle image est téléchargée
        if ($request->hasFile('image')) {
            // Récupérer l'image téléchargée
            $image = $request->file('image');
    
            // Créer un chemin pour la nouvelle image
            $imagePath = 'images/' . uniqid() . '.' . $image->getClientOriginalExtension();
    
            // Créer le dossier s'il n'existe pas
            $imageDirectory = public_path('storage/images');
            if (!file_exists($imageDirectory)) {
                mkdir($imageDirectory, 0755, true); // Créer le dossier si nécessaire
            }
    
            // Charger l'image avec Intervention Image
            $img = Image::make($image);
    
            // Redimensionner l'image à 650x350
            $img->fit(650, 350, function ($constraint) {
                $constraint->upsize(); // Permet d'agrandir les petites images
            });
    
            // Sauvegarder l'image dans le dossier 'public/storage/images'
            $img->save(public_path('storage/' . $imagePath));
    
            // Ajouter le chemin de la nouvelle image à l'array des données validées
            $validatedData['image'] = $imagePath;
    
            // Supprimer l'ancienne image si elle existe
            if ($produit->image && file_exists(public_path('storage/' . $produit->image))) {
                unlink(public_path('storage/' . $produit->image)); // Supprimer l'ancienne image
            }
        }
    
        // Mettre à jour le produit avec les données validées (image incluse si modifiée)
        $produit->update($validatedData);
    
        // Rediriger avec un message de succès
        return redirect()->route('produits.index')->with('success', 'Produit mis à jour avec succès.');
    }
    

    public function destroy(Produit $produit)
    {
       try{ $produit->delete();

        return redirect()->route('produits.index')->with('success', 'Produit supprimé avec succès.');
    }
    catch (\Exception $e) {
        return redirect()->route('produits.index')->with('error', 'Erreur lors de la suppression.');
    }
}
}
