@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>{{ __('Ajouter un règlement') }}</h1>
                    <!-- @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif -->
                </div>
                <div class="card-body">
                    <form action="{{ route('clients.storeReglement', $client->id) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="client">{{ __('Client') }}</label>
                            <input type="text" class="form-control" value="{{ $client->nom }} {{ $client->prenom }}" disabled>
                        </div>

                        <div class="form-group">
                            <label for="mode_id">{{ __('Mode de paiement') }}</label>
                            <select name="mode_id" id="mode_id" class="form-control">
                                <option value="">{{ __('Sélectionnez un mode') }}</option>
                                @foreach ($modes as $mode)
                                    <option value="{{ $mode->id }}" {{ old('mode_id') == $mode->id ? 'selected' : '' }}>{{ $mode->mode }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('mode_id'))
                                <div class="text-danger">{{ $errors->first('mode_id') }}</div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="montant">{{ __('Montant') }}</label>
                            <input type="number" step="0.01" name="montant" id="montant" class="form-control" value="{{ old('montant') }}">
                            @if ($errors->has('montant'))
                                <div class="text-danger">{{ $errors->first('montant') }}</div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="date">{{ __('Date') }}</label>
                            <input type="date" name="date" id="date" class="form-control" value="{{ old('date') }}">
                            @if ($errors->has('date'))
                                <div class="text-danger">{{ $errors->first('date') }}</div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="observation">{{ __('Observation') }}</label>
                            <textarea name="observation" id="observation" class="form-control" rows="3" placeholder="{{ __('Ajouter une observation (optionnel)') }}">{{ old('observation') }}</textarea>
                            @if ($errors->has('observation'))
                                <div class="text-danger">{{ $errors->first('observation') }}</div>
                            @endif
                        </div>

                        <button type="submit" class="btn btn-primary">{{ __('Ajouter') }}</button>
                        <a href="{{ route('clients.index') }}" class="btn btn-secondary">{{ __('Annuler') }}</a>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
