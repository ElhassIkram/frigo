@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Liste des modes') }}</div>

                <div class="card-body">
                    <div class="mb-3">
                        <a href="{{ route('modes.create') }}" class="btn btn-primary">{{ __('Ajouter un mode') }}</a>
                    </div>

                    <table class="table">
                        <thead>
                            <tr>
                                
                                <th>Mode</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($modes as $mode)
                                <tr>
                                    
                                    <td>{{ $mode->mode }}</td>
                                    <td>
                                        <!-- Edit Button with Icon -->
                                        <a href="{{ route('modes.edit', $mode->id) }}" class="btn btn-sm btn-success" title="Modifier">
                                            <i class="fa fa-edit"></i> 
                                        </a>
                                        <!-- View Button with Icon -->
                                        <!-- <a href="{{ route('modes.show', $mode->id) }}" class="btn btn-sm btn-info" title="Voir">
                                            <i class="fa fa-eye"></i>
                                        </a> -->
                                        <!-- Delete Button with Icon -->
                                        <form action="{{ route('modes.destroy', $mode->id) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce mode?')" title="Supprimer">
                                                <i class="fa fa-trash"></i> 
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
