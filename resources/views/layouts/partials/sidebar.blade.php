@if(Auth::check())
<aside class="col-md-3 col-lg-2 d-md-block bg-light sidebar border-end shadow-sm" style="padding-top: 20px;">
    <div class="position-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ route('admindashboard') }}">
                    <i class="fas fa-tachometer-alt"></i> <!-- Icône Dashboard -->
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('profile.update') }}">
                    <i class="fas fa-user-circle"></i> <!-- Icône Profil -->
                    Profile
                </a>
            </li>

            @if(Auth::user()->subscription_id == 1) <!-- Admin -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('users.index') }}">
                        <i class="fas fa-user"></i> <!-- Icône Utilisateurs -->
                        Utilisateurs
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('subscriptions.index') }}">
                        <i class="fas fa-star"></i> <!-- Icône Abonnements -->
                        Abonnements
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('notifications.index') }}">
                        <i class="fas fa-bell"></i> <!-- Icône Notifications -->
                        Notifications
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('signaux.index') }}">
                        <i class="fas fa-chart-line"></i> <!-- Icône Signaux -->
                        Signaux
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('ressources.index') }}">
                        <i class="fas fa-book"></i> <!-- Icône Ressources -->
                        Ressources
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('analyses.index') }}">
                        <i class="fas fa-chart-line"></i> <!-- Icône Analyses -->
                        Analyses
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('discussions.index') }}">
                        <i class="fas fa-comments"></i> <!-- Icône Discussions -->
                        Discussions
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('live.index') }}">
                        <i class="fas fa-video"></i> <!-- Icône Live -->
                        Live Mensuel
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('business.ideas') }}">
                        <i class="fas fa-lightbulb"></i> <!-- Icône Idées -->
                        Idées de Business & Formation
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('supportclient.index') }}">
                        <i class="fas fa-headset"></i> <!-- Icône Support Client -->
                        Support Client
                    </a>
                </li> 
            @elseif(Auth::user()->subscription_id == 2) <!-- Utilisateur Standard -->
               <li class="nav-item">
                    <a class="nav-link" href="{{ route('subscriptions.index') }}">
                        <i class="fas fa-star"></i> <!-- Icône Abonnements -->
                        Abonnements
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('notifications.index') }}">
                        <i class="fas fa-bell"></i> <!-- Icône Notifications -->
                        Notifications
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('signaux.index') }}">
                        <i class="fas fa-chart-line"></i> <!-- Icône Signaux -->
                        Signaux
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('ressources.index') }}">
                        <i class="fas fa-book"></i> <!-- Icône Ressources -->
                        Ressources
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('analyses.index') }}">
                        <i class="fas fa-chart-line"></i> <!-- Icône Analyses -->
                        Analyses
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('discussions.index') }}">
                        <i class="fas fa-comments"></i> <!-- Icône Discussions -->
                        Discussions
                    </a>
                </li>
            
            @elseif(Auth::user()->subscription_id == 3)
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('subscriptions.index') }}">
                        <i class="fas fa-star"></i> <!-- Icône Abonnements -->
                        Abonnements
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('notifications.index') }}">
                        <i class="fas fa-bell"></i> <!-- Icône Notifications -->
                        Notifications
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('signaux.index') }}">
                        <i class="fas fa-chart-line"></i> <!-- Icône Signaux -->
                        Signaux
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('ressources.index') }}">
                        <i class="fas fa-book"></i> <!-- Icône Ressources -->
                        Ressources
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('analyses.index') }}">
                        <i class="fas fa-chart-line"></i> <!-- Icône Analyses -->
                        Analyses
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('discussions.index') }}">
                        <i class="fas fa-comments"></i> <!-- Icône Discussions -->
                        Discussions
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('supportclient.index') }}">
                        <i class="fas fa-comments"></i> <!-- Icône Discussions -->
                        Support clients
                    </a>
                </li>
                
             <!-- Utilisateur Junior -->
               

            @elseif(Auth::user()->subscription_id == 4)
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('subscriptions.index') }}">
                        <i class="fas fa-star"></i> <!-- Icône Abonnements -->
                        Abonnements
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('notifications.index') }}">
                        <i class="fas fa-bell"></i> <!-- Icône Notifications -->
                        Notifications
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('signaux.index') }}">
                        <i class="fas fa-chart-line"></i> <!-- Icône Signaux -->
                        Signaux
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('ressources.index') }}">
                        <i class="fas fa-book"></i> <!-- Icône Ressources -->
                        Ressources
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('analyses.index') }}">
                        <i class="fas fa-chart-line"></i> <!-- Icône Analyses -->
                        Analyses
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('discussions.index') }}">
                        <i class="fas fa-comments"></i> <!-- Icône Discussions -->
                        Discussions
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('supportclient.index') }}">
                        <i class="fas fa-headset"></i> <!-- Icône Discussions -->
                        Support clients
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('live.index') }}">
                        <i class="fas fa-video"></i> <!-- Icône Discussions -->
                        Lives mensuels
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('business.ideas') }}">
                        <i class="fas fa-lightbulb"></i> <!-- Icône Discussions -->
                        Idees de business
                    </a>
                </li> 
            @endif
        </ul>
    </div>
</aside>

@endif
<style>
    /* Styles supplémentaires pour la sidebar */
    .sidebar {
        margin-top: 20px; /* Espacement entre le header et la sidebar */
    }

    .nav-link {
        transition: background-color 0.3s, color 0.3s; /* Transition douce pour les effets */
    }

    .nav-link:hover {
        background-color: #e9ecef; /* Couleur de fond au survol */
        color: #007bff; /* Couleur du texte au survol */
    }

    .nav-link.active {
        background-color: #86c5d8; /* Dark Sky Blue */
        color: white;
    }
</style>

