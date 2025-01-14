@extends('layouts.back')

@section('contentback')
<div class="container mt-5">
    <h2>Ajouter un Utilisateur</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data" class="bg-light p-4 rounded shadow-sm">
        @csrf
        
        <div class="form-group mb-3">
            <label for="name" class="form-label">Nom</label>
            <input type="text" class="form-control" id="name" name="name" required placeholder="Entrez le nom de l'utilisateur">
        </div>

        <div class="form-group mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required placeholder="Entrez l'email de l'utilisateur">
        </div>

        <div class="form-group mb-3">
            <label for="phone" class="form-label">Téléphone</label>
            <input type="text" class="form-control" id="phone" name="phone" required placeholder="Entrez le numéro de téléphone">
        </div>

        <div class="form-group mb-3">
            <label for="subscription_id" class="form-label">ID d'Abonnement</label>
            <input type="number" class="form-control" id="subscription_id" name="subscription_id" required placeholder="Entrez l'ID d'abonnement">
        </div>

        <div class="form-group mb-3">
            <label for="password" class="form-label">Mot de Passe</label>
            <input type="password" class="form-control" id="password" name="password" required placeholder="Entrez le mot de passe">
        </div>

        <div class="form-group mb-3">
            <label for="photo" class="form-label">Photo</label>
            <input type="file" class="form-control-file" id="photo" name="photo" accept=".jpg,.jpeg,.png,.gif">
        </div>

        <button type="submit" class="btn btn-primary mt-3">Ajouter l'Utilisateur</button>

        <a href="{{ route('users.index') }}" class="btn btn-secondary mt-3">Retour à la liste des utilisateurs</a>
    </form>
</div>
@endsection
