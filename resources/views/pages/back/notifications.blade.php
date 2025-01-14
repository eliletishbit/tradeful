@extends('layouts.back')

@section('contentback')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="mb-0">📨 Mes Notifications</h1>
        
        @if(Auth::user()->subscription_id == 1 && Auth::user()->is_admin == 1)
            <a href="{{ route('notifications.create') }}" class="btn btn-primary">
                <i class="fa fa-plus"></i> Ajouter une Notification
            </a>
        @endif

    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if(!$notifications->isEmpty())
        <div class="list-group shadow-sm rounded">
            @foreach($notifications as $notification)
                <div class="list-group-item d-flex justify-content-between align-items-center {{ $notification->is_read ? 'bg-light' : 'bg-white' }} border-0 p-3">
                    <div class="d-flex align-items-start">
                        <div class="me-3">
                            <i class="fa {{ $notification->is_read ? 'fa-envelope-open text-secondary' : 'fa-envelope text-primary' }} fs-4"></i>
                        </div>
                        <div>
                            <a href="{{ route('notifications.lirenotification', $notification->id) }}" 
                               class="text-decoration-none {{ $notification->is_read ? 'text-muted' : 'text-dark fw-bold' }}">
                                {{ $notification->title ?? 'Notification' }}
                            </a>
                            <p class="mb-0 text-muted small">{{ $notification->message }}</p>
                            <small class="d-block text-muted">
                                {{ $notification->created_at ? $notification->created_at->diffForHumans() : 'Date inconnue' }}
                            </small>
                        </div>
                    </div>
                    <div>
                        <form action="{{ route('notifications.markAsRead', $notification->id) }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" class="btn btn-outline-success btn-sm" title="Marquer comme lu">
                                <i class="fa fa-check-circle"></i> Lire
                            </button>
                        </form>
                        <form action="{{ route('notifications.destroy', $notification->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger btn-sm" title="Supprimer">
                                <i class="fa fa-trash"></i> Supprimer
                            </button>
                        </form>
                    </div>
                </div>
                @if(!$loop->last)
                    <hr class="my-1">
                @endif
            @endforeach
        </div>
    @else
        <div class="alert alert-info text-center mt-4">
            <i class="fa fa-info-circle"></i> Aucune notification à afficher pour le moment.
        </div>
    @endif
</div>

<!-- Modal d'ajout de notification -->
<div class="modal fade" id="addNotificationModal" tabindex="-1" aria-labelledby="addNotificationModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addNotificationModalLabel">Ajouter une Notification</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="addNotificationForm">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="title" class="form-label">Titre</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Titre de la notification" required>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Message</label>
                        <textarea class="form-control" id="message" name="message" rows="3" placeholder="Message de la notification" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-primary">Créer la Notification</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection