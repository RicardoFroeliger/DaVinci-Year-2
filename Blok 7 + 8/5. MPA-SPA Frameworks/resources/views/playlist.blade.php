@extends('layouts.app')

@section('content')
    <button onclick="javascript:history.back()" class="btn btn-secondary ms-4">
        <h4 class="m-0">Back</h4>
    </button>
    <button onclick="window.location ='/'" class="btn btn-secondary ms-4">
        <h4 class="m-0">Home</h4>
    </button>


    <h2 class="text-center">{{ $playlist->name }}</h2>

    <div class="text-center w-100 mb-3">
        <h4 class="m-0 d-inline-block text-center" style="vertical-align: middle">Total Duration:
            {{ gmdate('H:i:s', $playlist->total_duration) }}</h4>

        <button type="submit" class="btn btn-secondary ms-3" data-toggle="modal" id="managePlaylistButton"
            data-target="#managePlaylistModal">
            <h4 class="m-0">Manage</h4>
        </button>
    </div>


    @foreach ($songs as $song)
        <h4 class="text-center">
            <a href="/song/{{ $song->id }}">
                {{ $song->name }} | {{ gmdate('i:s', $song->duration) }} | {{ $song->artist }}
            </a>
            <a href="/playlist/">X</a>
        </h4>
    @endforeach


    <div class="text-center w-100 mt-3">
        <button onclick="window.location = '/genres'" class="btn btn-primary">
            <h4 class="m-0">Add songs</h4>
        </button>
    </div>


    <div class="modal fade" id="managePlaylistModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">

            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">Manage playlist</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="playlistName">Playlist name</label>
                        <input form="savePlaylistChanges" type="text" name="playlistName" class="form-control mb-3" id="playlistName"
                            placeholder="Playlist 1" value="{{ $playlist->name }}">
                    </div>
                </div>
                <div class="modal-footer">
                    <form method="POST" style="margin-right: auto;" action="/playlist/{{ $playlist->id }}/destroy">
                        @csrf
                        <button type="submit" class="btn btn-danger"
                            onclick='return confirm(`Are you sure you want to delete playlist: "{{ $playlist->name }}"?\nThis playlist has a total duration of {{ gmdate(`H:i:s`, $playlist->total_duration) }}.`)'>
                            <h5 class="m-0">Delete playlist</h5>
                        </button>
                    </form>

                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <h5 class="m-0">Close</h5>
                    </button>

                    <form method="POST" id="savePlaylistChanges" action="/playlist/{{ $playlist->id }}/update">
                        @csrf
                        <button type="submit" class="btn btn-primary">
                            <h5 class="m-0">Save changes</h5>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
