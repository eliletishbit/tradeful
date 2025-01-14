@extends('layouts.back')

@section('contentback')
<div class="container mt-5">
    <h2 class="text-center mb-4">Ressources Disponibles</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Section des PDFs -->
    <div class="row mb-4">
        <div class="col">
            <h3 class="text-primary text-center mb-4">PDFs Disponibles</h3>
            @foreach($pdfResources as $resource)
                <div class="card mb-3 shadow-sm">
                    <div class="card-body d-flex align-items-center">
                        <i class="fas fa-file-pdf fa-2x text-danger me-3"></i>
                        <div class="flex-grow-1">
                            <h5 class="card-title">{{ $resource->title }}</h5>
                            <p class="card-text">{{ Str::limit($resource->description, 100) }}</p>
                            <p class="card-text"><strong>Type:</strong> {{ $resource->is_paid ? 'Payant' : 'Gratuit' }}</p>
                        </div>
                        <a href="{{ $resource->link }}" target="_blank" class="btn btn-info">
                            <i class="fas fa-eye"></i> Voir PDF
                        </a>
                        @if($isAdmin)
                            <div class="ms-2">
                                <a href="{{ route('ressources.edit', $resource->id) }}" class="btn btn-warning">
                                    <i class="fas fa-edit"></i> Modifier
                                </a>
                                <form action="{{ route('ressources.destroy', $resource->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette ressource ?')">
                                        <i class="fas fa-trash-alt"></i> Supprimer
                                    </button>
                                </form>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Section des Vidéos -->
    @if($isAdmin || $userSubscriptionId == 4)
        <div class="row mb-4">
            <div class="col">
                <h3 class="text-success text-center mb-4">Vidéos Disponibles</h3>
                <div class="row">
                    @foreach($videoResources as $resource)
                        <div class="col-md-6 mb-4"> <!-- Deux vidéos par ligne -->
                            <div class="card shadow-sm h-100">
                                <div class="card-body d-flex flex-column align-items-center">
                                    <h5 class="card-title text-center">{{ $resource->title }}</h5>
                                    <p class="card-text text-center">{{ Str::limit($resource->description, 100) }}</p>
                                    
                                    <!-- Intégration de la vidéo avec taille augmentée -->
                                    <div style="width: 100%; height: 300px; overflow: hidden;">
                                        <iframe width="100%" height="100%" src="{{ $resource->link }}" allowfullscreen></iframe>
                                    </div>

                                    @if($isAdmin)
                                        <div class="mt-auto d-flex justify-content-around w-100">
                                            <a href="{{ route('ressources.edit', $resource->id) }}" class="btn btn-warning btn-sm">
                                                <i class="fas fa-edit"></i> Modifier
                                            </a>
                                            <form action="{{ route('ressources.destroy', $resource->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette ressource ?')">
                                                    <i class="fas fa-trash-alt"></i> Supprimer
                                                </button>
                                            </form>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div> <!-- Fin de la colonne -->
                    @endforeach
                </div> <!-- Fin de la ligne -->
            </div>
        </div>
    @endif

    <!-- Bouton Ajouter une Ressource -->
    @if($isAdmin)
        <a href="{{ route('ressources.create') }}" class='btn btn-success mt-3'>
            <i class='fas fa-plus'></i> Ajouter une Ressource
        </a>
    @endif
</div>
@endsection
