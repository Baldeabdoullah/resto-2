@extends('layouts.front')
@section('contenu')
    <br><br>
    <!--hero section-->
    <section class="py-3 my-5">
        <div class="container">
            <div class="row text-start d-flex align-items-center">
                <div class="col-md-5">
                    <h1 class="fw-bold my-4 fs-2">
                        Donnez du goût à votre alimentation
                    </h1>
                    <p class="lead my-4">
                        Des produits bio pour les fins gourmets
                    </p>

                    <button class="btn btn-lg btn-success rounded-pill">
                        <a href="{{ route('livraison.create') }}" class="text-light text-decoration-none"> Explorez</a>
                    </button>
                </div>

            </div>
        </div>
    </section>

    <!--INFOS-->
    <section my-5>
        <div class="container">
            <div class="row align-items-center my-5">
                <div class="col-sm-6">
                    <img src="{{ asset('/images/categories') }}/repas.png" alt="" class="img-fluid" />
                </div>
                <div class="col-sm-6 lh-2">
                    Crée en 2021 par une équipe de chef etoile Foostrore une chaine de restaurant
                    qui valorise la production locale. Sa création part du constat
                    du manque de transformation de produits locaux.
                    De la ferme au restaurant
                </div>
            </div>
        </div>
    </section>
@endsection
