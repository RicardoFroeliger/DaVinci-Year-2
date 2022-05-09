<?php

function executeQuery($query, $params = [], $lastId = false) {
    $connection = new PDO('mysql:host=localhost;dbname=back-end-challenge;', 'root', 'mysql');

    $data = $connection->prepare($query);
    $data ->execute($params);
    $data = $data->fetchAll();

    $last_id = $connection->lastInsertId();
    $connection = null;

    return $lastId ? [$data, $last_id] : $data;
}

function sanitize($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}



function getLists() {
    return executeQuery('SELECT * FROM lists ORDER BY id');
}

function getListTasks($listId) {
    return executeQuery(
        'SELECT * FROM tasks WHERE listId=:listId ORDER BY id',
        [':listId' => $listId]
    );
}



function createList($createdListName) {
    executeQuery(
        'INSERT INTO lists(name) VALUES(:name)', 
        [':name' => $createdListName]
    );
    return header('Refresh:0');
}

function editList($editedListId, $editedListName) {
    executeQuery(
        'UPDATE lists SET name=:name WHERE id=:id',
        [':id' => $editedListId, ':name' => $editedListName, ]
    );
    return header('Refresh:0');
}

function deleteList($deletedListId) {
    executeQuery(
        'DELETE FROM lists WHERE id=:id', 
        [':id' => $deletedListId]
    );
    executeQuery(
        'DELETE FROM tasks WHERE listId=:id', 
        [':id' => $deletedListId]
    );
    return header('Refresh:0');
}

function createTask($createdTaskListId, $createdTaskText) {
    executeQuery(
        'INSERT INTO tasks(listId, text) VALUES (:listId, :text)',
        [':listId' => $createdTaskListId, ':text' => $createdTaskText]
    );
    return header('Refresh:0');
}

function editTask($editedTaskId, $editedTaskText) {
    executeQuery(
        'UPDATE tasks SET text=:text WHERE id=:id',
        [':id' => $editedTaskId, ':text' => $editedTaskText]
    );
    return header('Refresh:0');
}

function deleteTask($deletedTaskId) {
    echo 'hi';
    executeQuery(
        'DELETE FROM tasks WHERE id=:id',
        [':id' => $deletedTaskId]
    );
    return header('Refresh:0');
}
?>