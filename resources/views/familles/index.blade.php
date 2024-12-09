@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h1>Liste des Familles</h1>
                    </div>
                    <div class="card-body">
                        <a href="{{ route('familles.create') }}" class="btn btn-primary mb-3">Ajouter Famille</a>
                      
                       
                    <div class="card-body">
                         @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif 
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Famille</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($familles as $famille)
                                    <tr>
                                        <td>{{ $famille->famille }}</td>
                                        <td>
                                            <a href="{{ route('familles.edit', $famille->id) }}" class="btn btn-primary btn-sm">Modifier</a>
                                            <a href="{{ route('familles.show', $famille->id) }}" class="btn btn-primary btn-sm">voir</a>
                                           
                                            <form action="{{ route('familles.destroy', $famille->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette famille ?')">Supprimer</button>
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
