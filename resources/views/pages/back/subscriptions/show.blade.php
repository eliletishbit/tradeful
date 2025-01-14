@extends('layouts.back')

@section('contentback')
<div class="container mt-5">
    <h2 class="text-center mb-4">{{ $mysubscription->name }}</h2>

    <div class="card mb-4 shadow-sm">
        <div class="card-body text-center">
            <p class="card-text"><strong>Détails de la Souscription :</strong></p>
            <h4 class="text-primary">{{ $mysubscription->taux }}</h4>
            <h4 class="text-secondary">{{ $mysubscription->duration }}</h4>
        </div>
    </div>

    <div class="d-flex justify-content-center mt-4">
        <a href="{{ route('subscriptions.index') }}" class="btn btn-secondary me-3">
            <i class="fas fa-arrow-left"></i> Retour
        </a>
        <a href="{{ route('subscriptions.edit', $mysubscription->id) }}" class="btn btn-warning">
            <i class="fas fa-edit"></i> Modifier ma souscription
        </a>
    </div>
</div>
@endsection
