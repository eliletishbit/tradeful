<!-- resources/views/layouts/back.blade.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        body {
            background-color: #f0f8ff; /* Alice Blue */
            display: flex;
            flex-direction: column;
            min-height: 100vh; /* S'assure que le corps prend au moins la hauteur de la fenêtre */
        }
        .main-content {
            flex: 1; /* Permet au contenu principal de s'étendre pour remplir l'espace disponible */
        }
        .footer {
            background-color: #add8e6; /* Light Blue */
        }

        .navbar {
            background-color: #afdceb; /* Powder Blue */
        }
        .sidebar {
            background-color: #cae9f5; /* Water */
        }
        .footer {
            background-color: #add8e6; /* Light Blue */
        }
        .nav-link.active {
            background-color: #86c5d8; /* Dark Sky Blue */
            color: white;
        }
    </style>
</head>
<body>
    @include('layouts.partials.header')

    <div class="container-fluid main-content">
        <div class="row">
            @include('layouts.partials.sidebar')

            <main class="col-md-9 ms-sm-auto col-lg-10 px-4">
                {{-- <h1 class="mt-4">Tableau de Bord</h1> --}}
                @yield('contentback') <!-- Contenu spécifique à chaque page -->
                {{--les pages de resssources--}}
                
            </main>
        </div>
    </div> 

    

    @include('layouts.partials.footer')

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>


