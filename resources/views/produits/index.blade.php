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
                        <a href="{{ route('produits.create') }}" class="btn btn-primary mb-3">
                            Ajouter Produit
                        </a>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Désignation</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($produits as $produit)
                                    <tr>
                                        <td>
                                            @if ($produit->image)
                                                <!-- Lien pour afficher l'image agrandie -->
                                                <img src="{{ asset('storage/' . $produit->image) }}" 
                                                    alt="Image de produit" 
                                                    class="image-produit" 
                                                    data-bs-toggle="modal" 
                                                    data-bs-target="#imageModal" 
                                                    data-designation="{{ $produit->designation }}" 
                                                    onclick="showImage('{{ asset('storage/' . $produit->image) }}', '{{ $produit->designation }}')">
                                            @else
                                                Aucune image disponible
                                            @endif
                                        </td>

                                        <td>{{ $produit->designation }}</td>

                                        <td>
                                            <!-- Icône Modifier (en bleu) -->
                                            <a href="{{ route('produits.edit', $produit->id) }}" class="btn btn-sm btn-success" title="Modifier">
                                                <i class="fas fa-edit"></i>
                                            </a>

                                            <!-- Icône Supprimer (en rouge) -->
                                            <form action="{{ route('produits.destroy', $produit->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce produit ?')" title="Supprimer">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
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

    <!-- Modal Bootstrap -->
    <div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="imageModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <!-- Image agrandie -->
                    <img id="modalImage" src="" alt="Image agrandie" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
@endsection

<style>
    .image-produit {
        max-width: 90px;
        max-height: 50px;
        object-fit: cover;
        cursor: pointer;
    }
    .img-fluid {
        max-width: 100%;
        height: auto;
    }
</style>

<script>
    function showImage(imageUrl, designation) {
        document.getElementById('modalImage').src = imageUrl;
        document.getElementById('imageModalLabel').innerText = designation; // Met à jour le titre avec la désignation
    }
</script>
