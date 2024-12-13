@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Modifier la Famille') }}</div>

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
                    <form method="POST" action="{{ route('familles.update', $famille->id) }}">
                        @csrf
                        @method('PUT')

                        <!-- Nom de la famille -->
                        <div class="form-group">
                            <label for="famille">{{ __('Nom de la Famille') }}</label>
                            <input id="famille" type="text" 
                                   class="form-control @error('famille') is-invalid @enderror" 
                                   name="famille" 
                                   value="{{ old('famille', $famille->famille) }}"  autofocus>
                            
                          
                        </div>

                        <!-- Boutons d'action -->
                        <div class="form-group mt-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Mettre à jour') }}
                            </button>
                            <a href="{{ route('familles.index') }}" class="btn btn-secondary">
                                {{ __('Annuler') }}
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
