<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'accueil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-k6RqeWeci5ZR/Lv4MR0sA0FfDOMt23cez/3paNdF+CcNt7XXE6JDfuCETy92QFfg" crossorigin="anonymous">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .navbar {
            background-color: #000; /* Fond noir */
            padding: 0.5rem 1rem; /* Réduire la hauteur */
        }

        .nav-link {
            color: #fff !important; /* Texte blanc */
            font-weight: bold;
            font-size: 14px; /* Taille du texte */
            display: flex;
            align-items: center; /* Aligner le texte et l'icône verticalement */
        }

        .nav-link i {
            margin-right: 5px; /* Espacement entre l'icône et le texte */
            font-size: 12px; /* Taille des icônes */
            color: #fff; /* Couleur blanche pour les icônes */
        }

        .nav-link:hover {
            color: #cccccc !important; /* Texte gris clair au survol */
        }

        /* Responsive styles pour écrans plus petits */
        @media (max-width: 768px) {
            .navbar-nav {
                flex-direction: column; /* Aligner les liens verticalement */
                text-align: center; /* Centrer les liens */
            }
            .nav-item {
                margin-bottom: 10px; /* Espacement entre les éléments */
            }
        }

        @media (max-width: 576px) {
            .navbar {
                padding: 0.5rem; /* Réduire le padding pour écrans très petits */
            }
            .nav-link {
                font-size: 12px; /* Texte plus petit */
            }
        }
        .navbar-toggler {
        border-color: #fff; /* Bordure blanche */
        padding: 0.25rem 0.5rem; /* Réduit l'espace intérieur */
        border-width: 1px; /* Réduit l'épaisseur de la bordure */
   
    }

    .navbar-toggler-icon {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='white' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
        /* Icône blanche */
      width: 20px; /* Réduit la largeur de l'icône */
        height: 20px; /* Réduit la hauteur de l'icône */
    }
  

section {
  padding-top: 5rem;
  padding-bottom: 5rem;
}


    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        @if (Route::has('login'))
            @auth
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/dashboard') }}">
                        <i class="fas fa-tachometer-alt"></i> Dashboard
                    </a>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">
                        <i class="fas fa-sign-in-alt"></i> Log in
                    </a>
                </li>
                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">
                            <i class="fas fa-user-plus"></i> Register
                        </a>
                    </li>
                @endif
            @endauth
        @endif
      </ul>
    </div>
  </div>
</nav>
<!-- Hero Section-->
<section class="bg-light">
    <div class="container"> 
        <div class="row">
            <div class="col-lg-6 order-2 order-lg-1 text-center">
                <h1 class="text-capitalize font-weight-bold">Application de gestion de congélateur, frigo et autres stocks</h1>
                <p class="font-weight-bold">
                    <a href="{{ route('login') }}" class="btn btn-primary shadow mr-2">Login</a>
                    <!-- <a href="{{ route('register') }}" class="btn btn-outline-primary">Register</a> -->
                </p>
            </div>
            <div class="col-lg-6 order-1 order-lg-2">
                <img src="{{ asset('images/image2.png') }}" alt="..." class="img-fluid">
            </div>
        </div>
    </div>
</section>
<!-- Services-->



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>
