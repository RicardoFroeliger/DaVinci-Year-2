function validateCreateListInput() {
    let input = document.querySelector('#createListInput').value;
    let errorSpan = document.querySelector('#createListError');

    if(input.length < 1) errorSpan.innerText = 'Input cannot be empty!';
    return input.length > 0;
}

function createTaskModal(listId, listName) {
    document.querySelector('#createTaskModal .MODAL_TITLE').innerText = `Create a task on list: ${listName}`;
    document.querySelector('#createTaskModal .MODAL_SUBMIT').value = listId;
}

function updateTaskModal(taskId, taskText, listName) {
    document.querySelector('#updateTaskModal .MODAL_TITLE').innerText = `Edit or delete this task on list: ${listName}`;
    document.querySelectorAll('#updateTaskModal .MODAL_SUBMIT').forEach(x => x.value = taskId);
    document.querySelector('#updateTaskModal .MODAL_TEXT').value = taskText;
}