@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>Modifier le règlement pour {{ $client->nom }}</h1>
                    <!-- Affichage des messages de succès -->
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Affichage des messages d'erreur -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                <div class="card-body">
                    <!-- Formulaire de modification -->
                    <form action="{{ route('reglements.update', [$client->id, $reglement->id]) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Champ caché pour client_id -->
                        <input type="hidden" name="client_id" value="{{ $client->id }}">

                        <!-- Champ Date -->
                        <div class="form-group">
                            <label for="date">Date :</label>
                            <input type="date" name="date" id="date" class="form-control" value="{{ old('date', $reglement->date) }}" required>
                            @if ($errors->has('date'))
                                <div class="text-danger">{{ $errors->first('date') }}</div>
                            @endif
                        </div>

                        <!-- Champ Montant -->
                        <div class="form-group">
                            <label for="montant">Montant :</label>
                            <input type="number" name="montant" id="montant" class="form-control" value="{{ old('montant', $reglement->montant) }}" required>
                            @if ($errors->has('montant'))
                                <div class="text-danger">{{ $errors->first('montant') }}</div>
                            @endif
                        </div>

                        <!-- Champ Mode de paiement -->
                        <div class="form-group">
                            <label for="mode_id">Mode de paiement :</label>
                            <select name="mode_id" id="mode_id" class="form-control" required>
                                <option value="">{{ __('Sélectionnez un mode') }}</option>
                                @foreach($modes as $mode)
                                    <option value="{{ $mode->id }}" {{ old('mode_id', $reglement->mode_id) == $mode->id ? 'selected' : '' }}>
                                        {{ $mode->mode }}
                                    </option>
                                @endforeach
                            </select>
                            @if ($errors->has('mode_id'))
                                <div class="text-danger">{{ $errors->first('mode_id') }}</div>
                            @endif
                        </div>

                        <!-- Champ Observation -->
                        <div class="form-group">
                            <label for="observation">Observation :</label>
                            <textarea name="observation" id="observation" class="form-control" rows="3">{{ old('observation', $reglement->observation) }}</textarea>
                            @if ($errors->has('observation'))
                                <div class="text-danger">{{ $errors->first('observation') }}</div>
                            @endif
                        </div>

                        <!-- Boutons -->
                        <button type="submit" class="btn btn-primary">Mettre à jour</button>
                        <a href="{{ route('clients.reglements', $client->id) }}" class="btn btn-secondary">Retour</a>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
