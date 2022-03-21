<? function modals() { ?>
    <div class="modal fade" id="createTaskModal">
        <div class="modal-dialog">
            <form method="POST">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title MODAL_TITLE">Create a task on list: </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <textarea name="newTaskText" oninput="this.style.height = ''; this.style.height = (this.scrollHeight + 5) + 'px'"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button"class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="MODAL_SUBMIT btn btn-primary" name="newTaskListId" data-bs-dismiss="modal">Create task</button>
                </div>
                </div>
            </form>
        </div>
    </div>

    <div class="modal fade" id="updateTaskModal">
        <div class="modal-dialog">
            <form method="POST">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title MODAL_TITLE">Edit or delete task on list: </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <textarea class="MODAL_TEXT" name="editTaskText" oninput="this.style.height = ''; this.style.height = (this.scrollHeight + 5) + 'px'"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="MODAL_SUBMIT btn btn-danger" name="deleteTaskId" style="margin-right: auto;" data-bs-dismiss="modal">Delete Task</button>
                    <button type="button"class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="MODAL_SUBMIT btn btn-primary" name="editTaskId" data-bs-dismiss="modal">Edit task</button>
                </div>
                </div>
            </form>
        </div>
    </div>
<? } ?>