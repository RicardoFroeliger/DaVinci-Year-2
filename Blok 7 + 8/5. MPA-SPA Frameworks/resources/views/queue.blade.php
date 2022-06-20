@extends('layouts.app')

@section('content')
    <button onclick="javascript:history.back()" class="btn btn-secondary ms-4">
        <h4 class="m-0">Back</h4>
    </button>
    <button onclick="window.location ='/'" class="btn btn-secondary ms-4">
        <h4 class="m-0">Home</h4>
    </button>


    <h1 class="text-center">Queue</h1>

    <div class="text-center w-100 mb-3">
        <h3 class="m-0 d-inline-block text-center" style="vertical-align: middle">Total Duration:
            {{ gmdate('H:i:s', $totalDuration) }}</h3>

        @if (count($queue))
            <form action="/playlist/store" method="POST" class="ms-3 d-inline-block">
                @csrf
                <button type="submit" class="btn btn-secondary">
                    <h4 class="m-0">Save as playlist</h4>
                </button>
            </form>
        @endif
    </div>


    @if (count($queue))
        @foreach ($queue as $song)
            <h3 class="text-center">
                <a href="/song/{{ $song->id }}">
                    {{ $song->name }} | {{ gmdate('i:s', $song->duration) }} | {{ $song->artist }}
                </a>
            </h3>
        @endforeach
    @else
        <h3 class="text-center">Your queue is empty</h3>
    @endif


    <div class="text-center w-100 mt-3">
        <button onclick="window.location = '/genres'" class="btn btn-primary">
            <h4 class="m-0">Add songs</h4>
        </button>
    </div>
@endsection
