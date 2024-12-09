@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h1>Liste des Produits</h1>
                        </div>
                    <div class="card-body">
                        <a href="{{ route('produits.create') }}" class="btn btn-primary mb-3">Ajouter Produit</a>
                      
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Désignation</th>
                                    <th>IMAGE DE produit</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($produits as $produit)
                                    <tr>
                                       
                                        <td>{{ $produit->designation }}</td>
                                        <td>
                                            @if ($produit->image)
                                            <img src="{{ asset('storage/' . $produit->image) }}" alt="Image de produit" style="max-width: 100px;">
                                            @else
                                            Aucune image disponible
                                            
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('produits.edit', $produit->id) }}" class="btn btn-primary btn-sm">Modifier</a>
                                            <a href="{{ route('produits.show', $produit->id) }}" class="btn btn-primary btn-sm">voir</a>
                                           
                                            <form action="{{ route('produits.destroy', $produit->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce produit ?')">Supprimer</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
