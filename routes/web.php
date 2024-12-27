<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProduitController;
use App\Http\Controllers\ModeController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\VendeurController;
use App\Http\Controllers\BonEntreController;
use App\Http\Controllers\BonSortController;
use App\Http\Controllers\BonLivrasonController;
use App\Http\Controllers\ConditionnementController;
use App\Http\Controllers\FamilleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReglementVendeurController;
use App\Http\Controllers\ReglementClientController;
use App\Http\Controllers\DetailBonEntreController;

// Route pour afficher la liste des règlements

Route::middleware(['auth'])->group(function () {
Route::post('/detail_bon_entre', 'DetailBonEntreController@store')->name('detail_bon_entre.store');
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::get('reglements', [ReglementClientController::class, 'index'])->name('reglements.index');

// Route pour afficher le formulaire de création d'un règlement
Route::get('reglements/create', [ReglementClientController::class, 'create'])->name('reglements.create');

// Route pour stocker un nouveau règlement


Route::post('clients/{clientId}/reglements', [ReglementClientController::class, 'store'])->name('reglements.store');




// Route pour afficher le formulaire d'édition d'un règlement
Route::get('/clients/{clientId}/reglements/{reglementId}/edit', [ReglementClientController::class, 'edit']) ->name('reglements.edit');

// Route pour mettre à jour un règlement existant
Route::put('/clients/{clientId}/reglements/{reglementId}', [ReglementClientController::class, 'update'])
     ->name('reglements.update');
// Route pour supprimer un règlement

Route::delete('/clientsReglements/{reglementId}', [ReglementClientController::class, 'destroy'])->name('reglements.destroy');


// Route pour afficher les règlements d'un client spécifique
Route::get('/clients/{client}/reglements', [ReglementClientController::class, 'showByClient'])->name('clients.reglements');

// Routes pour les clients
Route::get('/clients', [ClientController::class, 'index'])->name('clients.index');
Route::get('/clients/{client}/addReglement', [ReglementClientController::class, 'createReglement'])->name('clients.addReglement');
Route::post('/clients/{client}/storeReglement', [ReglementClientController::class, 'storeReglement'])->name('clients.storeReglement');





Route::get('/vendeurs/{vendeurId}/reglements', [ReglementVendeurController::class, 'showByVendeur'])->name('vendeurs.reglements');


Route::get('/vendeurs/{vendeurId}/reglements/create', [ReglementVendeurController::class, 'create'])->name('vendeurs.reglements.create');

Route::post('/vendeurs/{vendeurId}/reglements', [ReglementVendeurController::class, 'storeReglement'])->name('vendeurs.reglements.store');
Route::get('/vendeurs/{vendeurId}/reglements/{reglementId}/edit', [ReglementVendeurController::class, 'edit'])->name('vendeurs.reglements.edit');

Route::put('/vendeurs/{vendeurId}/reglements/{reglementId}', [ReglementVendeurController::class, 'updateReglement'])->name('vendeurs.reglements.update');
// Route pour supprimer un règlement existant
Route::delete('/vendeursReglements/{reglementId}', [ReglementVendeurController::class, 'destroy'])->name('vendeurs.reglements.destroy');




Route::get('/users', [UserController::class, 'index'])->name('users.index'); // Afficher la liste des utilisateurs
Route::get('/users/create', [UserController::class, 'create'])->name('users.create'); // Afficher le formulaire de création d'un utilisateur
Route::post('/users', [UserController::class, 'store'])->name('users.store'); // Enregistrer un nouvel utilisateur
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit'); // Afficher le formulaire de modification d'un utilisateur
Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update'); // Mettre à jour les informations d'un utilisateur
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy'); // Supprimer un utilisateur
Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
Route::post('/profile/image', [UserController::class, 'updateProfileImage'])->name('profile.updateImage');
Route::post('/profile/password', [UserController::class, 'changePassword'])->name('profile.changePassword');

// Route to list all familles
Route::get('/familles', [FamilleController::class, 'index'])->name('familles.index');

// Route to show the form for creating a new famille
Route::get('/familles/create', [FamilleController::class, 'create'])->name('familles.create');

// Route to store a new famille
Route::post('/familles', [FamilleController::class, 'store'])->name('familles.store');

// Route to show a specific famille
Route::get('/familles/{famille}', [FamilleController::class, 'show'])->name('familles.show');

// Route to show the form for editing a famille
Route::get('/familles/{famille}/edit', [FamilleController::class, 'edit'])->name('familles.edit');

// Route to update a famille
Route::put('/familles/{famille}', [FamilleController::class, 'update'])->name('familles.update');

// Route to delete a famille
Route::delete('/familles/{famille}', [FamilleController::class, 'destroy'])->name('familles.destroy');

Route::get('/conditionnements', [ConditionnementController::class, 'index'])->name('conditionnements.index');
Route::get('/conditionnements/create', [ConditionnementController::class, 'create'])->name('conditionnements.create');
Route::post('/conditionnements', [ConditionnementController::class, 'store'])->name('conditionnements.store');
Route::get('/conditionnements/{conditionnement}', [ConditionnementController::class, 'show'])->name('conditionnements.show');
Route::get('/conditionnements/{conditionnement}/edit', [ConditionnementController::class, 'edit'])->name('conditionnements.edit');
Route::put('/conditionnements/{conditionnement}', [ConditionnementController::class, 'update'])->name('conditionnements.update');
Route::delete('/conditionnements/{conditionnement}', [ConditionnementController::class, 'destroy'])->name('conditionnements.destroy');

Route::get('/bonlivrasons', [BonLivrasonController::class, 'index'])->name('bonlivrasons.index');
Route::get('/bonlivrasons/create', [BonLivrasonController::class, 'create'])->name('bonlivrasons.create');
Route::post('/bonlivrasons', [BonLivrasonController::class, 'store'])->name('bonlivrasons.store');
Route::get('/bonlivrasons/{bon}', [BonLivrasonController::class, 'show'])->name('bonlivrasons.show');
Route::get('/bonlivrasons/{bon}/edit', [BonLivrasonController::class, 'edit'])->name('bonlivrasons.edit');
Route::put('/bonlivrasons/{bon}', [BonLivrasonController::class, 'update'])->name('bonlivrasons.update');
Route::delete('/bonlivrasons/{bon}', [BonLivrasonController::class, 'destroy'])->name('bonlivrasons.destroy');

Route::get('/bonsorts', [BonSortController::class, 'index'])->name('bonsorts.index');
Route::get('/bonsorts/create', [BonSortController::class, 'create'])->name('bonsorts.create');
Route::post('/bonsorts', [BonSortController::class, 'store'])->name('bonsorts.store');
Route::get('/bonsorts/{bonSort}', [BonSortController::class, 'show'])->name('bonsorts.show');
Route::get('/bonsorts/{bonSort}/edit', [BonSortController::class, 'edit'])->name('bonsorts.edit');
Route::put('/bonsorts/{bonSort}', [BonSortController::class, 'update'])->name('bonsorts.update');
Route::delete('/bonsorts/{bonSort}', [BonSortController::class, 'destroy'])->name('bonsorts.destroy');

Route::get('/bonentres', [BonEntreController::class, 'index'])->name('bonentres.index');
Route::get('/bonentres/create', [BonEntreController::class, 'create'])->name('bonentres.create');
Route::post('/bonentres', [BonEntreController::class, 'store'])->name('bonentres.store');
Route::get('/bonentres/{bonEntre}', [BonEntreController::class, 'show'])->name('bonentres.show');
Route::get('/bonentres/{bonEntre}/edit', [BonEntreController::class, 'edit'])->name('bonentres.edit');
Route::put('/bonentres/{bonEntre}', [BonEntreController::class, 'update'])->name('bonentres.update');
Route::delete('/bonentres/{bonEntre}', [BonEntreController::class, 'destroy'])->name('bonentres.destroy');

Route::get('/vendeurs', [VendeurController::class, 'index'])->name('vendeurs.index');
Route::get('/vendeurs/create', [VendeurController::class, 'create'])->name('vendeurs.create');
Route::post('/vendeurs', [VendeurController::class, 'store'])->name('vendeurs.store');
Route::get('/vendeurs/{vendeur}', [VendeurController::class, 'show'])->name('vendeurs.show');
Route::get('/vendeurs/{vendeur}/edit', [VendeurController::class, 'edit'])->name('vendeurs.edit');
Route::put('/vendeurs/{vendeur}', [VendeurController::class, 'update'])->name('vendeurs.update');
Route::delete('/vendeurs/{vendeur}', [VendeurController::class, 'destroy'])->name('vendeurs.destroy');

Route::get('/clients', [ClientController::class, 'index'])->name('clients.index');
Route::get('/clients/create', [ClientController::class, 'create'])->name('clients.create');
Route::post('/clients', [ClientController::class, 'store'])->name('clients.store');
Route::get('/clients/{client}/edit', [ClientController::class, 'edit'])->name('clients.edit');
Route::put('/clients/{client}', [ClientController::class, 'update'])->name('clients.update');
Route::delete('/clients/{client}', [ClientController::class, 'destroy'])->name('clients.destroy');
Route::get('/clients/{client}', [ClientController::class, 'show'])->name('clients.show');

Route::get('/modes', [ModeController::class, 'index'])->name('modes.index');
Route::get('/modes/create', [ModeController::class, 'create'])->name('modes.create');
Route::post('/modes', [ModeController::class, 'store'])->name('modes.store');
Route::get('/modes/{mode}/edit', [ModeController::class, 'edit'])->name('modes.edit');
Route::put('/modes/{mode}', [ModeController::class, 'update'])->name('modes.update');
Route::delete('/modes/{mode}', [ModeController::class, 'destroy'])->name('modes.destroy');
Route::get('/modes/{mode}', [ModeController::class, 'show'])->name('modes.show');

Route::get('/produits', [ProduitController::class, 'index'])->name('produits.index');
Route::get('/produits/create', [ProduitController::class, 'create'])->name('produits.create');
Route::post('/produits', [ProduitController::class, 'store'])->name('produits.store');
Route::get('/produits/{produit}/edit', [ProduitController::class, 'edit'])->name('produits.edit');
Route::put('/produits/{produit}', [ProduitController::class, 'update'])->name('produits.update');
Route::delete('/produits/{produit}', [ProduitController::class, 'destroy'])->name('produits.destroy');
Route::get('/produits/{produit}', [ProduitController::class, 'show'])->name('produits.show');


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/home', function () {
    return view('dashboard.index');
})->name('dashboard.index');;});

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
