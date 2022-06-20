@extends('layouts.app')

@section('content')
    <button onclick="javascript:history.back()" class="btn btn-secondary ms-4">
        <h4 class="m-0">Back</h4>
    </button>
    <button onclick="window.location ='/'" class="btn btn-secondary ms-4">
        <h4 class="m-0">Home</h4>
    </button>


    <h1 class="text-center">{{ $playlist->name }}</h1>
    <h3 class="text-center mb-3 m-0">Total Duration:
        {{ gmdate('H:i:s', $playlist->total_duration) }}</h3>

    @foreach ($songs as $song)
        <h3 class="text-center">
            <a href="/song/{{ $song->id }}">
                {{ $song->name }} | {{ gmdate('i:s', $song->duration) }} | {{ $song->artist }}
            </a>
        </h3>
    @endforeach

@endsection
