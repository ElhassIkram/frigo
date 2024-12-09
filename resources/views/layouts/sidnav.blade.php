<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>
<body>
    <!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-item">
    <a class="nav-link " href="{{ route('dashboard.index') }}">
      <i class="bi bi-grid"></i>
      <span>Dashboard</span>
    </a>
  </li><!-- End Dashboard Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="{{ route('bonsorts.index') }}">
      <i class="fas fa-truck"></i>
      <span>Bon Sortie</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link collapsed" href="{{ route('bonentres.index') }}">
      <i class="fas fa-sign-in-alt"></i>
      <span>Bon Entres</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link collapsed" href="{{ route('bonlivrasons.index') }}">
      <i class="fas fa-truck"></i>
      <span>Bon Livrason</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link collapsed" href="{{ route('vendeurs.index') }}">
      <i class="fas fa-user-tie"></i>
      <span>Vendeurs</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link collapsed" href="{{ route('clients.index') }}">
      <i class="fas fa-users"></i>
      <span>Clients</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link collapsed" href="{{ route('conditionnements.index') }}">
      <i class="fas fa-boxes"></i>
      <span>Conditionnements</span>
    </a>
  </li>




  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
      <i class="fas fa-folder"></i><span>d'autres pages</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="{{ route('users.index') }}">
          <i class="fas fa-user"></i><span>Les Utilisateur</span>
        </a>
      </li>
      <li>
        <a href="{{ route('familles.index') }}">
          <i class="fas fa-layer-group"></i><span>Familles</span>
        </a>
      </li>
      <li>
        <a  href="{{ route('produits.index') }}">
          <i class="fas fa-box"></i><span>Produits</span>
        </a>
      </li>
      <li>
        <a  href="{{ route('modes.index') }}">
          <i class="fas fa-money-check-alt"></i><span>ModesDeReglements</span>
        </a>
      </li>
    </ul>
  </li><!-- End Tables Nav -->

</ul>

</aside><!-- End Sidebar-->
</body>
</html>