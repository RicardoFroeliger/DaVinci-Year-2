@extends('layouts.app')

@section('content')
    <h1>{{ $genre->name }}</h1>

    @foreach ($songs as $song)
        <h3><a href="/song/{{ $song->id }}">{{ $song->name }}</a></h3>
    @endforeach
@endsection
