@extends('layouts.back')

@section('contentback')
<div class="container mt-5">
    <h2 class="mb-4 text-center">Modifier mon Abonnement : {{ $mysubscription->name }}</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('supportclient.index', $mysubscription->id) }}" method="POST" enctype="multipart/form-data" class="bg-light p-4 rounded shadow-sm border border-primary">
        @csrf

        <div class="mb-3">
            <label for="taux" class="form-label">Taux de l'Abonnement</label>
            <input type="text" class="form-control" id="taux" name="taux" value="{{ old('taux', $mysubscription->taux) }}" required placeholder="Entrez le nouveau taux">
        </div>

        <div class="mb-3">
            <label for="duration" class="form-label">Durée de l'Abonnement</label>
            <input type="text" class="form-control" id="duration" name="duration" value="{{ old('duration', $mysubscription->duration) }}" required placeholder="Entrez la nouvelle durée">
        </div>

        <button type="submit" class="btn btn-primary btn-lg mt-3 w-100">
            <i class="fas fa-paper-plane"></i> Contacter le Support
        </button>
    </form>

    <a href="{{ route('subscriptions.index') }}" class="btn btn-secondary mt-3">
        <i class="fas fa-arrow-left"></i> Retour
    </a>
</div>
@endsection
