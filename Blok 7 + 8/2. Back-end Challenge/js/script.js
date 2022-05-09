const createModal = document.querySelector('#createModal');
const updateModal = document.querySelector('#updateModal');

function validateCreateListInput() {
    let input = document.querySelector('#createListInput').value;
    let errorSpan = document.querySelector('#createListError');

    if (input.length < 1) errorSpan.innerText = 'Input cannot be empty!';
    return input.length > 0;
}

function updateListModal(listId, listName) {
    updateModal.querySelector('.MODAL_TITLE').innerText = `Update this list: ${listName}`;
    
    let textarea = updateModal.querySelector('textarea');
    textarea.name = 'editedListText';
    textarea.value = listName;

    let editButton = updateModal.querySelector('.MODAL_EDIT')
    editButton.innerText = 'Edit list';
    editButton.name = 'editedListId';
    editButton.value = listId;

    let deleteButton = updateModal.querySelector('.MODAL_DELETE');
    deleteButton.innerText = 'Delete list';
    deleteButton.name = 'deletedListId';
    deleteButton.value = listId;
}

function createTaskModal(listId, listName) {
    createModal.querySelector('.MODAL_TITLE').innerText = `Create a task on list: ${listName}`;
    createModal.querySelector('textarea').name = 'createdTaskText';

    let createButton = createModal.querySelector('.MODAL_SUBMIT');
    createButton.innerHTML = 'Create task';
    createButton.name = 'createdTaskListId';
    createButton.value = listId;
}

function updateTaskModal(taskId, taskText, listName) {
    updateModal.querySelector('.MODAL_TITLE').innerText = `Update this task on list: ${listName}`;

    let textarea = updateModal.querySelector('textarea');
    textarea.name = 'editedTaskText';
    textarea.value = taskText;

    let editButton = updateModal.querySelector('.MODAL_EDIT')
    editButton.innerText = 'Edit task';
    editButton.name = 'editedTaskId';
    editButton.value = taskId;

    let deleteButton = updateModal.querySelector('.MODAL_DELETE');
    deleteButton.innerText = 'Delete task';
    deleteButton.name = 'deletedTaskId';
    deleteButton.value = taskId;
}