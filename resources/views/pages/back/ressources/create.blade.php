@extends('layouts.back')

@section('contentback')
<div class="container mt-5">
    <h2>Ajouter une Ressource</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('ressources.store') }}" method="POST" enctype="multipart/form-data" class="bg-light p-4 rounded shadow-sm">
        @csrf
        
        <div class="form-group mb-3">
            <label for="title" class="form-label">Titre</label>
            <input type="text" class="form-control" id="title" name="title" required placeholder="Entrez le titre de la ressource">
        </div>

        <div class="form-group mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" required placeholder="Entrez la description de la ressource"></textarea>
        </div>

        <div class="form-group mb-3">
            <label for="link" class="form-label">Lien (URL)</label>
            <input type="url" class="form-control" id="link" name="link" required placeholder="Entrez le lien vers la ressource (Google Drive ou YouTube)">
        </div>

        <div class="form-group mb-3">
            <label for="type" class="form-label">Type de Ressource</label>
            <select class="form-select" id="type" name="type" required>
                <option value="">Sélectionnez le type de ressource</option>
                <option value="pdf">PDF</option>
                <option value="video">Vidéo</option>
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="is_paid" class="form-label">Type de Ressource</label>
            <select class="form-select" id="is_paid" name="is_paid">
                <option value="">Sélectionnez le type de ressource</option>
                <option value="0">Gratuit</option>
                <option value="1">Payant</option>
            </select>
        </div>
        
        
        <button type='submit' class='btn btn-primary'>
            <i class='fas fa-plus'></i> Ajouter la Ressource
        </button>

        <a href="{{ route('ressources.index') }}" class='btn btn-secondary'>
            <i class='fas fa-arrow-left'></i> Retour à la liste des ressources
        </a>
    </form>
</div>
@endsection
