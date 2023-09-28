@extends('layouts.admin')
@section('content')
    <div class="container mt-5">

        <h2 class="text-center">
            <a href="{{ route('categories.create') }}" class="btn btn-primary t">Creer Une Categorie</a>
        </h2>


        <table class="table bg-white">
            <thead class="bg-light">
                <tr class="text-dark ">
                    <th scope="col">id</th>
                    <th scope="col">Image</th>
                    <th scope="col"> Nom</th>
                    <th scope="col">Descriptions</th>
                    <th scope="col ">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <th scope="row">{{ $category->id }}</th>
                        <td>
                            <img width="100px" src="{{ asset('/storage/' . $category->image) }}" alt="">

                        </td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->description }}</td>


                        <td class="d-flex justify-content-start">

                            <a class="btn btn-warning btn-sm mx-1"
                                href="{{ route('categories.edit', $category) }}">Modifier</a>


                            <form action="{{ route('categories.destroy', $category) }}" method="post" class="mx-1">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger" onclick="return confirm('etes vous sures ?')">
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
