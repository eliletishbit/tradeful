@extends('layouts.front')

@section('contentfront')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card p-4" style="border-radius: 15px; background-color: #f8f9fa; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);">
                <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                    @csrf

                    <!-- Name -->
                    <div class="mb-3">
                        <label for="name" class="form-label">{{ __('Nom') }}</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            <input id="name" type="text" name="name" class="form-control" value="{{ old('name') }}" required autofocus autocomplete="name" />
                        </div>
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Email Address -->
                    <div class="mb-3">
                        <label for="email" class="form-label">{{ __('Email') }}</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            <input id="email" type="email" name="email" class="form-control" value="{{ old('email') }}" required autocomplete="username" />
                        </div>
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Phone Number -->
                    <div class="mb-3">
                        <label for="phone" class="form-label">{{ __('Téléphone') }}</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                            <input id="phone" type="text" name="phone" class="form-control" value="{{ old('phone') }}" required autocomplete="tel" />
                        </div>
                        <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                    </div>

                    <!-- subscription id -->
                    <div class="mb-3">                        
                        <div class="input-group">                            
                            <input id="subscription_id" type="number" name="subscription_id" class="form-control" value="{{ 1 }}" readonly />
                        </div>                       
                    </div>

                    <!-- Password -->
                    <div class="mb-3">
                        <label for="password" class="form-label">{{ __('Mot de passe') }}</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                            <input id="password" type="password" name="password" class="form-control" required autocomplete="new-password" />
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">{{ __('Confirmer le mot de passe') }}</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                            <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" class="form-control"/>
                        </div>
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <!-- Photo Upload -->
                    <div class="mb-3">
                        <label for="photo" class="form-label">{{ __('Photo de profil') }}</label>
                        <input id ="photo" type ="file" name ="photo" accept ="image/*", required class="form-control"/>
                        <x-input-error :messages="$errors->get('photo')" class ="mt-2"/>
                    </div>

                    <div class ="d-flex justify-content-between align-items-center">
                        <a href="{{ route('login') }}" class ="text-decoration-none text-muted">{{ __('Déjà inscrit ?') }}</a>

                        <button type ="submit", class ="btn btn-primary">{{ __('S\'inscrire') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
