@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h1>{{ __('Liste des Clients') }}</h1>
                </div>
                
                <div class="card-body">
                    <a href="{{ route('clients.create') }}" class="btn btn-primary mb-3">Ajouter un Client</a>
                
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Adresse</th>
                                <th>Ville</th>
                                <th>Tel</th>
                                <th>Email</th>
                                <th>Vendeur</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clients as $client)
                                <tr>
                                 
                                    <td>{{ $client->nom }}</td>
                                    <td>{{ $client->prenom }}</td>
                                    <td>{{ $client->adresse }}</td>
                                    <td>{{ $client->ville }}</td>
                                    <td>{{ $client->tell }}</td>
                                    <td>{{ $client->email }}</td>
                                    <td>
                                        @if($client->vendeur)
                                            {{ $client->vendeur->nom }} {{ $client->vendeur->prenom }}
                                        @else
                                            <em>Non attribué</em>
                                        @endif
                                    </td>
                                    <td>
                                        <!-- Icône Éditer -->
                                        <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-primary btn-sm" title="Éditer">
                                            <i class="fa fa-edit"></i>
                                        </a>

                                        <!-- Icône Règlements -->
                                        <a href="{{ route('clients.reglements', $client->id) }}" class="btn btn-secondary btn-sm" title="Règlements">
                                            <i class="fa fa-credit-card"></i> 
                                        </a>
                                            <!-- Lien Ajouter un Règlement par id -->
                                            <a href="{{ route('clients.addReglement', $client->id) }}" class="btn btn-success btn-sm" title="Ajouter un Règlement">
                                                    <i class="fa fa-plus"></i>
                                                </a>
                                        <!-- Icône Supprimer -->
                                        <form action="{{ route('clients.destroy', $client->id) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce client?')" title="Supprimer">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- Pagination -->
                    <div class="d-flex justify-content-center">
                        {{ $clients->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
