@extends('layouts.admin')
@section('content')
    <div class="container mt-5">

        <h2 class="text-center"><a href="{{ route('menus.create') }}" class="btn btn-primary">Creer un Menu</a></h2>

        <table class="table bg-white">
            <thead class="bg-light">
                <tr class="text-dark">
                    <th scope="col">id</th>
                    <th scope="col">Image</th>
                    <th scope="col">Categorie</th>
                    <th scope="col"> Nom</th>
                    <th scope="col">Prix</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($menus as $menu)
                    <tr>
                        <th scope="row">{{ $menu->id }}</th>
                        <td>
                            <img width="70px" src="{{ asset('/storage/' . $menu->image) }}" alt="">

                        </td>
                        <td>{{ $menu->categorie->name }}</td>
                        <td>{{ $menu->name }}</td>
                        <td>{{ $menu->price }} FCFA</td>

                        <td class="d-flex justify-content-start">
                            <a class="btn btn-warning btn-sm mx-2" href="{{ route('menus.edit', $menu) }}">Modifier</a>

                            <form action="{{ route('menus.destroy', $menu) }}" method="post" class="mx-2">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger" onclick="return confirm('Etes vous sures ?')">
                                    Supprimer
                                </button>
                            </form>

                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>

    </div>
@endsection
