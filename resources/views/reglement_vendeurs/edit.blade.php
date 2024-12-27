@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>Modifier le Règlement pour {{ $vendeur->nom }}</h1>

                    <!-- Affichage des messages de succès -->
                    @if(session('success'))
                        <div class="alert alert-success mt-3">
                            {{ session('success') }}
                        </div>
                    @endif
                </div>
                <div class="card-body">
                    <!-- Formulaire de modification -->
                    <form action="{{ route('vendeurs.reglements.update', [$vendeur->id, $reglement->id]) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Champ caché pour vendeur_id -->
                        <input type="hidden" name="vendeur_id" value="{{ $vendeur->id }}">

                        <!-- Champ Date -->
                        <div class="form-group">
                            <label for="date">Date :</label>
                            <input type="date" name="date" id="date" class="form-control" value="{{ old('date', $reglement->date) }}" required aria-required="true">
                            @error('date')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Champ Montant -->
                        <div class="form-group">
                            <label for="montant">Montant :</label>
                            <input type="number" name="montant" id="montant" class="form-control" value="{{ old('montant', $reglement->montant) }}" required aria-required="true">
                            @error('montant')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Champ Observation -->
                        <div class="form-group">
                            <label for="observation">Observation :</label>
                            <textarea name="observation" id="observation" class="form-control" rows="3">{{ old('observation', $reglement->observation) }}</textarea>
                            @error('observation')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Champ Mode de paiement -->
                        <div class="form-group">
                            <label for="mode_id">Mode :</label>
                            <select name="mode_id" id="mode_id" class="form-control" required aria-required="true">
                                <option value="">{{ __('Sélectionnez un mode') }}</option>
                                @foreach($modes as $mode)
                                    <option value="{{ $mode->id }}" {{ old('mode_id', $reglement->mode_id) == $mode->id ? 'selected' : '' }}>
                                        {{ $mode->mode }}
                                    </option>
                                @endforeach
                            </select>
                            @error('mode_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Boutons -->
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                        <a href="{{ route('vendeurs.reglements', $vendeur->id) }}" class="btn btn-secondary">Annuler</a>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
