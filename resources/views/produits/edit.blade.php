@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        <h1>Modifier le Produit</h1>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('produits.update', $produit->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <!-- Désignation du produit -->
                            <div class="form-group">
                                <label for="designation">Désignation</label>
                                <input type="text" class="form-control" id="designation" name="designation" value="{{ old('designation', $produit->designation) }}" required>
                                @error('designation')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Sélection de la famille -->
                            <div class="form-group">
                                <label for="famille_id">Famille</label>
                                <select class="form-control" id="famille_id" name="famille_id" required>
                                    @foreach ($familles as $famille)
                                        <option value="{{ $famille->id }}" @if ($famille->id == $produit->famille_id) selected @endif>{{ $famille->famille }}</option>
                                    @endforeach
                                </select>
                                @error('famille_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Image actuelle -->
                            <div class="form-group">
                                <label for="current_image">Image actuelle</label><br>
                                @if($produit->image)
                                    <img src="{{ asset('storage/' . $produit->image) }}" alt="Image actuelle" style="width: 150px; height: auto;">
                                @else
                                    <p>Aucune image actuelle</p>
                                @endif
                            </div>

                            <!-- Choix d'une nouvelle image -->
                            <div class="form-group">
                                <label for="image">Nouvelle image (optionnelle)</label>
                                <input type="file" class="form-control-file" id="image" name="image">
                                @error('image')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Bouton de soumission -->
                            <button type="submit" class="btn btn-primary">Modifier</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
