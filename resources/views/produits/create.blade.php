@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Créer un nouveau produit') }}</div>

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
                    <form method="POST" action="{{ route('produits.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="designation">{{ __('Désignation') }}</label>
                            <input id="designation" type="text" class="form-control @error('designation') is-invalid @enderror" name="designation" value="{{ old('designation') }}"  autofocus>

                            @error('designation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="image">{{ __('Image') }}</label>
                            <input id="image" type="file" class="form-control-file @error('image') is-invalid @enderror" name="image" >

                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="famille_id">{{ __('Famille') }}</label>
                            <select id="famille_id" class="form-control @error('famille_id') is-invalid @enderror" name="famille_id" >
                                <option value="" selected disabled>{{ __('Sélectionner une famille') }}</option>
                                @foreach($familles as $famille)
                                    <option value="{{ $famille->id }}">{{ $famille->famille }}</option>
                                @endforeach
                            </select>

                            @error('famille_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-0">
                            <button type="submit" class="btn btn-primary">{{ __('Créer') }}</button>
                            <a href="{{ route('produits.index') }}" class="btn btn-secondary">Retour </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
