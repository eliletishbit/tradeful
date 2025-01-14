@extends('layouts.back')

@section('contentback')
<div class="container mt-5">
    <h2 class="mb-4 text-center">Détails de l'Utilisateur : {{ $user->name }}</h2>

    <div class="card mb-4">
        <div class="card-body text-center">
            @if($user->photo)
                <img src="{{ asset('storage/' . $user->photo) }}" alt="{{ $user->name }}" class="rounded-circle" style="max-width: 150px; height: auto;">
            @else
                <div class="alert alert-warning">Aucune photo disponible pour cet utilisateur.</div>
            @endif

            <h5 class="card-title mt-3">{{ $user->name }}</h5>
            <p class="card-text"><strong>Email:</strong> {{ $user->email }}</p>
            <p class="card-text"><strong>Téléphone:</strong> {{ $user->phone }}</p>
            <p class="card-text"><strong>ID d'Abonnement:</strong> {{ $user->subscription_id }}</p>

            <div class="mt-4">
                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">Modifier l'Utilisateur</a>
                
                <!-- Formulaire de suppression -->
                <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class='btn btn-danger' onclick='return confirm("Êtes-vous sûr de vouloir supprimer cet utilisateur ?");'>Supprimer l'Utilisateur</button>
                </form>
                
                <a href="{{ route('users.index') }}" class="btn btn-secondary">Retour à la liste des utilisateurs</a>
            </div>
        </div>
    </div>
</div>
@endsection
