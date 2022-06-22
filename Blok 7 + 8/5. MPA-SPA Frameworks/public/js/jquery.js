let modals = ['saveAsPlaylist', 'managePlaylist', 'managePlaylistSongs'];

modals.forEach(modal => {
    $(document).on('click', `#${modal}Button`, function(event) {
        event.preventDefault();
        let href = $(this).attr('data-attr');
        $.ajax({
            url: href,
            beforeSend: () => $('#loader').show(),
            success: () => $(`#${modal}Modal`).modal('show'),
            complete: () => $('#loader').hide(),
            error: function(jqXHR, testStatus, error) {
                console.log(error);
                alert("Page " + href + " cannot open. Error:" + error);
                $('#loader').hide();
            },
            timeout: 8000
        });
    });    
});


$('[name="songPlaylistActionRadio"]').on('change', function() {
    let state = this.id == 'songPlaylistAdd';

    $('[name="songAddPlaylistsSelect"]').toggle(state);
    $('[name="songRemovePlaylistsSelect"]').toggle(!state);

    $('#playlistAddSong').toggle(state);
    $('#playlistRemoveSong').toggle(!state);
});