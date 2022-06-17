@extends('layouts.app')

@section('content')
    <button onclick="javascript:history.back()" class="btn btn-secondary ms-4">
        <h4 class="m-0">Back</h4>
    </button>
    <button onclick="window.location ='/'" class="btn btn-secondary ms-4">
        <h4 class="m-0">Home</h4>
    </button>

    <h1 class="text-center mb-3">Genres</h1>

    @foreach ($genres as $genre)
        <h3 class="text-center"><a href="/genre/{{ $genre->id }}">{{ $genre->name }}</a></h3>
    @endforeach
@endsection
