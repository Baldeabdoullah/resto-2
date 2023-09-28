@extends('layouts.front')
@section('contenu')
    <!--hero section-->
    <section class="">

        <div class="container-fluid menu-container ">
            <div class=" menu-content">
                <img src=" {{ asset('images/menu') }}/resto2.jpg" class="img-fluid" alt="">

                <div class=" menu-text text-light">
                    <h1 class="fw-bold my-4 fs-2">
                        Donnez du goût à votre alimentation

                    </h1>
                    <p class="lead my-4 fs-3 fw-normal">
                        La nourriture est toute substance consommée <br> pour apporter un soutien nutritionnel à un
                        organisme.
                    </p>

                    <button class="btn btn-lg btn-success rounded-pill">
                        <a href="{{ route('reservation.table') }}" class="text-light text-decoration-none"> Reservation</a>
                    </button>
                </div>

            </div>
        </div>
    </section>


    @if (session('success'))
        <p class="text-center">
            {{ session('success') }}
        </p>
    @endif

    <!--Produits vedette-->

    <section class="py-5 text-center">
        <div class="container">
            <h2 class="fw-bolder my-3">Cathegories de plats</h2>
            <div class="row g-4">
                @foreach ($categories as $categorie)
                    <div class="col-sm-4 hoover-item">
                        <img src="{{ asset('/storage/' . $categorie->image) }}" alt="" class="img-fluid" />
                        <p class="fw-bold py-1">
                            <a href="{{ route('categorie.menus', $categorie->id) }}"
                                class="text-decoration-none text-dark">{{ $categorie->name }}</a>
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!--Meilleurs ventes  -->
    <section class="py-5 text-center">
        <div class="container">
            <h2 class="fw-bolder my-3">Recettes du jour</h2>
            <div class="row g-4">

                @foreach ($randomMenus as $randomMenu)
                    <div class="col-sm-3 hoover-item">
                        <img src="{{ asset('/storage/' . $randomMenu->image) }}" alt="" class="img-fluid" />
                        <p class="fw-bold">
                            <a href="#" class="text-decoration-none text-dark">{{ $randomMenu->name }}</a>
                        </p>
                        <div class="d-flex justify-content-center etoile">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-half"></i>
                            <i class="bi bi-star"></i>
                        </div>
                        <p>{{ $randomMenu->price }} FCFA</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!--nouveaute  -->
    <section class="py-5 text-center">
        <div class="container">
            <h2 class="fw-bolder my-3">Nouveautées</h2>

            <div class="row g-4">
                @foreach ($lastMenus as $lastMenu)
                    <div class="col-sm-3 hoover-item">
                        <img src="{{ asset('/storage/' . $lastMenu->image) }}" alt="" class="img-fluid" />
                        <p class="fw-bold">
                            <a href="#" class="text-decoration-none text-dark">{{ $lastMenu->name }}</a>
                        </p>
                        <div class="d-flex justify-content-center etoile">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-half"></i>
                            <i class="bi bi-star"></i>
                        </div>
                        <p>{{ $lastMenu->price }} FCFA</p>
                    </div>
                @endforeach

            </div>

        </div>
    </section>

    <!-- EXCLUSIVITE -->
    <section class="py-5">
        <div class="container my-5">
            <div class="row">
                @foreach ($particularMenu as $particularMenu)
                    <div class="col-lg-5 d-flex justify-content-center">
                        <img src="{{ asset('/storage/' . $particularMenu->image) }}" alt="" class="img-fluid w-75">
                    </div>

                    <div class="col-lg-7">
                        <h2 class="fw-bolder my-4">{{ $particularMenu->name }}</h2>
                        <figcaption class="blockquote-footer mt-1">
                            Plat du jour
                        </figcaption>
                        <p class="my-3">{{ $particularMenu->description }}</p>
                        <button class="btn btn-success btn-lg rounded-pill">Voir</button>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!--Temoignage-->
    <section class=" py-5">

        <div class="container my-5 px-5">

            <h3 class="fw-bolder text-center my-3">Les Avis</h3>
            <div class="row text-center g-1">

                <div class="col-lg-4 user-item px-5  py-2 ">

                    <i class="bi bi-quote "></i>
                    <p>Un Service clientèle au top. Rapidité de livraison.
                        La qualité des produits.

                    </p>
                    <div class="user-star">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-half"></i>
                        <i class="bi bi-star"></i>
                    </div>

                    <img src="./images/user/user.jpg" class="img-fluid rounded-circle w-25 my-1" alt="">

                    <p class="fw-bolder">Omar</p>

                </div>

                <div class="col-lg-4 user-item px-5  py-2 ">

                    <i class="bi bi-quote"></i>
                    <p>Un Service clientèle au top. Rapidité de livraison.
                        La qualité des produits.
                    </p>
                    <div class="user-star">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-half"></i>
                        <i class="bi bi-star"></i>
                    </div>

                    <img src="./images/user/user1.jpg" class="img-fluid rounded-circle w-25 my-1" alt="">

                    <p class="fw-bolder">Karim</p>


                </div>

                <div class="col-lg-4 user-item px-5 py-2 ">


                    <i class="bi bi-quote"></i>
                    <p>Un Service clientèle au top. Rapidité de livraison.
                        La qualité des produits.
                    </p>
                    <div class="user-star">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-half"></i>
                        <i class="bi bi-star"></i>
                    </div>

                    <img src="./images/user/user3.jpg" class="img-fluid rounded-circle w-25 my-1" alt="">

                    <p class="fw-bolder">Leila</p>

                </div>

            </div>

        </div>


    </section>
@endsection
