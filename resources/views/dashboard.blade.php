@extends('layouts.back')

@section('contentback')
<div class="container mt-5">
    <h1 class="text-center mb-4">Tableau de Bord Utilisateur</h1>
    <div class="row">
        <!-- Carte Ressources -->
        <div class="col-md-3 mb-4">
            <div class="card text-white bg-success rounded shadow">
                <div class="card-body">
                    <h5 class="card-title">Mes Ressources</h5>
                    <p class="card-text">Accéder aux ressources disponibles.</p>
                    <a href="{{ route('ressources.index') }}" class="btn btn-light">Voir mes ressources</a>
                </div>
            </div>
        </div>

        <!-- Carte Signaux -->
        <div class="col-md-3 mb-4">
            <div class="card text-white bg-warning rounded shadow">
                <div class="card-body">
                    <h5 class="card-title">Mes Signaux</h5>
                    <p class="card-text">Gérer mes signaux et alertes.</p>
                    <a href="{{ route('signaux.index') }}" class="btn btn-light">Voir mes signaux</a>
                </div>
            </div>
        </div>

        <!-- Carte Notifications -->
        <div class="col-md-3 mb-4">
            <div class="card text-white bg-danger rounded shadow">
                <div class="card-body">
                    <h5 class="card-title">Mes Notifications</h5>
                    <p class="card-text">Consulter mes notifications récentes.</p>
                    <a href="{{ route('notifications.index') }}" class="btn btn-light">Voir mes notifications</a>
                </div>
            </div>
        </div>

        <!-- Carte Abonnements -->
        <div class="col-md-3 mb-4">
            <div class="card text-white bg-info rounded shadow">
                <div class="card-body">
                    <h5 class="card-title">Mes Abonnements</h5>
                    <p class="card-text">Gérer mes abonnements.</p>
                    <a href="{{ route('subscriptions.index') }}" class="btn btn-light">Voir mes abonnements</a>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
