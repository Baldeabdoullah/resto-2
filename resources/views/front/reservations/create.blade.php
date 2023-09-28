@extends('layouts.front')

@section('contenu')
    <br> <br>
    <div class="container my-5">
        @if (session('error'))
            <p class="text-center">
                {{ session('error') }}
            </p>
        @endif

        <div class="border bg-white p-3">
            <h4>Reserver une Table</h4>
            <hr>
            <form action="{{ route('reservation.table.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Nom</label>
                    <input type="text" name="first_name" class="form-control">
                </div>

                <div class="form-group">
                    <label>Prenom</label>
                    <input type="text" name="last_name" class="form-control">
                </div>

                <div class="form-group">
                    <label>Mail</label>
                    <input type="text" name="email" class="form-control">
                </div>

                <div class="form-group">
                    <label>Numero</label>
                    <input type="number" name="tel_number" class="form-control">
                </div>

                <div class="form-group">
                    <label>Nombre d'invité</label>
                    <input type="number" name="guest_number" class="form-control">
                </div>

                <div class="form-group">
                    <label>Date de reservation</label>
                    <input type="datetime-local" min="{{ date('Y-m-d H:i') }}" name="res_date" class="form-control">
                </div>

                <div class="form-group ">
                    <label for="inputState">Table</label>
                    <select name="table_id" class="form-control">
                        @foreach ($tables as $table)
                            <option value="{{ $table->id }}">{{ $table->name }}({{ $table->guest_number }} personnes)
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="text-center my-2">
                    <button class="btn btn-warning" type="submit">Valider</button>
                </div>

            </form>
        </div>

    </div>
@endsection
