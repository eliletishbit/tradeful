@extends('layouts.back')

@section('contentback')
<div class="container mt-5">
    <h2 class="mb-4">Ajouter un Abonnement/h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

</div>

@endsection
