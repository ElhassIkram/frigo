@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Modifier le Conditionnement</div>

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
                    <form action="{{ route('conditionnements.update', $conditionnement->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="conditionnement">Conditionnement</label>
                            <input type="text" class="form-control @error('conditionnement') is-invalid @enderror" 
                                id="conditionnement" 
                                name="conditionnement"  
                                value="{{ old('conditionnement', $conditionnement->conditionnement) }}" 
                                autofocus>
                            
                            
                        </div>
                        <button type="submit" class="btn btn-primary">Modifier</button>
                        <a href="{{ route('conditionnements.index') }}" class="btn btn-secondary">Retour</a>
                    </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
