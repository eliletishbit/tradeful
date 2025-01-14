@extends('layouts.back')

@section('contentback')
<div class="container">
    <div class="row">
        <div class="col-md-9">
            <h2 class="mb-4">Analyses de Trade</h2>
            <div class="row">
                @foreach($analyses as $analyse)
                    <div class="col-md-4 mb-4">
                        <div class="card shadow-sm">
                            <img src="{{ asset('storage/' . $analyse->image) }}" class="card-img-top" alt="{{ $analyse->title }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $analyse->title }}</h5>
                                <p class="card-text">{{ Str::limit($analyse->description, 100) }}</p>
                                <a href="{{ route('analyses.show', $analyse->id) }}" class="btn btn-primary">Lire plus</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        @if(Auth::user()->subscription_id == 1) <!-- Afficher seulement pour l'admin -->
        <div class="col-md-3">
            <div class="sticky-top" style="top: 20px;">
                <h4>Ajouter une Analyse</h4>
                <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#addAnalysisModal">
                    <i class="fas fa-plus-circle"></i> Ajouter
                </button>
            </div>
        </div>
        @elseif(Auth::user()->subscription_id == 2 || Auth::user()->subscription_id == 3 || Auth::user()->subscription_id == 4  )
            <div class="analysesliste p-4">
                @foreach($analyses as $analyse)
                    <h1>Titre de l'analyse</h1>
                    <img src="{{asset('images/trade1.jpg')}}" alt="">
                    <p>
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nobis, laudantium?
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat, sit.
                    </p>
                @endforeach
            </div> 
        @endif
    </div>
</div>

<!-- Modal pour ajouter une analyse -->
<div class="modal fade" id="addAnalysisModal" tabindex="-1" role="dialog" aria-labelledby="addAnalysisModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addAnalysisModalLabel">Ajouter une Analyse</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('analyses.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="title">Titre</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" class="form-control-file" id="image" name="image" accept=".jpg,.jpeg,.png,.gif" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-primary">Ajouter l'Analyse</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('styles')
<style>
    .card {
        transition: transform 0.2s; /* Animation au survol */
    }
    .card:hover {
        transform: scale(1.05); /* Agrandir légèrement la carte au survol */
    }
</style>
@endsection
