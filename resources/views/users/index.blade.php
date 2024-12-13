@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <h1><div class="card-header">Liste des utilisateurs</div></h1>

                    <div class="card-body">
                        <a href="{{ route('users.create') }}" class="btn btn-primary mb-3">Ajouter un utilisateur</a>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Nom</th>
                                    <th>Email</th>
                             
                                    <th>Téléphone</th> 
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>
                                            @if ($user->image)
                                                <!-- Display user's image -->
                                                <img src="{{ asset('storage/' . $user->image) }}" alt="Image de {{ $user->name }}" 
                                                     class="image-produit" 
                                                     data-bs-toggle="modal" 
                                                     data-bs-target="#imageModal" 
                                                     data-name="{{ $user->name }}" 
                                                     onclick="showImage('{{ asset('storage/' . $user->image) }}', '{{ $user->name }}')">
                                            @else
                                                <span class="text-muted">Aucune image disponible</span>
                                            @endif
                                        </td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                        
                                        
                                        <td>{{ $user->telephone ?? 'Non renseigné' }}</td> <!-- Display phone number or a placeholder if not set -->
                                        <td>
                                            <!-- Modifier icon (in blue) -->
                                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-primary" title="Modifier">
                                                <i class="fas fa-edit"></i>
                                            </a>

                                            <!-- Supprimer icon (in red) -->
                                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')" title="Supprimer">
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

    <!-- Modal Bootstrap for Image Preview -->
    <div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="imageModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <!-- Image preview -->
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
    function showImage(imageUrl, name) {
        document.getElementById('modalImage').src = imageUrl;
        document.getElementById('imageModalLabel').innerText = name; // Update modal title with user's name
    }
</script>
