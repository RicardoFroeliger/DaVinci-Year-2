@extends('layouts.app')

@section('content')
    <button onclick="javascript:history.back()" class="btn btn-secondary ms-4">
        <h4 class="m-0">Back</h4>
    </button>
    <button onclick="window.location ='/'" class="btn btn-secondary ms-4">
        <h4 class="m-0">Home</h4>
    </button>


    <h2 class="text-center">Queue</h2>

    <div class="text-center w-100 mb-3">
        <h4 class="m-0 d-inline-block text-center" style="vertical-align: middle">Total Duration:
            {{ gmdate('H:i:s', $totalDuration) }}</h4>

        @if (count($queue))
            <button type="submit" class="btn btn-secondary ms-3" data-toggle="modal" id="saveAsPlaylistButton"
                data-target="#saveAsPlaylistModal">
                <h4 class="m-0">Save as playlist</h4>
            </button>
        @endif
    </div>


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


    <div class="text-center w-100 mt-3">
        <button onclick="window.location = '/genres'" class="btn btn-primary">
            <h4 class="m-0">Add songs</h4>
        </button>
    </div>


    @if (count($queue))
        <div class="modal fade" id="saveAsPlaylistModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form method="POST" action="/playlist/store">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2 class="modal-title">Save as playlist</h2>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="formInput1">Playlist name</label>
                                <input type="text" name="name" class="form-control mb-3" id="formInput1"
                                    placeholder="Playlist 1">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                <h5 class="m-0">Close</h5>
                            </button>

                            <button type="submit" class="btn btn-primary">
                                <h5 class="m-0">Create playlist</h5>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endif
@endsection
