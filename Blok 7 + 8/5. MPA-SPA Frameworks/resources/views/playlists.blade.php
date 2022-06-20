@extends('layouts.app')

@section('content')
    <button onclick="javascript:history.back()" class="btn btn-secondary ms-4">
        <h4 class="m-0">Back</h4>
    </button>
    <button onclick="window.location ='/'" class="btn btn-secondary ms-4">
        <h4 class="m-0">Home</h4>
    </button>


    <h1 class="text-center mb-3">Playlists</h1>

    @if (count($playlists))
        @foreach ($playlists as $playlist)
            <h3 class="text-center">
                <a href="/playlist/{{ $playlist->id }}">
                    {{ $playlist->name }} | {{ gmdate('H:i:s', $playlist->total_duration) }}
                </a>
            </h3>
        @endforeach
    @else
        <h3 class="text-center">You have no playlists</h3>
        <p class="text-center">
            To create a playlist, add songs to your queue and then save the queue as playlist.
        </p>
    @endif


    <div class="text-center w-100 mt-3">
        <button onclick="window.location = '/queue'" class="btn btn-primary">
            <h4 class="m-0">Create playlist</h4>
        </button>
    </div>
@endsection
