@extends('layouts.front')

@section('contentfront')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <div class="card p-4" style="border-radius: 15px; background-color: #f8f9fa; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email Address -->
                    <div class="mb-3">
                        <label for="email" class="form-label">{{ __('Email') }}</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            <input id="email" type="email" name="email" class="form-control" value="{{ old('email') }}" required autofocus autocomplete="username" />
                        </div>
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mb-3">
                        <label for="password" class="form-label">{{ __('Mot de passe') }}</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                            <input id="password" type="password" name="password" class="form-control" required autocomplete="current-password" />
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Remember Me -->
                    <div class="form-check mb-3">
                        <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                        <label for="remember_me" class="form-check-label">{{ __('Se souvenir de moi') }}</label>
                    </div>

                    <div class="d-flex justify-content-between align-items-center">
                        @if (Route::has('password.request'))
                            <a class="text-decoration-none text-muted" href="{{ route('password.request') }}">
                                {{ __('Mot de passe oublié ?') }}
                            </a>
                        @endif

                        <button type="submit" class="btn btn-primary">
                            {{ __('Se connecter') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
