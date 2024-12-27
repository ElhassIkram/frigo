@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h1>Règlements pour {{ $vendeur->nom }} {{ $vendeur->prenom }}</h1>
                    </div>
                    <div class="card-body">
                        <a href="{{ route('vendeurs.index') }}" class="btn btn-secondary float-right">
                            <i class="fa fa-arrow-left"></i> Retour
                        </a>
                        <a href="{{ route('vendeurs.reglements.create', $vendeur->id) }}" class="btn btn-primary">
                            <i class="fa fa-plus-circle"></i> Ajouter Règlement
                        </a>
                                       
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Montant</th>
                                    <th>Observation</th>
                                    <th>Mode</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($reglements as $reglement)
                                    <tr>
                                        <td>{{ $reglement->date }}</td>
                                        <td>{{ $reglement->montant }}</td>
                                        <td>{{ $reglement->observation }}</td>
                                        <td>{{ $reglement->mode->mode }}</td>
                                        <td>
                                        <a href="{{ route('vendeurs.reglements.edit', ['vendeurId' => $vendeur->id, 'reglementId' => $reglement->id]) }}" class="btn btn-success" title="Modifier">
    <i class="fa fa-pencil-alt"></i>
</a>

                                         
                                            <form action="{{ route('vendeurs.reglements.destroy', $reglement->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce règlement?')" title="Supprimer">
                                                    <i class="fa fa-trash"></i> 
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="mt-3">
                            <h4>Total des Règlements : {{ $totalMontant }} DH</h4> <!-- Afficher le total des montants -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
