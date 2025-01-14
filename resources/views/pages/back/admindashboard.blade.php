@extends('layouts.back')

@section('contentback')
<div class="container mt-5">
    <h1 class="text-center mb-4">Tableau de Bord Administrateur</h1>
    <div class="row">
        <!-- Carte Utilisateurs -->
        <div class="col-md-3 mb-4">
            <div class="card text-white bg-primary rounded shadow">
                <div class="card-body">
                    <h5 class="card-title">Utilisateurs</h5>
                    <p class="card-text">Gérer les utilisateurs et voir la liste complète.</p>
                    <a href="{{ route('users.index') }}" class="btn btn-light">Voir les utilisateurs</a>
                </div>
            </div>
        </div>

        <!-- Carte Ressources -->
        <div class="col-md-3 mb-4">
            <div class="card text-white bg-success rounded shadow">
                <div class="card-body">
                    <h5 class="card-title">Ressources</h5>
                    <p class="card-text">Accéder aux ressources disponibles.</p>
                    <a href="{{ route('ressources.index') }}" class="btn btn-light">Voir les ressources</a>
                </div>
            </div>
        </div>

        <!-- Carte Signaux -->
        <div class="col-md-3 mb-4">
            <div class="card text-white bg-warning rounded shadow">
                <div class="card-body">
                    <h5 class="card-title">Signaux</h5>
                    <p class="card-text">Gérer les signaux et alertes.</p>
                    <a href="" class="btn btn-light">Voir les signaux</a>
                </div>
            </div>
        </div>

        <!-- Carte Notifications -->
        <div class="col-md-3 mb-4">
            <div class="card text-white bg-danger rounded shadow">
                <div class="card-body">
                    <h5 class="card-title">Notifications</h5>
                    <p class="card-text">Consulter les notifications récentes.</p>
                    <a href="{{ route('notifications.index') }}" class="btn btn-light">Voir les notifications</a>
                </div>
            </div>
        </div>

        <!-- Carte Abonnements -->
        <div class="col-md-3 mb-4">
            <div class="card text-white bg-info rounded shadow">
                <div class="card-body">
                    <h5 class="card-title">Abonnements</h5>
                    <p class="card-text">Gérer les abonnements des utilisateurs.</p>
                    <a href="{{ route('subscriptions.index') }}" class="btn btn-light">Voir les abonnements</a>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
