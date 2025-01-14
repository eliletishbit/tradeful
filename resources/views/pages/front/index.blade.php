@extends('layouts.front')

@section('contentfront')

    <!--hero-->
    <div class="hero2">
        <section class="position-relative" style="overflow: hidden;">
            <div class="hero-image" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0;">
                <img src="{{ asset('images/best_trading-plateform.jpg') }}" alt="Image de fond" class="img-fluid w-100 h-100" style="object-fit: cover; opacity: 0.7;">
                <div class="overlay" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background-color: rgba(156, 4, 24, 0.5);"></div>
            </div>
            <div class="container-lg max-w-screen-xl position-relative text-center" style="height: 100vh;">
                <div class="row align-items-center justify-content-center h-100">
                    
                    <!-- Colonne gauche avec le titre, sous-titre et boutons -->
                    <div class="col-lg-6 text-center">
                        <h2 class="ls-tight font-bolder display-5 text-white mb-4" style="font-size: 80px; font-weight: bold;">
                            Trade Full
                        </h2>
                        <p class="lead text-white text-opacity-90 mb-4 w-lg-2/3" style="font-size: 25px;">
                            Maximisez votre potentiel de trading avec nos plans d'abonnement flexibles. Que vous soyez débutant ou trader expérimenté, nous avons des solutions adaptées à vos besoins.
                        </p>
                        
                        <div class="mt-4 mx-n2">
                            <a href="#" id="btn1" class="btn btn-lg shadow-sm mx-2 px-lg-4">
                                <i class="fas fa-play"></i> Demarrer
                            </a>
                            <a href="#" id="btn2" class="btn btn-lg mx-2 px-lg-4">
                                <i class="fas fa-info-circle"></i> Lire plus
                            </a>
                        </div>
                    </div>
    
                    <!-- Colonne droite avec une image vectorielle SVG -->
                    <div class="col-lg-6 d-none d-lg-block text-center"> <!-- Masquer sur mobile -->
                        <img src="{{ asset('images/finance.svg') }}" alt="Illustration SVG" style="max-width: 100%; height: auto;">
                    </div>
                </div>
            </div>
        </section>
    </div>
    
    
    <!--hfin hero-->
  
  
    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->
  
    <div class="container marketing" style="margin-top:5%; " >
    <!-- Three columns of text below the carousel -->
    <div class="row text-black py-4 row1" >
        <div class="col-lg-4 d-flex flex-column align-items-center col1"> <!-- Ajout de d-flex et align-items-center -->
            <img src="{{ asset('images/sinscrire.png') }}" alt="Image sans fond" class="bd-placeholder-img" width="100" height="100" style="object-fit: cover; margin-bottom: 20px;"> <!-- Ajout de margin-bottom pour espacer l'image du texte -->
            <h2 class="fw-normal">Choisir un Abonnement</h2>
            <p class="lead" style="text-align:center">Explorez nos différentes options d'abonnement adaptées à vos besoins de trading. Choisissez celui qui vous convient le mieux.</p>
            {{-- <p><a class="btn btn-md" style="background-color:#2ECC71;color:white;" href="#">View details &raquo;</a></p> --}}
        </div>
        <!-- /.col-lg-4 -->
        <div class="col-lg-4 d-flex flex-column align-items-center col2"> <!-- Ajout de d-flex et align-items-center -->
            <img src="{{ asset('images/sabonner.png') }}" alt="Image sans fond" class="bd-placeholder-img" width="100" height="100" style="object-fit: cover; margin-bottom: 20px;"> <!-- Ajout de margin-bottom pour espacer l'image du texte -->
            <h2 class="fw-normal">S'inscrire</h2>
            <p class="lead" style="text-align:center" >Complétez votre inscription en quelques étapes simples et accédez à notre plateforme de trading. Rejoignez notre communauté dès aujourd'hui.</p>
            {{-- <p><a class="btn btn-md" style="background-color:#2ECC71;color:white;" href="#">View details &raquo;</a></p> --}}
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4 d-flex flex-column align-items-center col3"> <!-- Ajout de d-flex et align-items-center -->
            <img src="{{ asset('images/investir.png') }}" alt="Image sans fond" class="bd-placeholder-img" width="100" height="100" style="object-fit: cover; margin-bottom: 20px;"> <!-- Ajout de margin-bottom pour espacer l'image du texte -->
            <h2 class="fw-normal">Trader</h2>
            <p class="lead" style="text-align:center" >Accédez à des positions de trading en temps réel et commencez à générer des gains avec nos signaux d'expertise.</p>
            {{-- <p><a class="btn btn-md" style="background-color:#2ECC71;color:white;" href="#">View details &raquo;</a></p> --}}
        </div><!-- /.col-lg-4 -->
    </div><!-- /.row -->
</div><!-- /.container -->


<!-- Offres d'abonnement -->
<div class="container my-5">
    <h2 class="text-center" style="color:#500000; font-size: 65px; font-weight: bold; margin-bottom: 40px;">Nos Offres d'Abonnement</h2>
    <div class="row text-center">
        <!-- Offre Standard -->
        <div class="col-lg-4 mb-4">
            <div class="card standard" style="border-radius: 15px; background-color: #ffffff; height: 400px; border: 2px solid #0056b3;"> <!-- Bordure bleu foncé -->
                <div class="card-body d-flex flex-column justify-content-between">
                    <h3 class="card-title fw-bold">
                        <span class="badge" style="background-color: #0056b3; color: white; font-size: 1.25rem; padding: 10px 15px;">Standard</span>
                    </h3>
                    <div style="font-size: 60px; color: black; font-weight: bold;">30%</div> <!-- Prix -->
                    <ul class="list-unstyled" style="font-size: 1.2em; line-height: 2;">
                        <li><span style="color: #4A90E2; font-weight: bold;">✔️</span> <span style="font-weight: bold;">Signaux illimités</span></li>
                        <li><span style="color: #4A90E2; font-weight: bold;">✔️</span> Ressources : PDF</li>
                        <li><span style="color: #4A90E2; font-weight: bold;">✔️</span> Analyse graphique</li>
                        <li><span style="color: #4A90E2; font-weight: bold;">✖️</span> Discussion WhatsApp</li>
                    </ul>
                    <a href="#" class="btn btn-lg btn-outline-danger mt-3">S'abonner</a>
                </div>
            </div>
        </div>

        <!-- Offre Junior (Mise en avant) -->
        <div class="col-lg-4 mb-4">
            <div class="card junior" style="border-radius: 15px; background-color: #ffffff; height: 450px; border: 3px solid #FF5733;"> <!-- Bordure rouge vif -->
                <div class="card-body d-flex flex-column justify-content-between">
                    <h3 class="card-title fw-bold">
                        <span class="badge" style="background-color: #FF5733; color: white; font-size: 1.25rem; padding: 10px 15px;">Junior</span>
                    </h3>
                    <div style="font-size: 60px; color: black; font-weight: bold;">25%</div> <!-- Prix -->
                    <ul class="list-unstyled" style="font-size: 1.2em; line-height: 2;">
                        <li><span style="color: #4A90E2; font-weight: bold;">✔️</span> <span style="font-weight: bold;">Signaux limités à 50 par mois</span></li>
                        <li><span style="color: #4A90E2; font-weight: bold;">✔️</span> Ressources : PDF</li>
                        <li><span style="color:#4A90E2;font-weight:bold">✔️</span> Analyse graphique mensuelle</li>
                        <li><span style="#4A90E2;font-weight:bold">✖️</span> Discussion par email</li>
                    </ul>
                    <a href="#" class="btn btn-lg btn-danger mt-3">S'abonner</a>
                </div>
            </div>
        </div>

        <!-- Offre Senior -->
        <div class="col-lg-4 mb-4">
            <div class="card senior" style="border-radius: 15px; background-color: #ffffff; height: 500px; border: 2px solid #0056b3;"> <!-- Bordure bleu foncé -->
                <div class="card-body d-flex flex-column justify-content-between">
                    <h3 class="card-title fw-bold">
                        <span class="badge" style="background-color: #0056b3; color: white; font-size: 1.25rem; padding: 10px 15px;">Senior</span>
                    </h3>
                    <div style="font-size: 60px; color: black; font-weight: bold;">35%</div> <!-- Prix -->
                    <ul class="list-unstyled" style="font-size: 1.2em; line-height: 2;">
                        <li><span style="#4A90E2;font-weight:bold">✔️</span> <span style="font-weight:bold">Signaux illimités</span></li>
                        <li><span style="#4A90E2;font-weight:bold">✔️</span> Ressources : PDF + Vidéos</li>
                        <li><span style="#4A90E2;font-weight:bold">✔️</span> Analyse graphique hebdomadaire</li>
                        <li><span style="#4A90E2;font-weight:bold">✖️</span> Discussion WhatsApp + Télégramme</li>
                    </ul>
                    <!-- Changement du bouton pour correspondre à l'offre Standard -->
                    <a href="#" class="btn btn-lg btn-outline-danger mt-3">S'abonner</a>
                </div>
            </div>
        </div>

    </div><!-- /.row -->
</div><!-- /.container -->

<!-- Fin offres abonnement -->











<!-- START THE FEATURETTES -->
<div class="container"> 
    <hr class="featurette-divider">

    <!-- Featurette Section -->
    @foreach ([
        ['title' => 'Choisissez un Abonnement', 'subtitle' => 'Pour répondre à vos besoins.', 'image' => 'why1.png'],
        ['title' => 'Inscription Rapide', 'subtitle' => 'Rejoignez-nous facilement.', 'image' => 'why2.png'],
        ['title' => 'Accédez au Trading', 'subtitle' => 'Profitez de nos signaux d\'expertise.', 'image' => 'why3.png'],
    ] as $featurette)
    <div class="row featurette align-items-center my-5" style="{{ $loop->iteration == 2 ? 'background-color: #f0f8ff; padding: 20px; border-radius: 15px;' : '' }}"> <!-- Couleur de fond pour la deuxième row -->
        @if ($loop->iteration % 2 == 1)
            <!-- Colonne gauche -->
            <div class="col-md-7">
                <h2 class="featurette-heading fw-normal lh-1" style="color: #4A90E2;">{{ $featurette['title'] }}<span class="text-body-secondary"> {{ $featurette['subtitle'] }}</span></h2>
                <p class="lead">Explorez nos différentes options d'abonnement conçues pour s'adapter à votre style de trading.</p>
            </div>
            <!-- Colonne droite -->
            <div class="col-md-5">
                <img src="{{ asset('images/' . $featurette['image']) }}" alt="{{ $featurette['title'] }}" 
                     class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" style="
                     object-fit: cover; border-radius:10%; box-shadow: 0 4px 16px rgba(0,0,0,0.2);">
            </div>
        @else
            <!-- Colonne droite -->
            <div class="col-md-5 order-md-2">
                <img src="{{ asset('images/' . $featurette['image']) }}" alt="{{ $featurette['title'] }}" 
                     class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" style="
                     object-fit: cover; border-radius:10%; box-shadow: 0 4px 16px rgba(0,0,0,0.2);">
            </div>
            <!-- Colonne gauche -->
            <div class="col-md-7 order-md-1">
                <h2 class="featurette-heading fw-normal lh-1" style="color:#4A90E2;">{{ $featurette['title'] }}<span class="text-body-secondary"> {{ $featurette['subtitle'] }}</span></h2>
                <p class="lead">Explorez nos différentes options d'abonnement conçues pour s'adapter à votre style de trading.</p>
            </div>
        @endif
    </div>

    @endforeach

    <hr class="featurette-divider"> 
</div><!-- /.container -->




@endsection