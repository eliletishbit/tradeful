@extends('layouts.back')

@section('contentback')

    <div class="container mt-5">
        <h2><i class="fas fa-chart-line"></i> Liste des Signaux</h2>

        <a href="{{ route('signaux.create') }}" class="btn btn-primary my-3">
            <i class="fas fa-plus-circle"></i> Ajouter un signal
        </a>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card shadow-sm">
            <div class="card-header">
                <i class="fas fa-list"></i> Liste des signaux
            </div>
            <div class="card-body">
                @if($signaux->isEmpty())
                    <p>Aucun signal trouvé.</p>
                @else
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Titre</th>
                                <th>Prix d'entrée</th>
                                <th>Stop Loss</th>
                                <th>break even</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($signaux as $signal)
                                <tr>
                                    <td>{{ $signal->title }}</td>
                                    <td>{{ $signal->entry_price }}</td>
                                    <td>{{ $signal->stop_loss }}</td>
                                    <td>{{ $signal->be }}</td>
                                    <td>
                                        <a href="{{ route('signaux.show', $signal->id) }}" class="btn btn-info btn-sm">
                                            <i class="fas fa-eye"></i> Voir
                                        </a>
                                        <a href="{{ route('signaux.edit', $signal->id) }}" class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit"></i> Modifier
                                        </a>
                                        <form action="{{ route('signaux.destroy', $signal->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash-alt"></i> Supprimer
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
@endsection


