@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Modifier le mode') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('modes.update', $mode->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="mode">{{ __('Mode') }}</label>
                            <input id="mode" type="text" class="form-control @error('mode') is-invalid @enderror" value="{{ old('mode', $mode->mode) }}" name="mode"   autofocus>

                            @error('mode')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-0">
                            <button type="submit" class="btn btn-primary">{{ __('Modifier') }}</button>
                            <a href="{{ route('modes.index') }}" class="btn btn-secondary">{{ __('Annuler') }}</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
