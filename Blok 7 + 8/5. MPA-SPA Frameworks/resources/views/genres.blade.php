@extends('layouts.app')

@section('content')
    <button onclick="window.location.href ='/'" class="btn btn-secondary ms-4">
        <h4 class="m-0">Back</h4>
    </button>

    <h1 class="text-center">Genres</h1>

    @foreach ($genres as $genre)
        <h3 class="text-center"><a href="/genre/{{ $genre->id }}">{{ $genre->name }}</a></h3>
    @endforeach
@endsection
