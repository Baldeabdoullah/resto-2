@extends('layouts.index')

@section('thecontent')
    <div class="container mt-5">

        <div class="border bg-white p-3">
            <h4>Creer une Table</h4>
            <hr>
            <form action="{{ route('tables.update', $table) }}" method="post" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="form-group">
                    <label>Nom</label>
                    <input type="text" value="{{ $table->name }}" name="name" class="form-control">
                </div>

                <div class="form-group">
                    <label>Nombre d'invitées</label>
                    <input type="number" value="{{ $table->guest_number }}" name="guest_number" class="form-control">
                </div>

                <div class="form-group">
                    <label for="">status</label>
                    <select name="status" id="" class="py-1">
                        @foreach (App\Enums\TableStatus::cases() as $status)
                            <option value="{{ $status->value }}"
                                {{ $table->status->value == $status->value ? 'selected' : '' }}>
                                {{ $status->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Localisation</label>
                    <select name="location" id="" class="py-1">
                        @foreach (App\Enums\TableLocation::cases() as $location)
                            <option value="{{ $location->value }}"
                                {{ $table->location->value == $location->value ? 'selected' : '' }}>{{ $location->name }}
                            </option>
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
