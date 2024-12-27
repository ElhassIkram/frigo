@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>{{ __('Ajouter un règlement') }}</h1>
                </div>
                <div class="card-body">
                <!-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif -->

                    <form action="{{ route('clients.storeReglement', $client->id) }}" method="POST">
                        @csrf
                        <!-- Champ affichant le client -->
                        <input type="hidden" name="client_id" value="{{ $client->id }}">

                        <div class="form-group">
                            <label for="client">{{ __('Client') }}</label>
                            <input type="text" class="form-control" value="{{ $client->nom }} {{ $client->prenom }}" disabled>
                            @error('client_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Sélection du mode de paiement -->
                        <div class="form-group">
                            <label for="mode_id">{{ __('Mode de paiement') }}</label>
                            <select name="mode_id" id="mode_id" class="form-control">
                                <option value="">{{ __('Sélectionnez un mode') }}</option>
                                @foreach ($modes as $mode)
                                    <option value="{{ $mode->id }}" {{ old('mode_id') == $mode->id ? 'selected' : '' }}>
                                        {{ $mode->mode }}
                                    </option>
                                @endforeach
                            </select>
                            @error('mode_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Champ montant -->
                        <div class="form-group">
                            <label for="montant">{{ __('Montant') }}</label>
                            <input type="number" step="0.01" name="montant" id="montant" class="form-control" value="{{ old('montant') }}">
                            @error('montant')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Champ date -->
                        <div class="form-group">
                            <label for="date">{{ __('Date') }}</label>
                            <input type="date" name="date" id="date" class="form-control" value="{{ old('date') }}">
                            @error('date')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Champ observation -->
                        <div class="form-group">
                            <label for="observation">{{ __('Observation') }}</label>
                            <textarea name="observation" id="observation" class="form-control" rows="3" placeholder="{{ __('Ajouter une observation (optionnel)') }}">{{ old('observation') }}</textarea>
                            @error('observation')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Boutons d'action -->
                        <button type="submit" class="btn btn-primary">{{ __('Ajouter') }}</button>
                        <a href="{{ route('clients.reglements', $client->id) }}" class="btn btn-secondary">{{ __('Retour') }}</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
