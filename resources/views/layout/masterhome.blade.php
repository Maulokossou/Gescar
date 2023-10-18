<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <title>GesCar</title>
</head>
<body>
    <nav>
        <div class="nav_logo">
            <h2><a href="{{route('customers')}}"><span>Ges</span>Car</a></h2>
        </div>
        <div class="nav_link">
            <ul>
                <li><a href="{{route('customers')}}">Accueil</a></li>
                <li><a href="{{route('gestionVoiture')}}">Gestion de voiture</a></li>
                <li><a href="{{route('locationHome')}}">Location de voiture</a></li>
               <li> <a href="{{route('logout')}}" class="deconnexion">Se déconnecter</a></li>
            </ul>
            
        </div>
    </nav>

    @yield('content')

    <footer>
        <div class="top">
            <div class="nav_logo">
                <h2><a href="#"><span>Ges</span>Car</a></h2>
                <p>"La référence en matière de location..."</p>
            </div>
            <div class="footer">
                <ul>
                    <h3>Home</h3>
                    <li><a href="#">Renseignements</a></li>
                    <li><a href="#">Paiement</a></li>
                    <li><a href="#">Négociation</a></li>
                    <li><a href="#">Distribution</a></li>
                </ul>
            </div>
            <div class="footer">
                <ul>
                    <h3>Nos Produits</h3>
                    <li><a href="#">Voiture</a></li>
                    <li><a href="#">Camions</a></li>
                    <li><a href="#">Bus</a></li>
                    <li><a href="#">Mini-bus</a></li>
                </ul>
            </div>
            <div class="footer">
                <ul>
                    <h3>Services</h3>
                    <li><a href="#">Location de voiture</a></li>
                    <li><a href="#">Achat et revente de voiture</a></li>
                    <li><a href="#">Réparation de voiture</a></li>
                    <li><a href="#">Conseil client</a></li>
                </ul>
            </div>
            <div class="footer">
                <ul>
                    <h3>Contact</h3>
                    <li><a href="#">Abomey-Calavi,Rue 229...</a></li>
                    <li><a href="#">Gescarmotors@gmail.com</a></li>
                    <li class="social"> <a href="#">@include('include.facebookIcon')</a>
                        <a href="#">@include('include.instagramIcon')</a>
                        <a href="#">@include('include.twitterIcon')</a>
                        <a href="#">@include('include.linkedinIcon')</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="bottom">
            <div class="adress">
                <p>Abomey-Calavi,Atlantique;&copy; Coyright 2023 |  Made by Maurel LOKOSSOU and Canelle ADOTEVI</p>
            </div>
            <div class="social_media">
                <a href="#">@include('include.facebookIcon')</a>
                <a href="#">@include('include.instagramIcon')</a>
                <a href="#">@include('include.twitterIcon')</a>
                <a href="#">@include('include.linkedinIcon')</a>
            </div>
        </div>
    </footer>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>

</html>