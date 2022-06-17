@extends('layouts.app')

@section('content')
    <button onclick="javascript:history.back()" class="btn btn-secondary ms-4">
        <h4 class="m-0">Back</h4>
    </button>
    <button onclick="window.location ='/'" class="btn btn-secondary ms-4">
        <h4 class="m-0">Home</h4>
    </button>

    <h1 class="text-center">Queue</h1>
    <h3 class="text-center">Total Duration: {{ gmdate('H:i:s', $totalDuration) }}</h3>

    @if (count($queue))
        @foreach ($queue as $song)
            <h3 class="text-center"><a href="/song/{{ $song->id }}">
                    {{ $song->name }} | {{ gmdate('i:s', $song->duration) }} | {{ $song->artist }}
                </a></h3>
        @endforeach
    @else
        <h3 class="text-center">Your queue is empty</h3>
    @endif

    <div class="text-center w-100">
        <button onclick="window.location = '/genres'" class="btn btn-primary">
            <h4 class="m-0">Add songs</h4>
        </button>
    </div>
@endsection
