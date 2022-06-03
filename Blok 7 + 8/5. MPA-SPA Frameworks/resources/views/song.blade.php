@extends('layouts.app')

@section('content')
    <h1>{{ $song->name }}</h1>
    <br>

    <h3>Duration: {{ gmdate('i:s', $song->duration) }}</h3>
    <h3>Song by: {{ $song->artist }}</h3>
@endsection
