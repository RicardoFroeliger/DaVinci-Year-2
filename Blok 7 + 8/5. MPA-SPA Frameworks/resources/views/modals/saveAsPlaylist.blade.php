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
                        <label for="playlistName">Playlist name</label>
                        <input type="text" name="playlistName" class="form-control mb-3" id="playlistName" placeholder="Playlist 1">
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