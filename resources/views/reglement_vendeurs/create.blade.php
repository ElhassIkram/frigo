@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h1>{{ __('Ajouter un Règlement pour') }} {{ $vendeur->nom }} {{ $vendeur->prenom }}</h1>

                        <!-- Affichage d'un message de succès après l'enregistrement -->
                        @if(session('success'))
                            <div class="alert alert-success mt-3">
                                {{ session('success') }}
                            </div>
                        @endif
                    </div>

                    <div class="card-body">
                        <!-- Formulaire pour ajouter un règlement -->
                        <form action="{{ route('vendeurs.reglements.store', $vendeur->id) }}" method="POST">
                            @csrf
                    
                            <!-- Champ caché pour vendeur_id -->
                            <input type="hidden" name="vendeur_id" value="{{ $vendeur->id }}">

                            <div class="form-group">
                                <label for="vendeur">{{ __('Vendeur') }}</label>
                                <input type="text" class="form-control" value="{{ $vendeur->nom }} {{ $vendeur->prenom }}" disabled>
                                @error('vendeur_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Date -->
                            <div class="form-group">
                                <label for="date">{{ __('Date') }}</label>
                                <input type="date" name="date" class="form-control" value="{{ old('date') }}">
                                @error('date')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Montant -->
                            <div class="form-group">
                                <label for="montant">{{ __('Montant') }}</label>
                                <input type="number" name="montant" class="form-control" value="{{ old('montant') }}" step="0.01">
                                @error('montant')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Observation -->
                            <div class="form-group">
                                <label for="observation">{{ __('Observation') }}</label>
                                <textarea name="observation" class="form-control">{{ old('observation') }}</textarea>
                                @error('observation')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Mode de Paiement -->
                            <div class="form-group">
                                <label for="mode_id">{{ __('Mode de Paiement') }}</label>
                                <select name="mode_id" class="form-control">
                                    <option value="">{{ __('Sélectionnez un mode') }}</option>
                                    @foreach($modes as $mode)
                                        <option value="{{ $mode->id }}" {{ old('mode_id') == $mode->id ? 'selected' : '' }}>
                                            {{ $mode->mode }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('mode_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Boutons d'action -->
                            <button type="submit" class="btn btn-primary">{{ __('Ajouter') }}</button>
                            <a href="{{ url()->previous() }}" class="btn btn-secondary">{{ __('Retour') }}</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
