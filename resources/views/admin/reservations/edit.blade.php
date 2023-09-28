@extends('layouts.index')

@section('thecontent')
    <div class="container mt-5">

        <div class="border bg-white p-3">
            <h4>Creer une reservation</h4>
            <hr>
            <form action="{{ route('reservations.update', $reservation) }}" method="post" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="form-group">
                    <label>Nom</label>
                    <input type="text" value="{{ $reservation->first_name }}" name="first_name" class="form-control">
                </div>

                <div class="form-group">
                    <label>Prenom</label>
                    <input type="text" value="{{ $reservation->last_name }}" name="last_name" class="form-control">
                </div>

                <div class="form-group">
                    <label>Mail</label>
                    <input type="text" value="{{ $reservation->email }}" name="email" class="form-control">
                </div>

                <div class="form-group">
                    <label>Numero</label>
                    <input type="number" value="{{ $reservation->tel_number }}" name="tel_number" class="form-control">
                </div>

                <div class="form-group">
                    <label>Nombre d'invité</label>
                    <input type="number" value="{{ $reservation->guest_number }}" name="guest_number" class="form-control">
                </div>

                <div class="form-group">
                    <label>Date de reservation</label>
                    <input type="datetime-local" value="{{ $reservation->res_date }}" name="res_date" class="form-control">
                </div>

                <div class="form-group ">
                    <label for="inputState">Table</label>
                    <select name="table_id" class="form-control">
                        @foreach ($tables as $table)
                            <option value="{{ $table->id }}"
                                {{ $reservation->table_id === $table->id ? 'selected' : '' }}>
                                {{ $table->name }}({{ $table->guest_number }} personnes)
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="text-center">
                    <button class="btn btn-warning" type="submit">Valider</button>
                </div>

            </form>
        </div>

    </div>
@endsection
