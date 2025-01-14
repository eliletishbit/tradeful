@extends('layouts.back')

@section('contentback')
<div class="container mt-5">
    
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(Auth::user()->subscription_id == 1)
        <h2 class="mb-4 text-center">Tous les Abonnements</h2>

        <div class="row">
            @foreach($subscriptions as $sub)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Nom : {{ $sub->name }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">ID : {{ $sub->id }}</h6>
                            <p class="card-text"><strong>Durée :</strong> {{ $sub->duration }}</p>
                            <p class="card-text"><strong>Taux :</strong> {{ $sub->taux }}</p>
                            
                            <div class="d-flex justify-content-between mt-3">
                                <a href="{{ route('subscriptions.show', $sub->id) }}" class="btn btn-primary">
                                    <i class="fas fa-eye"></i> Voir Détails
                                </a>
                                <a href="{{ route('subscriptions.edit', $sub->id) }}" class="btn btn-warning">
                                    <i class="fas fa-edit"></i> Modifier
                                </a>
                                <form action="{{ route('subscriptions.destroy', $sub->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet abonnement ?')">
                                        <i class="fas fa-trash-alt"></i> Supprimer
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    @elseif(Auth::user()->subscription_id == 2 || Auth::user()->subscription_id == 3 || Auth::user()->subscription_id == 4)

        @foreach($subscriptions as $sub)
            @if($sub->id == Auth::user()->subscription_id)
                <div class="subscription container mb-4">
                    <h2 style="font-family: Geneva, sans-serif; font-weight: bold; font-size: 30px;">Abonnement Actuel</h2>
                    <div class="d-flex justify-content-center">
                        <a href="{{ route('subscriptions.show', $sub->id) }}" class="btn btn-primary btn-md">
                            <i class="fas fa-eye"></i> Voir Détails
                        </a>        
                    </div>
                </div>
            @endif
        @endforeach

    @endif
</div>
@endsection
