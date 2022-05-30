@extends('layouts.app')

@section('content')

@foreach ($genres as $genre)
    <h1><a href="/genres/{{$genre->id}}">{{$genre->name}}</a></h1>
@endforeach

@endsection
