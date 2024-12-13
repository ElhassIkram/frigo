@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Ajouter un Conditionnement</div>

                    <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                        <form action="{{ route('conditionnements.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="conditionnement">Conditionnement</label>
                                <input type="text" 
                                       class="form-control @error('conditionnement') is-invalid @enderror" 
                                       id="conditionnement" 
                                       name="conditionnement" 
                                       placeholder="Nom du conditionnement"
                                       value="{{ old('conditionnement') }}">
                              
                            </div>
                            <button type="submit" class="btn btn-primary">Ajouter</button>
                            <a href="{{ route('conditionnements.index') }}" class="btn btn-secondary">Retour</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
