@extends('layouts.back')

@section('contentback')
    <div class="container mt-5">
        <h2><i class="fas fa-edit"></i> Modifier le Signal</h2>

        <form action="{{ route('signaux.update', $signal->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="card shadow-sm">
                <div class="card-header">
                    <i class="fas fa-edit"></i> Formulaire de Modification
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="title" class="form-label"><i class="fas fa-heading"></i> Titre</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ $signal->title }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="entry_price" class="form-label"><i class="fas fa-dollar-sign"></i> Prix d'Entrée</label>
                        <input type="number" class="form-control" id="entry_price" name="entry_price" value="{{ $signal->entry_price }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="stop_loss" class="form-label"><i class="fas fa-chart-line"></i> Stop Loss</label>
                        <input type="number" class="form-control" id="stop_loss" name="stop_loss" value="{{ $signal->stop_loss }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="sl" class="form-label"><i class="fas fa-arrow-alt-circle-down"></i> SL (optionnel)</label>
                        <input type="number" class="form-control" id="sl" name="sl" value="{{ $signal->sl }}">
                    </div>
                    <div class="mb-3">
                        <label for="be" class="form-label"><i class="fas fa-arrow-alt-circle-up"></i> BE (optionnel)</label>
                        <input type="number" class="form-control" id="be" name="be" value="{{ $signal->be }}">
                    </div>
                    <button type="submit" class="btn btn-warning">
                        <i class="fas fa-save"></i> Sauvegarder les Modifications
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
