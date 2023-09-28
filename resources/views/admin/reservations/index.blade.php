@extends('layouts.admin')
@section('content')
    <div class="container mt-5">

        <h2 class="text-center">
            <a href="{{ route('reservations.create') }}" class="btn btn-primary">Creer Une reservation</a>
        </h2>

        <h2 class="text-center">
            <a class="btn btn-primary" href="{{ route('pdf') }}">Imprimer</a>

            <a href="{{ route('voire.pdf') }}">Voir</a>

        </h2>

        <table class="table bg-white">

            <thead class="bg-light">
                <tr class="text-dark">
                    <th scope="col">id</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prenom</th>
                    <th scope="col">Email</th>
                    <th scope="col">Telephone</th>
                    <th scope="col">Date</th>
                    <th scope="col">Nombre d'invite</th>
                    <th scope="col">Table</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reservations as $reservation)
                    <tr>
                        <th scope="row">{{ $reservation->id }}</th>
                        <td>{{ $reservation->first_name }}</td>
                        <td>{{ $reservation->last_name }}</td>
                        <td>{{ $reservation->email }}</td>
                        <td>{{ $reservation->tel_number }}</td>
                        <td>{{ $reservation->res_date }}</td>
                        <td>{{ $reservation->guest_number }}</td>
                        <td>{{ $reservation->table->name }}</td>
                        <td class="d-flex justify-content-start">
                            <a class="btn btn-warning btn-sm mx-2"
                                href="{{ route('reservations.edit', $reservation) }}">Modifier</a>

                            <form action="{{ route('reservations.destroy', $reservation) }}" method="post">
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
