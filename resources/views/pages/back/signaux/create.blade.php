@extends('layouts.back')

@section('contentback')
    <div class="container mt-5">
        <h2><i class="fas fa-plus-circle"></i> Ajouter un Signal</h2>

        <form action="{{ route('signaux.store') }}" method="POST">
            @csrf
            <div class="card shadow-sm">
                <div class="card-header">
                    <i class="fas fa-edit"></i> Formulaire de Signal
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="title" class="form-label"><i class="fas fa-heading"></i> Titre</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>
                    <div class="mb-3">
                        <label for="entry_price" class="form-label"><i class="fas fa-dollar-sign"></i> Prix d'Entrée</label>
                        <input type="number" step="0.00001"  class="form-control" id="entry_price" name="entry_price" required>
                    </div>
                    <div class="mb-3">
                        <label for="stop_loss" class="form-label"><i class="fas fa-chart-line"></i> Stop Loss</label>
                        <input type="number" step="0.00001" class="form-control" id="stop_loss" name="stop_loss" required>
                    </div>
                    <div class="mb-3">
                        <label for="sl" class="form-label"><i class="fas fa-arrow-alt-circle-down"></i> SL (optionnel)</label>
                        <input type="number" step="0.00001" class="form-control" id="sl" name="sl">
                    </div>
                    <div class="mb-3">
                        <label for="be" class="form-label"><i class="fas fa-arrow-alt-circle-up"></i> BE (optionnel)</label>
                        <input type="number" step="0.00001" class="form-control" id="be" name="be">
                    </div>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-paper-plane"></i> Ajouter le Signal
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
