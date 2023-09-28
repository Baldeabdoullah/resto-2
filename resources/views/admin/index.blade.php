@extends('layouts.admin')

@section('content')
    @if (session('success'))
        <p class="text-center">
            {{ session('success') }}
        </p>
    @endif
@endsection
