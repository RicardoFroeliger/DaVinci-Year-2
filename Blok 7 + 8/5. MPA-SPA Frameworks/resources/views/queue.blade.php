@extends('layouts.app')

@section('content')
    <button onclick="javascript:history.back()" class="btn btn-secondary ms-4">
        <h4 class="m-0">Back</h4>
    </button>
    <button onclick="window.location ='/'" class="btn btn-secondary ms-4">
        <h4 class="m-0">Home</h4>
    </button>

    <h1 class="text-center">Queue</h1>

    @if ($queue)
        @foreach ($queue as $song)
            <h3 class="text-center"><a href="/song/{{ $song[0]->id }}">
                    {{ $song[0]->name }} | {{ gmdate('i:s', $song[0]->duration) }} | {{ $song[0]->artist }}
                </a></h3>
        @endforeach
    @else 
        <h3 class="text-center">Your queue is empty</h3>
    @endif
@endsection
