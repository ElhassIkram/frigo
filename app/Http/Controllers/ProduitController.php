<?php

namespace App\Http\Controllers;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use App\Models\Produit;
use App\Models\Famille;
use App\Http\Requests\ProduitRequest;

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

    public function store(ProduitRequest $request)
    {
        // Récupérer les données validées
        $validatedData = $request->validated();

        // Gestion de l'image
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = 'images/' . uniqid() . '.' . $image->getClientOriginalExtension();

            // Créer le dossier s'il n'existe pas
            $imageDirectory = public_path('storage/images');
            if (!file_exists($imageDirectory)) {
                mkdir($imageDirectory, 0755, true);
            }

            // Redimensionner l'image
            $img = Image::make($image);
            $img->fit(650, 350, function ($constraint) {
                $constraint->upsize();
            });

            // Sauvegarder l'image
            $img->save(public_path('storage/' . $imagePath));

            // Ajouter le chemin de l'image redimensionnée
            $validatedData['image'] = $imagePath;
        }

        // Créer le produit
        Produit::create($validatedData);

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
    public function update(ProduitRequest $request, Produit $produit)
    {
        // Récupérer les données validées
        $validatedData = $request->validated();

        // Gestion de l'image si une nouvelle image est téléchargée
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = 'images/' . uniqid() . '.' . $image->getClientOriginalExtension();

            // Créer le dossier s'il n'existe pas
            $imageDirectory = public_path('storage/images');
            if (!file_exists($imageDirectory)) {
                mkdir($imageDirectory, 0755, true);
            }

            // Redimensionner l'image
            $img = Image::make($image);
            $img->fit(650, 350, function ($constraint) {
                $constraint->upsize();
            });

            // Sauvegarder l'image
            $img->save(public_path('storage/' . $imagePath));

            // Ajouter le chemin de la nouvelle image
            $validatedData['image'] = $imagePath;

            // Supprimer l'ancienne image si elle existe
            if ($produit->image && file_exists(public_path('storage/' . $produit->image))) {
                unlink(public_path('storage/' . $produit->image));
            }
        }

        // Mettre à jour le produit
        $produit->update($validatedData);

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
