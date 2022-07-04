@extends('layouts.app')

@section('content')
    <button onclick="javascript:history.back()" class="btn btn-secondary ms-4">
        <h4 class="m-0">Back</h4>
    </button>
    <button onclick="window.location ='/'" class="btn btn-secondary ms-4">
        <h4 class="m-0">Home</h4>
    </button>


    <h2 class="text-center">Queue</h2>

    <div class="text-center w-100 mb-3">
        <h4 class="m-0 d-inline-block text-center" style="vertical-align: middle">Total Duration:
            {{ gmdate('H:i:s', $queueDuration) }}</h4>

        @if (count($queue))
            <button type="submit" class="btn btn-secondary ms-3" data-toggle="modal" id="saveAsPlaylistButton"
                data-target="#saveAsPlaylistModal">
                <h4 class="m-0">Save as playlist</h4>
            </button>
        @endif
    </div>


    @if (count($queue))
        @foreach ($queue as $song)
            <h4 class="text-center">
                <a href="/song/{{ $song->id }}">
                    {{ $song->name }} | {{ gmdate('i:s', $song->duration) }} | {{ $song->artist }}
                </a>
            </h4>
        @endforeach
    @else
        <h4 class="text-center">Your queue is empty</h4>
    @endif


    <div class="text-center w-100 mt-3">
        <button onclick="window.location = '/genres'" class="btn btn-primary">
            <h4 class="m-0">Add songs</h4>
        </button>
    </div>


    @if (count($queue))
        @include('modals.saveAsPlaylist');
    @endif
@endsection
