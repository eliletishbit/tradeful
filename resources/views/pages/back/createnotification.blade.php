@extends('layouts.back')

@section('contentback')
<div class="container mt-5">
    <!-- Titre principal -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-primary">
            <i class="fa fa-bell"></i> Ajouter une Notification
        </h2>
        <a href="{{ route('notifications.index') }}" class="btn btn-secondary">
            <i class="fa fa-arrow-left"></i> Retour à la liste des notifications
        </a>
    </div>

    <!-- Affichage des erreurs -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <h5><i class="fa fa-exclamation-circle"></i> Erreurs :</h5>
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Formulaire -->
    <div class="card shadow-sm border-0">
        <div class="card-body">
            <form action="{{ route('notifications.store') }}" method="POST" class="container mt-5 p-4 bg-light rounded shadow">
                @csrf
                <!-- Titre du formulaire -->
                <h4 class="mb-4 text-primary">
                    <i class="fas fa-bell me-2"></i> Envoyer une Notification
                </h4>
            
                <!-- Sélection de l'utilisateur -->
                <div class="mb-3">
                    <label for="user_id" class="form-label">
                        <i class="fas fa-user"></i> Sélectionner l'utilisateur :
                    </label>
                    <select name="user_id" id="user_id" class="form-select" required>
                        <option value="" disabled selected>Choisir un utilisateur...</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
            
                <!-- Titre -->
                <div class="mb-3">
                    <label for="title" class="form-label">
                        <i class="fas fa-heading"></i> Titre :
                    </label>
                    <input
                        type="text"
                        name="title"
                        id="title"
                        class="form-control"
                        placeholder="Saisir le titre de la notification"
                        required
                    />
                </div>
            
                <!-- Message -->
                <div class="mb-3">
                    <label for="message" class="form-label">
                        <i class="fas fa-comment-alt"></i> Message :
                    </label>
                    <textarea
                        name="message"
                        id="message"
                        class="form-control"
                        rows="5"
                        placeholder="Saisir votre message ici"
                        required
                    ></textarea>
                </div>
            
                <!-- Bouton d'envoi -->
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-lg">
                        <i class="fas fa-paper-plane"></i> Envoyer la Notification
                    </button>
                </div>
            </form>
            
        </div>
    </div>
</div>
@endsection
