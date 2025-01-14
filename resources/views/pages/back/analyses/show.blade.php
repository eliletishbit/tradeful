@extends('layouts.back')

@section('contentback')
<div class="container">
    <h2>{{ $analyse->title }}</h2>

    <img src="{{ asset('storage/' . $analyse->image) }}" alt="{{ $analyse->title }}" style="max-width: 100%;">

    <p><strong>Description:</strong></p>
    <p>{{ $analyse->description }}</p>

    <!-- Retour à la liste des analyses -->
    <a href="{{ route('analyses.index') }}" class="btn btn-secondary mt-3">Retour à la liste des analyses</a>
</div>
@endsection
