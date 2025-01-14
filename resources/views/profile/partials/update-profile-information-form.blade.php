@extends('../../layouts.back')

@section('contentback')

<section class="container mt-5 p-4 border rounded shadow">
    <header class="mb-4">
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Informations de profil') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Mets à jour tes infos de profil ou ton adresse mail") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6">
        @csrf
        @method('patch')

        <div class="mb-3">
            <x-input-label for="name" :value="__('Nom')" />
            <x-text-input id="name" name="name" type="text" class="form-control mt-1" style="width: 60%;" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2 text-danger" :messages="$errors->get('name')" />
        </div>

        <div class="mb-3">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="form-control mt-1" style="width: 60%;" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2 text-danger" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Votre email n\'est pas vérifié.') }}

                        <button form="send-verification" class="btn btn-link p-0 text-decoration-none text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Cliquez ici pour renvoyer un nouveau mail de vérification.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-success">
                            {{ __('Un nouveau lien vient d\'être envoyé à votre adresse email') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="d-flex align-items-center gap-4 mb-3">
            <x-primary-button class="btn btn-primary" style="background-color: #4A90E2; border-color: #4A90E2; width: 60%;">{{ __('Sauvegarder la modification') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Sauvegardé.') }}</p>
            @endif
        </div>
    </form>

    <div class="conainer " style="margin-top:5%">
        <!-- Bouton de suppression -->
        <form  method="post" action="{{ route('profile.destroy') }}" class="mt-3">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger" style="background-color: #2ECC71; border-color: #2ECC71; width: 60%;">
                {{ __('Supprimer le profil') }}
            </button>
        </form>
    </div>
</section>

@endsection
