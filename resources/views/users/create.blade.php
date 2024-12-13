@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Ajouter un utilisateur</div>

                    <div class="card-body">
                    <!-- Display general validation errors (if any) -->
                    @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif



                        <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <!-- Nom -->
                            <div class="form-group">
                                <label for="name">Nom</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" >
                            </div>

                            <!-- Téléphone -->
                            <div class="form-group">
                                <label for="telephone">Téléphone</label>
                                <input type="text" class="form-control" id="telephone" name="telephone" value="{{ old('telephone') }}" >
                            </div>

                            <!-- Email -->
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" >
                            </div>

                            <!-- Mot de passe -->
                            <div class="form-group">
                                <label for="password">Mot de passe</label>
                                <input type="password" class="form-control" id="password" name="password" >
                            </div>

                            <!-- Confirmation du mot de passe -->
                            <div class="form-group">
                                <label for="password_confirmation">Confirmer le mot de passe</label>
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" >
                            </div>

                            <!-- Image Upload -->
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" class="form-control-file" id="image" name="image" >
                                <!-- Preview Image -->
                                <img id="imagePreview" src="" alt="Image Preview" style="max-width: 150px; margin-top: 10px; display: none;">
                            </div>

                            <button type="submit" class="btn btn-primary">Ajouter</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript for Image Preview -->
    <script>
        document.getElementById('image').addEventListener('change', function (e) {
            const file = e.target.files[0];
            const reader = new FileReader();
            
            reader.onload = function (event) {
                const imagePreview = document.getElementById('imagePreview');
                imagePreview.src = event.target.result;
                imagePreview.style.display = 'block';
            };
            
            if (file) {
                reader.readAsDataURL(file);
            }
        });
    </script>
@endsection
