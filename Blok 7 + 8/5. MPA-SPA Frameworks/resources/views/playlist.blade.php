@extends('layouts.app')

@section('content')
    <h1 class="text-center mb-3">Playlists</h1>
    
    @foreach ($songs as $song)
        <h3 class="text-center">
            <a href="/song/{{ $song->id }}">
                {{ $song->name }} | {{ gmdate('i:s', $song->duration) }} | {{ $song->artist }}
            </a>
        </h3>
    @endforeach
@endsection
