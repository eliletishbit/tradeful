@extends('layouts.back')

@section('contentback')
<div class="container mt-5">
    <h2 class="mb-4 text-center">Modifier l'Analyse : {{ $analyse->title }}</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('analyses.update', $analyse->id) }}" method="POST" enctype="multipart/form-data" class="bg-light p-4 rounded shadow-sm border border-primary">
        @csrf
        @method('PUT')
        
        <div class="form-group mb-3">
            <label for="title" class="form-label">Titre</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $analyse->title) }}" required placeholder="Entrez le titre de l'analyse">
        </div>

        <div class="form-group mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="6" required placeholder="Entrez la description de l'analyse">{{ old('description', $analyse->description) }}</textarea>
        </div>

        <div class="form-group mb-3">
            <label for="image" class="form-label">Image (laisser vide si pas de changement)</label>
            <input type="file" class="form-control-file" id="image" name="image" accept=".jpg,.jpeg,.png,.gif">
            @if($analyse->image)
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $analyse->image) }}" alt="{{ $analyse->title }}" style="max-width: 100%; height: auto;" class="border rounded">
                </div>
            @endif
        </div>

        <button type="submit" class="btn btn-primary btn-lg mt-3 w-100">Mettre à jour l'Analyse</button>
    </form>

    <a href="{{ route('analyses.index') }}" class="btn btn-secondary mt-3">Retour à la liste des analyses</a>
</div>
@endsection
