@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        <h1>Modifier l'Utilisateur</h1>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <!-- Nom de l'utilisateur -->
                            <div class="form-group">
                                <label for="name">Nom</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}" >
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Téléphone de l'utilisateur -->
                            <div class="form-group">
                                <label for="telephone">Téléphone</label>
                                <input type="text" class="form-control" id="telephone" name="telephone" value="{{ old('telephone', $user->telephone) }}" >
                                @error('telephone')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Email de l'utilisateur -->
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}" >
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Mot de passe de l'utilisateur -->
                            <!-- <div class="form-group">
                                <label for="password">Mot de passe</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Laissez vide si vous ne souhaitez pas changer le mot de passe">
                                @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div> -->

                            <!-- Confirmation du mot de passe -->
                            <!-- <div class="form-group">
                                <label for="password_confirmation">Confirmer le mot de passe</label>
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirmez le mot de passe">
                                @error('password_confirmation')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div> -->

                            <!-- Image actuelle -->
                            <div class="form-group">
                                <label for="current_image">Image actuelle</label><br>
                                @if($user->image)
                                    <img src="{{ asset('storage/' . $user->image) }}" alt="Image actuelle" style="width: 150px; height: auto;">
                                @else
                                    <p>Aucune image actuelle</p>
                                @endif
                            </div>

                            <!-- Choisir une nouvelle image -->
                            <div class="form-group">
                                <label for="image">Nouvelle image (optionnelle)</label>
                                <input type="file" class="form-control-file" id="image" name="image">
                                <!-- @error('image')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror -->
                            </div>

                            <!-- Bouton de soumission -->
                            <button type="submit" class="btn btn-primary">Modifier</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
