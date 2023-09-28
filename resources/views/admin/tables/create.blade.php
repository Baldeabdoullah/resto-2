@extends('layouts.index')

@section('thecontent')
    <div class="container mt-5">

        <div class="border bg-white p-3">
            <h4>Creer une Table</h4>
            <hr>
            <form action="{{ route('tables.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Nom</label>
                    <input type="text" name="name" class="form-control">
                </div>

                <div class="form-group">
                    <label>Nombre d'invitées</label>
                    <input type="number" name="guest_number" class="form-control">
                </div>

                <div class="form-group">
                    <label for="">status</label>
                    <select name="status" id="" class="py-1">
                        @foreach (App\Enums\TableStatus::cases() as $status)
                            <option value="{{ $status->value }}">{{ $status->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Localisation</label>
                    <select name="location" id="" class="py-1">
                        @foreach (App\Enums\TableLocation::cases() as $location)
                            <option value="{{ $location->value }}">{{ $location->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="text-center">
                    <button class="btn btn-warning " type="submit">Valider</button>
                </div>



            </form>
        </div>

    </div>
@endsection
