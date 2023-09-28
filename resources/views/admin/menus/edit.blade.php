@extends('layouts.index')

@section('thecontent')
    <div class="container mt-5">

        <div class="border bg-white p-3">
            <h4>Creer un menu</h4>
            <hr>
            <form action="{{ route('menus.update', $menu) }}" method="post" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label>Nom</label>
                    <input type="text" value="{{ $menu->name }}" class="form-control" name="name">
                </div>
                <div class="form-group">
                    <label>Image</label>
                    <input type="file" name="image" class="form-control">
                </div>

                <div class="form-group">
                    <label>Prix</label>
                    <input type="number" value="{{ $menu->price }}" name="price" class="form-control">
                </div>

                <div class="form-group">
                    <textarea name="description" class="form-control" id="" cols="30" rows="5">
                        {{ $menu->description }}
                    </textarea>
                </div>



                <div class="form-group ">
                    <label>Categorie</label>
                    <select name="categorie_id" class="p-2">
                        @foreach ($categories as $categorie)
                            <option value="{{ $categorie->id }}"
                                {{ $menu->categorie_id === $categorie->id ? 'selected' : '' }}>{{ $categorie->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-success text-center">Valider</button>


                </div>

            </form>
        </div>

    </div>
@endsection
