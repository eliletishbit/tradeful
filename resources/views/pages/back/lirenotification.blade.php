@extends('layouts.back')

@section('contentback')
<div class="container mt-4">
    <h1 class="mb-4">Notification</h1>

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">{{ $notification->title }}</h5>
            <span class="badge {{ $notification->is_read ? 'bg-success' : 'bg-warning' }}">
                {{ $notification->is_read ? 'Lue' : 'Non lue' }}
            </span>
        </div>
        <div class="card-body">
            <p>{{ $notification->message }}</p>
            <p><strong>Date :</strong> {{ $notification->created_at }}</p>
            <div class="d-flex justify-content-between mt-3">
                <form action="{{ route('notifications.markAsRead', $notification->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-check"></i> Marquer comme lu
                    </button>
                </form>
                <form action="{{ route('notifications.destroy', $notification->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        <i class="fa fa-trash"></i> Supprimer
                    </button>
                </form>
            </div>
        </div>
    </div>

    <a href="{{ route('notifications.index') }}" class="btn btn-secondary mt-3">
        <i class="fa fa-arrow-left"></i> Retour aux notifications
    </a>
</div>
@endsection
