@extends('layouts.back')

@section('contentback')
<div class="container mt-5">
    <h1>Mes Ressources</h1>

    @if ($resources->isEmpty())
        <div class="alert alert-info">Aucune ressource disponible.</div>
    @else
        <div class="row">
            <!-- Section Textes -->
            <div class="col-md-12 mb-4">
                <h2>Textes (PDF)</h2>
                <ul class="list-group">
                    @foreach ($resources as $resource)
                        @if ($resource->type === 'text' && ($subscriptionId === 2 || $subscriptionId >= 3))
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ $resource->title }}
                                <a href="{{ $resource->link }}" class="btn btn-primary" target="_blank">Voir PDF</a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>

            <!-- Section Vidéos -->
            @if ($subscriptionId >= 3)
            <div class="col-md-12 mb-4">
                <h2>Vidéos</h2>
                <ul class="list-group">
                    @foreach ($resources as $resource)
                        @if ($resource->type === 'video')
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ $resource->title }}
                                <a href="{{ $resource->link }}" class="btn btn-primary" target="_blank">Voir Vidéo</a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
            @endif

            <!-- Section Signaux -->
            <div class="col-md-12 mb-4">
                <h2>Signaux</h2>
                <ul class="list-group">
                    @foreach ($resources as $resource)
                        @if ($resource->type === 'signal' && ($subscriptionId === 2 || $subscriptionId >= 3))
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ $resource->title }}
                                <a href="{{ $resource->link }}" class="btn btn-primary" target="_blank">Voir Signal</a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
    @endif
</div>
@endsection
