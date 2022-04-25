<? function modals() { ?>
    <div class="modal fade" id="updateModal">
        <div class="modal-dialog">
            <form method="POST">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title MODAL_TITLE">TITLE</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <textarea oninput="this.style.height = ''; this.style.height = (this.scrollHeight + 5) + 'px'"></textarea>
                    </div>
                    <div class="modal-footer">
                    <button type="submit" class="MODAL_SUBMIT MODAL_DELETE btn btn-danger" style="margin-right: auto;" data-bs-dismiss="modal">DELETE</button>

                    <button type="button"class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                    <button type="submit" class="MODAL_SUBMIT MODAL_EDIT btn btn-primary" data-bs-dismiss="modal">EDIT</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="modal fade" id="createModal">
        <div class="modal-dialog">
            <form method="POST">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title MODAL_TITLE">TITLE</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <textarea oninput="this.style.height = ''; this.style.height = (this.scrollHeight + 5) + 'px'"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                        <button type="submit" class="MODAL_SUBMIT btn btn-primary" data-bs-dismiss="modal">CREATE</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<? } ?>