@extends('layouts.admin')
@section('content')
    <div class="container mt-5">

        <h2 class="text-center">
            <a href="{{ route('comandes.create') }}" class="btn btn-primary">Creer Une Commande</a>
        </h2>

        <table class="table bg-white">
            <thead class="bg-light">
                <tr class="text-dark">
                    <th scope="col">id</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prenom</th>
                    <th scope="col">Email</th>
                    <th scope="col">Telephone</th>
                    <th scope="col">Adresse</th>
                    <th scope="col">Menu</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($comandes as $comande)
                    <tr>
                        <th scope="row">{{ $comande->id }}</th>
                        <td>{{ $comande->first_name }}</td>
                        <td>{{ $comande->last_name }}</td>
                        <td>{{ $comande->email }}</td>
                        <td>{{ $comande->tel_number }}</td>
                        <td>{{ $comande->adress }}</td>

                        <td>
                            @foreach ($comande->menus as $comandemenu)
                                {{ $comandemenu->name }}; <br>
                            @endforeach


                        </td>


                        <td class="d-flex justify-content-start">
                            <a class="btn btn-warning btn-sm mx-2"
                                href="{{ route('comandes.edit', $comande) }}">Modifier</a>

                            <form action="{{ route('comandes.destroy', $comande) }}" method="post">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger"
                                    onclick="return confirm('vous êtes sûres ?')">Supprimer</button>

                            </form>

                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>

    </div>
@endsection
