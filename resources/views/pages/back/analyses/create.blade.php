@extends('layouts.back')

@section('contentback')
<div class="container mt-5">
    <h2 class="mb-4">Ajouter une Analyse</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('analyses.store') }}" method="POST" enctype="multipart/form-data" class="bg-light p-4 rounded shadow-sm">
        @csrf
        <div class="form-group mb-3">
            <label for="title" class="form-label">Titre</label>
            <input type="text" class="form-control" id="title" name="title" required placeholder="Entrez le titre de l'analyse">
        </div>

        <div class="form-group mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="4" required placeholder="Entrez la description de l'analyse"></textarea>
        </div>

        <div class="form-group mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" class="form-control-file" id="image" name="image" accept=".jpg,.jpeg,.png,.gif" required>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Ajouter l'Analyse</button>
    </form>

    <a href="{{ route('analyses.index') }}" class="btn btn-secondary mt-3">Retour à la liste des analyses</a>
</div>

@endsection
