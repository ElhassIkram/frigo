@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Form for creating a BonLivraison -->
    <div class="card">
        <div class="card-header">Créer un bon de livraison</div>
        <div class="card-body">
            <form id="bonLivraisonForm">
                @csrf
                <!-- Form fields for BonLivraison -->
                <div class="form-group row">
                    <label for="date" class="col-md-4 col-form-label text-md-right">Date</label>
                    <div class="col-md-6">
                        <input id="date" type="date" class="form-control" name="date" required autofocus>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="observation" class="col-md-4 col-form-label text-md-right">Observation</label>
                    <div class="col-md-6">
                        <textarea id="observation" class="form-control" name="observation" rows="3"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="vendeur_id" class="col-md-4 col-form-label text-md-right">ID Vendeur</label>
                    <div class="col-md-6">
                        <select id="vendeur_id" class="form-control" name="vendeur_id" required>
                            <option value="">Select ID Vendeur</option>
                            @foreach($vendeurs as $vendeur)
                                <option value="{{ $vendeur->id }}">{{ $vendeur->id }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="client_id" class="col-md-4 col-form-label text-md-right">ID Client</label>
                    <div class="col-md-6">
                        <select id="client_id" class="form-control" name="client_id" required>
                            <option value="">Select ID Client</option>
                            @foreach($clients as $client)
                                <option value="{{ $client->id }}">{{ $client->id }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Form for creating DetailBonLivraison -->
    <div class="card mt-4">
        <div class="card-header">Ajouter un détail de bon de livraison</div>
        <div class="card-body">
            <form id="detailBonLivraisonForm"  method="POST">
                @csrf
                <!-- Form fields for DetailBonLivraison -->
                <div class="form-group row">
                    <label for="conditionnement_id" class="col-md-4 col-form-label text-md-right">Conditionnement ID</label>
                    <div class="col-md-6">
                        <select id="conditionnement_id" class="form-control" name="conditionnement_id" required>
                            <option value="">Select Conditionnement ID</option>
                            @foreach($conditionnements as $conditionnement)
                                <option value="{{ $conditionnement->id }}">{{ $conditionnement->id }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="produit_id" class="col-md-4 col-form-label text-md-right">Produit ID</label>
                    <div class="col-md-6">
                        <select id="produit_id" class="form-control" name="produit_id" required>
                            <option value="">Select Produit ID</option>
                            @foreach($produits as $produit)
                                <option value="{{ $produit->id }}">{{ $produit->id }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="qte" class="col-md-4 col-form-label text-md-right">Quantité</label>
                    <div class="col-md-6">
                        <input id="qte" type="number" class="form-control" name="qte" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="prix_vente" class="col-md-4 col-form-label text-md-right">Prix de vente</label>
                    <div class="col-md-6">
                        <input id="prix_vente" type="number" step="0.01" class="form-control" name="prix_vente" required>
                    </div>
                </div>
                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="button" class="btn btn-primary" onclick="ajouterDetail()">Ajouter Détail</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Table to display added details -->
    <div class="card mt-4">
        <div class="card-header">Détails du bon de livraison</div>
        <div class="card-body">
            <table class="table" id="detailTable">
                <thead>
                    <tr>
                        <th>Conditionnement ID</th>
                        <th>Produit ID</th>
                        <th>Quantité</th>
                        <th>Prix de vente</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Details rows will be appended here -->
                </tbody>
            </table>
            <button type="button" class="btn btn-success" onclick="validerBonLivraison()">Valider le bon de livraison</button>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    let details = [];

    function ajouterDetail() {
        const conditionnement_id = $('#conditionnement_id').val();
        const produit_id = $('#produit_id').val();
        const qte = $('#qte').val();
        const prix_vente = $('#prix_vente').val();

        if (conditionnement_id && produit_id && qte && prix_vente) {
            details.push({ conditionnement_id, produit_id, qte, prix_vente });

            const newRow = `
                <tr>
                    <td>${conditionnement_id}</td>
                    <td>${produit_id}</td>
                    <td>${qte}</td>
                    <td>${prix_vente}</td>
                    <td><button type="button" class="btn btn-danger" onclick="removeDetail(this)">Supprimer</button></td>
                </tr>
            `;

            $('#detailTable tbody').append(newRow);

            $('#detailBonLivraisonForm')[0].reset();
        } else {
            alert('Veuillez remplir tous les champs du détail.');
        }
    }

    function removeDetail(button) {
        const row = $(button).closest('tr');
        const index = row.index();
        details.splice(index, 1);
        row.remove();
    }

    function validerBonLivraison() {
        const bonLivraisonData = {
            date: $('#date').val(),
            observation: $('#observation').val(),
            vendeur_id: $('#vendeur_id').val(),
            client_id: $('#client_id').val(),
            details: details
        };


        $.ajax({
            url: '{{ route('bonlivrasons.store') }}',
            type: 'POST',
            data: JSON.stringify(bonLivraisonData),
            contentType: 'application/json',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            
            success: function(response) {
                alert('Bon de livraison créé avec succès !');
                console.log('Réponse du serveur :', response);
                details = [];

                $('#detailTable tbody').empty();
                $('#bonLivraisonForm')[0].reset();
            },
            error: function() {
                alert('Erreur lors de la création du bon de livraison.');
            }        
        });
    }
</script>
@endsection
