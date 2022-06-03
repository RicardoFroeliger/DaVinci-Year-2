@extends('layouts.app')

@section('content')
    <h1>Genres</h1>

    @foreach ($genres as $genre)
        <h3><a href="/genres/{{ $genre->id }}">{{ $genre->name }}</a></h3>
    @endforeach
@endsection
