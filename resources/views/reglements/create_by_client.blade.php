@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Règlements pour {{ $client->nom }} {{ $client->prenom }}</h1>

    <!-- Formulaire pour ajouter un règlement -->
    <form action="{{ route('clients.addReglement', $client->id) }}" method="POST" class="mb-4">
        @csrf
        <div class="row">
            <div class="col-md-4">
                <label for="montant">Montant :</label>
                <input type="number" name="montant" id="montant" class="form-control" step="0.01" required>
            </div>
            <div class="col-md-4">
                <label for="date">Date :</label>
                <input type="date" name="date" id="date" class="form-control" required>
            </div>
            <div class="col-md-4">
                <label for="mode_id">Mode de règlement :</label>
                <select name="mode_id" id="mode_id" class="form-control" required>
                    <option value="" disabled selected>Choisir un mode</option>
                    @foreach ($mode as $m)
                        <option value="{{ $m->id }}">{{ $m->nom }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-success mt-3">Ajouter un règlement</button>
    </form>

    <!-- Liste des règlements -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Montant</th>
                <th>Date</th>
                <th>Mode</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reglements as $reglement)
                <tr>
                    <td>{{ $reglement->montant }}</td>
                    <td>{{ $reglement->date }}</td>
                    <td>{{ $reglement->mode->nom }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Pagination -->
    <div class="d-flex justify-content-center">
        {{ $reglements->links('pagination::bootstrap-4') }}
    </div>
</div>
@endsection
