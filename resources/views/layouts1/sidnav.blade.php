

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
<style>
    /* Supprimer les puces de la liste */
    a:before {
    display: none;
}


</style>

</head>
<body>
    

<div class="main-sidebar sidebar-style-3">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
        <a href="{{ route('dashboard.index') }}">gestion de stock</a>
        </div>
       
        <ul class="sidebar-menu">
            
            <li class="dropdown active">
            <a href="{{ route('dashboard.index') }}">Dashboard</a>
            </li>
            <li class="menu-header">pages</li>

            <li class="dropdown">
                <a  href="{{ route('bonentres.index') }}" >
                    <i class="fas fa-sign-in-alt"></i> <span>Bon Entres</span>
                </a>
                <!-- <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('bonentres.index') }}">Liste bonentres</a></li>
                     <li><a class="nav-link" href="{{ route('bonentres.create') }}">add bonentres</a></li> 
                </ul> -->
            </li>
            <li class="dropdown">
                <a href="{{ route('bonsorts.index') }}">
                    <i class="fas fa-truck"></i> <span>Bon Sortie</span>
                </a>
                <!-- <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('bonsorts.index') }}">Liste bon sortie</a></li>
                     <li><a class="nav-link" href="{{ route('bonsorts.create') }}">add bon sortie</a></li>
                </ul> -->
            </li>
            <li class="dropdown">
                <a href="{{ route('bonlivrasons.index') }}" >
                    <i class="fas fa-truck"></i> <span>Bon Livrason</span>
                </a>
                <!-- <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('bonlivrasons.index') }}">Liste bon livrasons</a></li>
                     <li><a class="nav-link" href="{{ route('bonlivrasons.create') }}">add bon livrasons</a></li>
                </ul> -->
            </li>

            <li class="nav-item dropdown">
                <a href="{{ route('vendeurs.index') }}"  >
                <i class="fas fa-user-tie"></i> <span>Vendeurs</span> 
                </a>
                <!-- <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('vendeurs.index') }}">Liste des Vendeurs</a></li>
                    <li><a class="nav-link" href="{{ route('vendeurs.create') }}">add Vendeurs</a></li>      
                </ul> -->
            </li>
            <li class="dropdown">
                <a href="{{ route('clients.index') }}" >
                    <i class="fas fa-users"></i> <span>Clients</span>
                </a>
                <!-- <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('clients.index') }}">Liste des clients</a></li>
                    <li><a class="nav-link" href="{{ route('clients.create') }}">add clients</a></li>
                    
                    Autres éléments de menu ici
                </ul> -->
            </li>
           
          
            
            <li class="dropdown">
                <a href="{{ route('conditionnements.index') }}" >
                    <i class="fas fa-boxes"></i> <span>Conditionnements</span>
                </a>
                <!-- <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('conditionnements.index') }}">Liste conditionnements</a></li>
                     <li><a class="nav-link" href="{{ route('conditionnements.create') }}">add conditionnements</a></li> 
                </ul> -->
            </li>
       


            <!-- {{-- <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i> <span>Forms</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="forms-advanced-form.html">Advanced Form</a></li>
                    <li><a class="nav-link" href="forms-editor.html">Editor</a></li>
                    <li><a class="nav-link" href="forms-validation.html">Validation</a></li>
                </ul>
            </li> --}} -->
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-folder">
                    </i> <span>d'autres pages</span>
                </a>
                <ul class="dropdown-menu">
                <li >
                <a href="{{ route('users.index') }}" >
                    <i class="fas fa-user"></i> <span>Les Utilisateur</span>
                </a>
                <!-- <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('users.index') }}">Liste des users</a></li>
                    <li><a class="nav-link" href="{{ route('users.create') }}">add user</a></li> 
                </ul> -->
            </li>
            <li class="dropdown">
                <a href="{{ route('familles.index') }}" >
                    <i class="fas fa-layer-group"></i> <span>Familles</span>
                </a>
                <!-- <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('familles.index') }}">Liste des familles</a></li>
                    <li><a class="nav-link" href="{{ route('familles.create') }}">add familles</a></li>  
                </ul> -->
            </li>
            
            
            <li class="dropdown">
                <a href="{{ route('produits.index') }}" >
                    <i class="fas fa-box"></i> <span>Produits</span>
                </a>
                <!-- <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('produits.index') }}">Liste des produits</a></li>
                    <li><a class="nav-link" href="{{ route('produits.create') }}">add produits</a></li>
                    
                   
                </ul> -->
            </li>
            <li class="dropdown">
                <a href="{{ route('modes.index') }}">
                    <i class="fas fa-money-check-alt"></i> <span>ModesDeReglements</span>
                </a>
                <!-- <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('modes.index') }}">Liste des modes</a></li>
                    <li><a class="nav-link" href="{{ route('modes.create') }}">add modes</a></li> 
                </ul> -->
            </li>
                   
                </ul>
            </li> 





            <!-- {{-- <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-plug"></i> <span>Modules</span></a>
                <ul class="dropdown-menu">
                    <li class="menu-sub-header">Apps</li>
                    <li><a class="nav-link" href="modules-calendar.html">Calendar</a></li>
                    
                    <li class="menu-sub-header">Charts</li>
                    <li><a class="nav-link" href="modules-chartjs.html">ChartJS</a></li>
                    <li><a class="nav-link" href="modules-apex-charts.html">Apex Charts</a></li>
                    <li><a class="nav-link" href="modules-e-charts.html">E Charts</a></li>
                    <li><a class="nav-link" href="modules-c3-charts.html">C3 Charts</a></li>
                    <li><a class="nav-link" href="modules-knob-charts.html">Knob Charts</a></li>
                    <li><a class="nav-link" href="modules-sparkline.html">Sparkline</a></li>
                    <li class="menu-sub-header">Tables</li>
                    <li><a class="nav-link" href="modules-datatables.html">DataTables</a></li>
                    <li><a class="nav-link" href="modules-table-more.html">More</a></li>
                    <li class="menu-sub-header">Font Icons</li>
                    <li><a class="nav-link" href="modules-font-awesome.html">Font Awesome</a></li>
                    <li><a class="nav-link" href="modules-line-icons.html">Line Icons</a></li>
                    <li><a class="nav-link" href="modules-feather-icons.html">Feather Icons</a></li>
                    <li><a class="nav-link" href="modules-ion-icons.html">Ion Icons</a></li>
                    <li><a class="nav-link" href="modules-flag.html">Flag</a></li>
                    <li><a class="nav-link" href="modules-weather-icon.html">Weather Icon</a></li>
                    <li class="menu-sub-header">Other</li>
                    <li><a class="nav-link" href="modules-owl-carousel.html">Owl Carousel</a></li>
                    <li><a class="nav-link" href="modules-sweet-alert.html">Sweet Alert</a></li>
                    <li><a class="nav-link" href="modules-toastr.html">Toastr</a></li>
                    <li><a class="nav-link" href="modules-vector-map.html">Vector Map</a></li>
                </ul>
            </li> --}} -->
            <!-- {{-- <li class="menu-header">Pages</li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="far fa-user"></i> <span>Auth</span></a>
                <ul class="dropdown-menu">
                    <li><a href="auth-forgot-password.html">Forgot Password</a></li> 
                    <li><a href="auth-login.html">Login</a></li> 
                    <li><a href="auth-register.html">Register</a></li> 
                    <li><a href="auth-reset-password.html">Reset Password</a></li> 
                </ul>
            </li> --}}
            
            {{-- <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-bicycle"></i> <span>Features</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="features-activities.html">Activities</a></li>
                    <li><a class="nav-link" href="features-post-create.html">Post Create</a></li>
                    <li><a class="nav-link" href="features-posts.html">Posts</a></li>
                    <li><a class="nav-link" href="features-profile.html">Profile</a></li>
                    <li><a class="nav-link" href="features-settings.html">Settings</a></li>
                    <li><a class="nav-link" href="features-setting-detail.html">Setting Detail</a></li>
                    <li><a class="nav-link" href="features-tickets.html">Tickets</a></li>
                </ul>
            </li> --}}
            {{-- <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-ellipsis-h"></i> <span>Utilities</span></a>
                <ul class="dropdown-menu">
                    <li><a href="utilities-contact.html">Contact</a></li>
                    <li><a class="nav-link" href="utilities-invoice.html">Invoice</a></li>
                    <li><a href="utilities-subscribe.html">Subscribe</a></li>
                </ul>
            </li> --}}
            {{-- <li><a class="nav-link" href="credits.html"><i class="fas fa-pencil-ruler"></i> <span>Credits</span></a></li>--}}-->
        </ul>  
      
    </aside>
</div>



