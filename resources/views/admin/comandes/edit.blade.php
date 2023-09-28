@extends('layouts.index')

@section('thecontent')
    <div class="container mt-5">

        <div class="border bg-white p-3">
            <h4>Modifier la commande</h4>
            <hr>
            <form action="{{ route('comandes.update', $comande) }}" method="post" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="form-group">
                    <label>Nom</label>
                    <input type="text" value="{{ $comande->first_name }}" name="first_name" class="form-control">
                </div>

                <div class="form-group">
                    <label>Prenom</label>
                    <input type="text" value="{{ $comande->last_name }}" name="last_name" class="form-control">
                </div>

                <div class="form-group">
                    <label>Mail</label>
                    <input type="text" value="{{ $comande->email }}" name="email" class="form-control">
                </div>

                <div class="form-group">
                    <label>Numero</label>
                    <input type="number" value="{{ $comande->tel_number }}" name="tel_number" class="form-control">
                </div>

                <div class="form-group">
                    <label>Adresse</label>
                    <input type="text" value="{{ $comande->adress }}" name="adress" class="form-control">
                </div>


                <div class="mb-3 form-check">
                    <h2 class="text-center">Menus</h2>
                    <div class="row">
                        @foreach ($menus as $menu)
                            <div class=" my-2 col-sm-6 col-md-4 col-lg-3">
                                <input type="checkbox" class="form-check-input" value="{{ $menu->id }}"
                                    @checked($comande->hasMenu($menu)) name="menus[]">
                                <label class="form-check-label">{{ $menu->name }}</label>
                                <div>
                                    <img width="70px" src="{{ asset('/storage/' . $menu->image) }}" alt="">
                                </div>

                            </div>
                        @endforeach
                    </div>

                </div>



                <div class="text-center">
                    <button class="btn btn-warning" type="submit">Valider</button>
                </div>

            </form>
        </div>

    </div>
@endsection
