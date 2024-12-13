@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>{{ __('Règlements pour le client: ') }} {{ $client->nom }} {{ $client->prenom }}</h4>     
                </div>
                
                <div class="card-body">
                    
                    <a href="{{ route('clients.index') }}" class="btn btn-secondary">Retour </a>
                    <!-- Lien Ajouter un Règlement par id -->
                    <a href="{{ route('clients.addReglement', $client->id) }}" class="btn btn-primary " title="Ajouter un Règlement">
                                                    <i class="fa fa-plus"></i>Ajouter Règlement
                                                </a>
                
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Montant</th>
                                <th>Date</th>
                                <th>Mode de règlement</th>
                                <th>Observation</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reglements as $reglement)
                                <tr>
                                    <td>{{ $reglement->id }}</td>
                                    <td>{{ $reglement->montant }}</td>
                                    <td>{{ $reglement->date }}</td>
                                    <td>{{ $reglement->mode->mode }}</td>
                                    <td>{{ $reglement->observation ?? 'Aucune observation' }}</td> <!-- Affiche 'Aucune observation' si vide -->
                                    <td>
                                        <!-- Modifier avec icône -->
                                        <a href="{{ route('reglements.edit', $reglement->id) }}" class="btn btn-sm btn-success" title="Modifier">
                                            <i class="fa fa-edit"></i>
                                        </a>

                                        <!-- Supprimer avec icône -->
                                        <form action="{{ route('reglements.destroy', $reglement->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce règlement ?')" title="Supprimer">
                                                <i class="fa fa-trash"></i>
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
@endsection
