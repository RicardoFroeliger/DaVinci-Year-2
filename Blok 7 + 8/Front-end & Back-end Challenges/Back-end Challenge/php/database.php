<?php

function executeQuery($query, $params = [], $lastId = false) {
    $connection = new PDO('mysql:host=localhost;dbname=year_3_back-end-challenge;', 'root', 'mysql');

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

function createList($newListName) {
    executeQuery(
        'INSERT INTO lists(name) VALUES(:newListName)', 
        [':newListName' => $newListName]
    );
    return header("Refresh:0");
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
    return header("Refresh:0");
}

function createTask($newTaskListId, $newTaskText) {
    executeQuery(
        'INSERT INTO tasks(listId, text) VALUES (:newTaskListId, :newTaskText)',
        [':newTaskListId' => $newTaskListId, ':newTaskText' => $newTaskText]
    );
    return header("Refresh:0");
}

function editTask($editTaskId, $editTaskText) {
    executeQuery(
        'UPDATE tasks SET text=:editTaskText WHERE id=:editTaskId',
        [':editTaskText' => $editTaskText, ':editTaskId' => $editTaskId]
    );
    return header("Refresh:0");
}

function deleteTask($deleteTaskId) {
    executeQuery(
        'DELETE FROM tasks WHERE id=:deleteTaskId',
        [':deleteTaskId' => $deleteTaskId]
    );
    return header("Refresh:0");
}
?>