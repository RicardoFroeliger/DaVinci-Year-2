@extends('layouts.app')

@section('content')
    <button onclick="javascript:history.back()" class="btn btn-secondary ms-4">
        <h4 class="m-0">Back</h4>
    </button>
    <button onclick="window.location ='/'" class="btn btn-secondary ms-4">
        <h4 class="m-0">Home</h4>
    </button>


    <h2 class="text-center">{{ $genre->name }}</h2>

    @foreach ($songs as $song)
        <h4 class="text-center">
            <a href="/song/{{ $song->id }}">
                {{ $song->name }} | {{ gmdate('i:s', $song->duration) }} | {{ $song->artist }}
            </a>
        </h4>
    @endforeach
@endsection
