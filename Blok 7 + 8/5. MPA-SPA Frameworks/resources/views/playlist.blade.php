@extends('layouts.app')

@section('content')
    <button onclick="javascript:history.back()" class="btn btn-secondary ms-4">
        <h4 class="m-0">Back</h4>
    </button>
    <button onclick="window.location ='/'" class="btn btn-secondary ms-4">
        <h4 class="m-0">Home</h4>
    </button>


    <h2 class="text-center">{{ $playlist->name }}</h2>

    <div class="text-center w-100 mb-3">
        <h4 class="m-0 d-inline-block text-center" style="vertical-align: middle">Total Duration:
            {{ gmdate('H:i:s', $playlist->total_duration) }}</h4>

        <button type="submit" class="btn btn-secondary ms-3" data-toggle="modal" id="managePlaylistButton"
            data-target="#managePlaylistModal">
            <h4 class="m-0">Manage</h4>
        </button>
    </div>


    @foreach ($songs as $song)
        <h4 class="text-center">
            <a href="/song/{{ $song->id }}">
                {{ $song->name }} | {{ gmdate('i:s', $song->duration) }} | {{ $song->artist }}
            </a>
            <a href="/playlist/">X</a>
        </h4>
    @endforeach


    <div class="text-center w-100 mt-3">
        <button onclick="window.location = '/genres'" class="btn btn-primary">
            <h4 class="m-0">Add songs</h4>
        </button>
    </div>


    @include('modals.managePlaylist');
@endsection
