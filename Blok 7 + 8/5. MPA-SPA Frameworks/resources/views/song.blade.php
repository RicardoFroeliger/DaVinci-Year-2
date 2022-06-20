@extends('layouts.app')

@section('content')
    <button onclick="javascript:history.back()" class="btn btn-secondary ms-4">
        <h4 class="m-0">Back</h4>
    </button>
    <button onclick="window.location ='/'" class="btn btn-secondary ms-4">
        <h4 class="m-0">Home</h4>
    </button>


    <h2 class="text-center mb-3">{{ $song->name }}</h2>

    
    <h4 class="text-center">Duration: {{ gmdate('i:s', $song->duration) }}</h4>
    <h4 class="text-center mb-3">Song by: {{ $song->artist }}</h4>


    @if (in_array($song->id, $queue))
        <form action="/queue/destroy" method="POST">
            @csrf
            <button type="submit" name="songId" value="{{ $song->id }}" class="mx-auto btn btn-danger mb-2 d-block"
                onclick='return confirm(`Are you sure you want to remove "{{ $song->name }}" from your queue?`)'>
                <h4 class="m-0">Remove from queue</h4>
            </button>
        </form>
    @else
        <form action="/queue/store" method="POST">
            @csrf
            <button type="submit" name="songId" value="{{ $song->id }}" class="mx-auto btn btn-secondary mb-2 d-block">
                <h4 class="m-0">Add to queue</h4>
            </button>
        </form>
    @endif

@endsection
