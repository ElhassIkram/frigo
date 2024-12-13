@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Liste des Conditionnements</div>

                    <div class="card-body">
                        <!-- @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif -->

                        <a href="{{ route('conditionnements.create') }}" class="btn btn-primary mb-3">
                             Ajouter un Conditionnement
                        </a>

                        <table class="table">
                            <thead>
                                <tr>
                                    
                                    <th>Conditionnement</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($conditionnements as $conditionnement)
                                    <tr>
                                        
                                        <td>{{ $conditionnement->conditionnement }}</td>
                                        <td>
                                            <!-- Bouton Voir avec icône -->
                                            <!-- <a href="{{ route('conditionnements.show', $conditionnement->id) }}" 
                                                class="btn btn-info btn-sm" title="Voir">
                                                <i class="fa fa-eye"></i>
                                            </a> -->

                                            <!-- Bouton Modifier avec icône -->
                                            <a href="{{ route('conditionnements.edit', $conditionnement->id) }}" 
                                                class="btn btn-primary btn-sm" title="Modifier">
                                                <i class="fa fa-edit"></i>
                                            </a>

                                            <!-- Bouton Supprimer avec icône -->
                                            <form action="{{ route('conditionnements.destroy', $conditionnement->id) }}" 
                                                  method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" 
                                                        title="Supprimer" 
                                                        onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce conditionnement?')">
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
                        {{ $conditionnements->links('pagination::bootstrap-4') }}
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
