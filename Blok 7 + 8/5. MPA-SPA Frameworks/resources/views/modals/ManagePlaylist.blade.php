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
                        onclick='return confirm(`Are you sure you want to delete playlist: "{{ $playlist->name }}"?\nThis playlist has a total duration of {{ gmdate("H:i:s", $playlist->total_duration) }}.`)'>
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