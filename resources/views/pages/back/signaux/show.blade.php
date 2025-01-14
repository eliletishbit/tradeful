@extends('layouts.back')

@section('contentback')
    <div class="container mt-5">
        <h2><i class="fas fa-eye"></i> Détails du Signal</h2>

        <div class="card shadow-sm">
            <div class="card-header">
                <i class="fas fa-info-circle"></i> Signal #{{ $signal->id }}
            </div>
            <div class="card-body">
                <p><strong>Titre:</strong> {{ $signal->title }}</p>
                <p><strong>Prix d'Entrée:</strong> {{ $signal->entry_price }}</p>
                <p><strong>Stop Loss:</strong> {{ $signal->stop_loss }}</p>
                <p><strong>SL:</strong> {{ $signal->sl ?? 'Non défini' }}</p>
                <p><strong>BE:</strong> {{ $signal->be ?? 'Non défini' }}</p>

                <a href="{{ route('signaux.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Retour à la liste
                </a>
            </div>
        </div>
    </div>
@endsection
