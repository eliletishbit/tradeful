@extends('layouts.front')

@section('contentfront')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card p-4" style="border-radius: 15px; background-color: #f8f9fa; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);">
                <div class="mb-4 text-sm text-gray-600">
                    {{ __('Mot de passe oublié? Aucun probleme . Rappelez-nous votre email et nous vous renverrons le lien de reinitialisation.') }}
                </div>

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <!-- Email Address -->
                    <div class="mb-3">
                        <label for="email" class="form-label">{{ __('Email') }}</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            <input id="email" type="email" name="email" class="form-control" value="{{ old('email') }}" required autofocus />
                        </div>
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Recevoir un lien de reinitialisation') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
