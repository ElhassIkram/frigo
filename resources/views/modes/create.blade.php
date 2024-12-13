@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Ajouter un mode') }}</div>

                <div class="card-body">
                @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="POST" action="{{ route('modes.store') }}">
                        @csrf

                        <div class="form-group">
                            <label for="mode">{{ __('Mode') }}</label>
                            <input id="mode" type="text" class="form-control @error('mode') is-invalid @enderror" name="mode" value="{{ old('mode') }}"  autofocus>

                            
                        </div>

                        <div class="form-group mb-0">
                            <button type="submit" class="btn btn-primary">{{ __('Ajouter') }}</button>
                            <a href="{{ route('modes.index') }}" class="btn btn-secondary">{{ __('Annuler') }}</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
