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
        $request->validate([
            'designation' => 'required|string',
            'famille_id' => 'required|exists:familles,id',
        ]);

        $produit->update($request->only('designation', 'famille_id'));

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
