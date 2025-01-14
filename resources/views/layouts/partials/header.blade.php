<!-- resources/views/layouts/partials/header.blade.php -->
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: white;">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ Auth::check() ? route('dashboard') : route('accueil') }}">
            <span style="text-decoration:none; color:black;font-weight:bold;">{{ Auth::check() ? __('Tableau de Bord') : __('TRADEFU') }}</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                @if(Auth::check())
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('accueil') ? 'active' : '' }}" href="{{ route('accueil') }}">{{ __('Accueil') }}</a>
                    </li>
                @endif
                <!-- Liens accessibles aux utilisateurs non connectés -->
                @if(!Auth::check())
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('accueil') }}">{{ __('À propos') }}</a>
                </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('accueil') }}">{{ __('FAQ') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('accueil') }}">{{ __('Signaux') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('accueil') }}">{{ __('Contact') }}</a>
                </li>
            </ul>

            <!-- Dropdown pour les paramètres ou Connexion -->
            <div class="dropdown">
                @if(Auth::check())
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->name }} <i class="fas fa-user-circle"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                        <li><a class="dropdown-item" href="{{ route('profile.edit') }}">{{ __('Profile') }} <i class="fas fa-user-edit"></i></a></li>
                        <li><a class="dropdown-item" href="{{ route('notifications.index') }}">{{ __('Notifications') }} <i class="fas fa-bell"></i></a></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item">{{ __('Log Out') }} <i class="fas fa-sign-out-alt"></i></button>
                            </form>
                        </li>
                    </ul>
                @else
                    <!-- Boutons de connexion et d'inscription -->
                    <button class="btn me-2" style="background-color:#500000; color:white;" onclick="window.location='{{ route('login') }}'">{{ __('Connexion') }} <i class="fas fa-sign-in-alt"></i></button>
                    <button class="btn" style="background-color:#f76270; color:white;" onclick="window.location='{{ route('register') }}'">{{ __('Inscription') }} <i class="fas fa-user-plus"></i></button>
                @endif
            </div>
        </div>
    </div>
</nav>

<!-- Responsive Navigation Menu -->
<div class="d-lg-none">
    @if(Auth::check())
        <!-- Menu responsive pour les utilisateurs connectés -->
        <div class="pt-2 pb-3 space-y-1">
            <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a>
        </div>

        <!-- Options de paramètres -->
        <div class="pt-4 pb-1 border-top border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <a class="nav-link" href="{{ route('profile.edit') }}">{{ __('Profile') }}</a>
                <!-- Notifications -->
                <a class="nav-link" href="{{ route('notifications.index') }}">{{ __('Notifications') }}</a>

                <!-- Déconnexion -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="nav-link">{{ __('Log Out') }}</button>
                </form>
            </div>
        </div>
    @else
        <!-- Menu responsive pour les utilisateurs non connectés -->
        {{-- Optionnel : Ajouter un message pour les utilisateurs non connectés --}}
    @endif
</div>
