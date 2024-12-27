@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h1>Liste des Vendeurs</h1>
                    </div>
                    <div class="card-body">
                        <a href="{{ route('vendeurs.create') }}" class="btn btn-primary float-right">
                            <i class="fa fa-plus"></i> Ajouter un vendeur
                        </a>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>Adresse</th>
                                    <th>Ville</th>
                                    <th>Téléphone</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($vendeurs as $vendeur)
                                    <tr>
                                        <td>{{ $vendeur->nom }}</td>
                                        <td>{{ $vendeur->prenom }}</td>
                                        <td>{{ $vendeur->adresse }}</td>
                                        <td>{{ $vendeur->ville }}</td>
                                        <td>{{ $vendeur->tell }}</td>
                                        <td>{{ $vendeur->email }}</td>
                                        <td>
                                            <!-- Bouton Voir -->
                                            <!-- <a href="{{ route('vendeurs.show', $vendeur->id) }}" class="btn btn-info btn-sm" title="Voir">
                                                <i class="fa fa-eye"></i>
                                            </a> -->

                                            <!-- Bouton Modifier -->
                                            <a href="{{ route('vendeurs.edit', $vendeur->id) }}" class="btn btn-primary btn-sm" title="Modifier">
                                                <i class="fa fa-edit"></i>
                                            </a>

                                            <!-- Bouton Règlements -->
                                            <a href="{{ route('vendeurs.reglements', $vendeur->id) }}" class="btn btn-secondary btn-sm" title="Règlements">
                                            <i class="fa fa-credit-card"></i>
                                            </a>
                                            <a href="{{ route('vendeurs.reglements.create', $vendeur->id) }}" class="btn btn-success btn-sm"    title="Ajouter un Règlement">
                                            <i class="fa fa-plus"></i>
                                            </a>
                         
                                            <!-- Bouton Supprimer -->
                                            <form action="{{ route('vendeurs.destroy', $vendeur->id) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce vendeur?')" title="Supprimer">
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
