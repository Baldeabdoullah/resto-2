@extends('layouts.admin')
@section('content')
    <div class="container mt-5">

        <h2 class="text-center">
            <a href="{{ route('tables.create') }}" class="btn btn-primary">Creer Une table</a>
        </h2>
        <table class="table bg-white">
            <thead class="bg-light">
                <tr class="text-dark">
                    <th scope="col">id</th>
                    <th scope="col">Nom</th>
                    <th scope="col"> Places</th>
                    <th scope="col">status</th>
                    <th scope="col">Localisation</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tables as $table)
                    <tr>
                        <th scope="row">{{ $table->id }}</th>
                        <td>{{ $table->name }}</td>
                        <td>{{ $table->guest_number }}</td>
                        <td>{{ $table->status }}</td>
                        <td>{{ $table->location }}</td>

                        <td class="d-flex justify-content-start">
                            <a class="btn btn-warning btn-sm mx-2" href="{{ route('tables.edit', $table) }}">Modifier</a>

                            <form action="{{ route('tables.destroy', $table) }}" class="mx-2" method="post">
                                @method('DELETE')
                                @csrf

                                <button class="btn btn-danger" type="submit"
                                    onclick="return confirm('etes vous sure ?')">Supprimer</button>

                            </form>

                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>

    </div>
@endsection
