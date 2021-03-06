<div class="modal fade" id="managePlaylistSongsModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">

        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Manage playlists</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="songPlaylistActionRadio" id="songPlaylistAdd"
                        checked>
                    <label class="form-check-label" for="songPlaylistAdd">Add song to playlist</label>
                </div>
                <div class="form-check mb-3">
                    <input class="form-check-input" type="radio" name="songPlaylistActionRadio"
                        id="songPlaylistRemove">
                    <label class="form-check-label" for="songPlaylistRemove">Remove song from playlist</label>
                </div>

                <select class="form-select" name="songAddPlaylistsSelect" form="playlistAddSong">
                    <option value="0" selected>Open this select menu</option>
                    @foreach ($notInPlaylists as $playlist)
                        <option value="{{ $playlist->id }}">
                            {{ $playlist->name }} | {{ gmdate('H:i:s', $playlist->total_duration) }}</option>
                    @endforeach
                </select>

                <select class="form-select" name="songRemovePlaylistsSelect" form="playlistRemoveSong" style="display: none">
                    <option value="0" selected>Open this select menu</option>
                    @foreach ($inPlaylists as $playlist)
                        <option value="{{ $playlist->id }}">
                            {{ $playlist->name }} | {{ gmdate('H:i:s', $playlist->total_duration) }}</option>
                    @endforeach
                </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <h5 class="m-0">Close</h5>
                </button>

                <form method="POST" id="playlistAddSong" action="/playlist_song/{{ $song->id }}/store">
                    @csrf
                    <button type="submit" class="btn btn-primary">
                        <h5 class="m-0">Add song</h5>
                    </button>
                </form>

                <form method="POST" id="playlistRemoveSong" action="/playlist_song/{{ $song->id }}/destroy" style="display: none">
                    @csrf
                    <button type="submit" class="btn btn-danger" onclick='return confirm(`Are you sure you want to remove "{{ $song->name }}" from this playlist?`)'>
                        <h5 class="m-0">Remove song</h5>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>