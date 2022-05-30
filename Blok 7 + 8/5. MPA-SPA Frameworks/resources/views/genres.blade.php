@extends('layouts.app')

@section('content')

@foreach ($genres as $genre)
    <h1><a href="/genres/{{$genre['url']}}">{{$genre['name']}}</a></h1>
@endforeach

@endsection
