@extends('layouts.back')

@section('contentback')
<div class="container mt-5">
    <h2>Détails de la Ressource : {{ $ressource->title }}</h2>

    <p><strong>Description :</strong> {{ $ressource->description }}</p>

    <!-- Affichez ici le contenu de la ressource (ODF ou vidéo) -->
    <!-- Par exemple, si c'est un fichier PDF ou une vidéo, vous pouvez l'afficher ici -->
    
    <!-- Lien vers le fichier ou la vidéo -->
    
    <!-- Retour à la liste des ressources -->
    <a href="{{ route('ressources.index') }}" class='btn btn-secondary mt-3'>Retour à la liste des ressources</a>

    <!-- Lien vers la page d'édition -->
    <a href="{{ route('ressources.edit', $ressource->id) }}" class='btn btn-warning mt-3'>Modifier la Ressource</a>

    <!-- Formulaire de suppression -->
    <form action="{{ route('ressources.destroy', $ressource->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type='submit' class='btn btn-danger mt-3' onclick='return confirm("Êtes-vous sûr de vouloir supprimer cette ressource ?");'>Supprimer la Ressource</button>
    </form>
</div>
@endsection
