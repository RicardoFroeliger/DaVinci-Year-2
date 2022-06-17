@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center mb-5">Jukebox</h1>
        <table class="w-100">
            <colgroup>
                @auth
                    <col style="width: 33.333%">
                    <col style="width: 33.333%">
                    <col style="width: 33.333%">
                @else
                    <col style="width: 50%">
                    <col style="width: 50%">
                @endauth
            </colgroup>
            <tbody class="text-center">
                <tr>
                    <td>
                        <h2><a href="/genres">Genres</a></h2>
                    </td>
                    @auth
                        <td>
                            <h2>Playlists</h2>
                        </td>
                    @endauth
                    <td>
                        <h2><a href="/queue">Queue</a></h2>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">&nbsp;</td>
                </tr>
                <tr>
                    <td style="vertical-align: top">
                        @foreach ($genres as $genre)
                            <h4><a href="/genre/{{ $genre->id }}">{{ $genre->name }}</a></h4>
                        @endforeach
                    </td>
                    @auth
                        <td style="vertical-align: top">
                            @foreach ($genres as $genre)
                                <h4><a href="/genre/{{ $genre->id }}">{{ $genre->name }}</a></h4>
                            @endforeach
                        </td>
                    @endauth
                    <td style="vertical-align: top">
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
                </tr>
            </tbody>
        </table>
    </div>
@endsection
