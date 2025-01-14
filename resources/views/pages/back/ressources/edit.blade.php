@extends('layouts.back')

@section('contentback')
<div class="container mt-5">
    <h2>Modifier la Ressource : {{ $ressource->title }}</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('ressources.update', $ressource->id) }}" method="POST" enctype="multipart/form-data" class="bg-light p-4 rounded shadow-sm">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label for="title" class="form-label">Titre</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $ressource->title) }}" required placeholder="Entrez le titre de la ressource">
        </div>

        <div class="form-group mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" required placeholder="Entrez la description de la ressource">{{ old('description', $ressource->description) }}</textarea>
        </div>

        <div class="form-group mb-3">
            <label for="link" class="form-label">Lien d'accès</label>
            <input type="url" class="form-control" id="link" name="link" required placeholder="Entrez le lien vers la ressource (Google Drive ou YouTube)">
        </div>

        <!-- Ajoutez ici des champs pour le téléchargement de fichiers si nécessaire -->

        <button type='submit' class='btn btn-primary'>Mettre à jour la Ressource</button>

        <a href="{{ route('ressources.index') }}" class='btn btn-secondary'>Retour à la liste des ressources</a>
    </form>
</div>
@endsection
