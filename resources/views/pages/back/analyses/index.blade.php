@extends('layouts.back')

@section('contentback')
<div class="container">
    <h2 class="mb-4">Analyses de Trade</h2>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('analyses.create') }}" class="btn btn-primary mb-3">Ajouter une Analyse</a>

    <div class="row">
        @foreach($analyses as $analyse)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <img src="{{ asset('storage/' . $analyse->image) }}" class="card-img-top" alt="{{ $analyse->title }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $analyse->title }}</h5>
                        <p class="card-text">{{ Str::limit($analyse->description, 100) }}</p>
                        <a href="{{ route('analyses.show', $analyse->id) }}" class="btn btn-primary">Voir Détails</a>
                        <a href="{{ route('analyses.edit', $analyse->id) }}" class="btn btn-warning">Modifier</a>
                        <form action="{{ route('analyses.destroy', $analyse->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette analyse ?')">Supprimer</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection