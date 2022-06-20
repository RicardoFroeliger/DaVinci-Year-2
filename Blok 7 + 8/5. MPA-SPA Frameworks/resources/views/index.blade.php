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
                            <h2><a href="/playlists">Playlists</a></h2>
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
                            @if (count($playlists))
                                @foreach ($playlists as $playlist)
                                    <h4 class="text-center">
                                        <a href="/playlist/{{ $playlist->id }}">
                                            {{ $playlist->name }} | {{ gmdate('H:i:s', $playlist->total_duration) }}
                                        </a>
                                    </h4>
                                @endforeach
                            @else
                                <h4 class="text-center">You have no playlists</h4>
                                <p class="text-center">
                                    To create a playlist, add songs to your queue and then save the queue as playlist.
                                </p>
                            @endif
                        </td>
                    @endauth
                    <td style="vertical-align: top">
                        @if (count($queue))
                            @foreach ($queue as $song)
                                <h4 class="text-center">
                                    <a href="/song/{{ $song->id }}">
                                        {{ $song->name }} | {{ gmdate('i:s', $song->duration) }} | {{ $song->artist }}
                                    </a>
                                </h4>
                            @endforeach
                        @else
                            <h4 class="text-center">Your queue is empty</h4>
                        @endif
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
