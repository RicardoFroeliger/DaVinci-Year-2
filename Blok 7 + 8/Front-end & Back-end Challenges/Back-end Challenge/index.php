<?php
    require_once './php/database.php';
    require_once './php/modals.php';

    $allLists = getLists(); 

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Create List
        $newlistName = sanitize($_POST['newListName']);
        if(isset($newlistName) && !empty($newlistName)) createList($newlistName);

        // Delete List
        $deletedListId = sanitize($_POST['deletedListId']);
        if(isset($deletedListId) && !empty($deletedListId)) deleteList($deletedListId);

        // Create Task
        $newTaskListId = sanitize($_POST['newTaskListId']);
        $newTaskText = sanitize($_POST['newTaskText']);
        if(isset($newTaskListId) && !empty($newTaskListId) &&
            isset($newTaskText) && !empty($newTaskText)) createTask($newTaskListId, $newTaskText);

        // Edit Task
        $editTaskId = sanitize($_POST['editTaskId']);
        $editTaskText = sanitize($_POST['editTaskText']);
        if(isset($editTaskId) && !empty($editTaskId) &&
            isset($editTaskText) && !empty($editTaskText)) editTask($editTaskId, $editTaskText);

        // Delete Task
        $deleteTaskId = sanitize($_POST['deleteTaskId']);
        if(isset($deleteTaskId) && !empty($deleteTaskId)) deleteTask($deleteTaskId, $deleteTaskId);
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>

    <!-- Font Awesome -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/8254289b72.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="./css/style.css">
    <script src="./js/script.js" defer></script>
    <title>Back-end Challenge</title>
</head>

<body>
    <?=modals()?>

    <main class="container">
        <div class="row">
            <? foreach($allLists as $list) { ?>
            <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                <div class="LIST">
                    <div class="LIST_HEADER">
                        <h1 title=<?=$list['name']?>><?=$list['name']?></h1>       
                        <span class="LIST_DELETE_BUTTON">
                            <form method="POST">
                                <button type="submit" name="deletedListId" value=<?=$list['id']?> onclick="return confirm('Are you sure you want to delete list: <?=$list['name']?> and its tasks?')">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>    
                        </span>
                    </div>
                    <div class="LIST_TASKS">
                        <? foreach(getListTasks($list['id']) as $task) { ?>
                        <div class="TASK" data-bs-toggle="modal" data-bs-target="#updateTaskModal" onclick="return updateTaskModal(<?=$task['id']?>, '<?=$task['text']?>', '<?=$list['name']?>')">
                            <h1><?=$task['text']?></h1>
                        </div>
                        <? } ?>
                    </div>
                    <div class="LIST_FOOTER">
                        <div data-bs-toggle="modal" data-bs-target="#createTaskModal" 
                        onclick="return createTaskModal(<?=$list['id']?>, '<?=$list['name']?>')">
                            <h1><i class="fas fa-plus"></i> New task</h1>
                        </div>
                    </div>
                </div>
            </div>
            <? } ?>
            <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                <div class="CREATE_NEW_LIST">
                    <div class="LIST_HEADER">
                        <h1><i class="fas fa-plus"></i> New list</h1>
                    </div>
                    <form method="POST">
                        <div class="form-group">
                            <input id="createListInput" type="text" class="form-control" name="newListName" placeholder="Enter name of new list..."> 
                            <input class="btn btn-primary" type="submit" value="Create" style="display: inline-block" 
                            onclick="return validateCreateListInput()">
                            <span style="color: red" id="createListError"></span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>

</html>