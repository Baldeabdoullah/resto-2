@extends('layouts.front')
@section('contenu')
    <!--Les plats  -->
    <div class="my-5">

        <section class="py-5  my-5  text-center">
            <div class="container">
                <h2 class="fw-bolder my-3">Tous les plats</h2>

                <div class="row g-4">

                    @foreach ($menus as $menu)
                        <div class="col-sm-3 hoover-item">
                            <img src="{{ asset('/storage/' . $menu->image) }}" alt="" class="img-fluid" />
                            <p class="fw-bold">
                                <a href="detail.html" class="text-decoration-none text-dark">{{ $menu->name }}</a>
                            </p>
                            <div class="d-flex justify-content-center etoile">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-half"></i>
                                <i class="bi bi-star"></i>
                            </div>
                            <p>{{ $menu->price }} FCFA</p>
                        </div>
                    @endforeach

                </div>

            </div>
        </section>

    </div>
@endsection
