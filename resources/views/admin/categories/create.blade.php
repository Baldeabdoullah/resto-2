@extends('layouts.index')

@section('thecontent')
    <div class="container mt-5">

        <div class="border bg-white p-3">
            <h4>Categorie</h4>
            <hr>
            <form action="{{ route('backcategories.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Nom</label>
                    <input type="text" name="name" class="form-control" aria-describedby="emailHelp">
                </div>

                <div class="form-group">
                    <label>Image</label>
                    <input type="file" class="form-control" name="image" aria-describedby="emailHelp">
                </div>

                <div class="form-group">
                    <textarea name="description" id="" class="form-control" cols="30" rows="5"></textarea>
                </div>

                <button type="submit" class="btn btn-warning">valider</button>

            </form>
        </div>

    </div>
@endsection
