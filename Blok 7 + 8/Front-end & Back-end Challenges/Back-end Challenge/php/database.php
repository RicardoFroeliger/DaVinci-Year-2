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

function getLists($table, $orderBy = 'id') {
    return executeQuery("SELECT * FROM $table ORDER BY $orderBy");
}

function createList($newListName) {
    executeQuery(
        'INSERT INTO lists(name) VALUES(:newListName)', 
        [':newListName' => sanitize($newListName)]
    );
    return header("Refresh:0");
}

function deleteList($deletedListId) {
    // echo '<script>confirm(\'hi\')</script>';
    executeQuery(
        'DELETE FROM lists WHERE id=:id', 
        [':id' => sanitize($deletedListId)]
    );
    return header("Refresh:0");
}

?>