<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>FOODSTORE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />

    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />

    <style></style>
</head>

<body>
    <header class="header ">
        <nav class="navbar navbar-expand-lg py-3 fixed-top ">
            <div class="container">
                <a class=" btn btn-success" href="index.html">
                    <!-- <img src="./images/logo.png" alt="Bootstrap" width="100" /> -->
                    FOODSTORE
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0 fw-semibold">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('accueil') }}">Accueil</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('plats') }}">Menu</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('livraison.create') }}">Commande</a>
                        </li>


                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('reservation.table') }}">Reservation</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('infos') }}">A propos</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="contacte.html">Contacte</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link">
                                <img src="./images/cart.png" alt="cart" width="22" />
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    @yield('contenu')


    <!--FOOTER-->

    <footer class="py-5 lefooter ">
        <div class="container py-5">
            <div class="row">

                <div class="col-sm-5">
                    <h3 class="fw-bolder  text-white-50 my-1">Télecharger Notre application</h3>
                    <p class="text-white-50">Telecharger nos applcation au format android ios </p>
                    <div class="d-flex">
                        <img src="./images/play-store.png" alt="" class="mx-1 w-25">
                        <img src="./images/app-store.png" alt="" class="mx-1 w-25">
                    </div>
                </div>

                <div class="col-sm-3">
                    <a href="#" class=" btn btn-success fw-bold">FOODSTORE</a>

                    <p class="text-white-50">Notre oblectif est de vous apporter des saveures de la ferme au restaurant
                    </p>
                </div>

                <div class="col-sm-2">
                    <h4 class="text-white-50 text-left">Liens utiles</h4>
                    <ul class="text-left">
                        <li><a href="#" class="text-white-50">Coupon</a></li>
                        <li><a href="#" class="text-white-50">Articles de Blog</a></li>
                        <li><a href="#" class="text-white-50"> Politiques de retour</a></li>
                        <li><a href="#" class="text-white-50">Inscrivez vous</a></li>
                    </ul>
                </div>

                <div class="col-sm-2">
                    <h4 class="text-white-50 text-left">Suivez nous</h4>
                    <ul class="text-left">
                        <li><a href="#" class="text-white-50">Facebook</a></li>
                        <li><a href="#" class="text-white-50">Twitter</a></li>
                        <li><a href="#" class="text-white-50"> Instagram</a></li>
                        <li><a href="#" class="text-white-50">Youtube</a></li>
                    </ul>
                </div>

            </div>

            <hr class="text-light">
            <p class="text-center"><a href="#" class="text-light "> Crée avec passion par Abdoullah BALDE </a>
            </p>

        </div>

    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</body>

</html>
