@extends('layouts.app')

@section('content')
    <h1>Playlist</h1>
    @foreach ($songs as $song)
        <h3><a href="/song/{{ $song->id }}">{{ $song->name }} |
                {{ gmdate('i:s', $song->duration) }} |
                {{ $song->artist }}</a></h3>
    @endforeach

    <h1>{{ $value }}</h1>
@endsection
