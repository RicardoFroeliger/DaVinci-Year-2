@extends('layouts.app')

@section('content')
    <h1>{{ $song->name }}</h1>
    <button class="btn btn-primary mb-2 d-block">Add to Playlist</button>
    <button class="btn btn-danger mb-4">Remove from Playlist</button>

    <h3>Duration: {{ gmdate('i:s', $song->duration) }}</h3>
    <h3>Song by: {{ $song->artist }}</h3>
@endsection
