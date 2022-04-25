
<!-- TODO -->
<!-- 
    *! REQ: sorting functionality first to last / last to first
    * Show error in textarea by invalid input
    * Make an input field instead of textarea when updating list name
    * Actual error handling when validating a create/update request
    * Improve or delete function validating the "create list" input
 -->
 
<?php
    require_once './php/database.php';
    require_once './php/modals.php';

    $allLists = getLists(); 

    if($_SERVER['REQUEST_METHOD'] === 'POST') {

        // Create, edit, delete: Lists
        $createdListName = sanitize($_POST['createdListName']);
        $editedListId = sanitize($_POST['editedListId']);
        $editedListText = sanitize($_POST['editedListText']);
        $deletedListId = sanitize($_POST['deletedListId']);

        if(isset($createdListName) && !empty($createdListName)) createList($createdListName);

        if(isset($editedListId) && !empty($editedListId) &&
            isset($editedListText) && !empty($editedListText)) editList($editedListId, $editedListText);
        
        if(isset($deletedListId) && !empty($deletedListId)) deleteList($deletedListId);



        // Create, edit, delete: Tasks
        $createdTaskListId = sanitize($_POST['createdTaskListId']);
        $createdTaskText = sanitize($_POST['createdTaskText']);
        $editedTaskId = sanitize($_POST['editedTaskId']);
        $editedTaskText = sanitize($_POST['editedTaskText']);
        $deletedTaskId = sanitize($_POST['deletedTaskId']);

        if(isset($createdTaskListId) && !empty($createdTaskListId) &&
            isset($createdTaskText) && !empty($createdTaskText)) createTask($createdTaskListId, $createdTaskText);

        if(isset($editedTaskId) && !empty($editedTaskId) &&
            isset($editedTaskText) && !empty($editedTaskText)) editTask($editedTaskId, $editedTaskText);
        
        if(isset($deletedTaskId) && !empty($deletedTaskId)) deleteTask($deletedTaskId);
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

    <!-- Style & Script -->
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
                        <div data-bs-toggle="modal" data-bs-target="#updateModal" style="display: inline-block"
                        onclick="return updateListModal(<?=$list['id']?>, '<?=$list['name']?>')">

                            <h1 title=<?=$list['name']?>><?=$list['name']?></h1> 
                            <span class="LIST_UPDATE_BUTTON">
                                <h1><i class="fas fa-pencil-alt"></i></h1>
                            </span>
                        </div>
                    </div>

                    <div class="LIST_TASKS">
                        <? foreach(getListTasks($list['id']) as $task) { ?>
                        <div class="TASK" data-bs-toggle="modal" data-bs-target="#updateModal" onclick="return updateTaskModal(<?=$task['id']?>, '<?=$task['text']?>', '<?=$list['name']?>')">
                            <h1><?=$task['text']?></h1>
                        </div>
                        <? } ?>
                    </div>

                    <div class="LIST_FOOTER">
                        <div data-bs-toggle="modal" data-bs-target="#createModal" 
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
                            <input id="createListInput" type="text" class="form-control" name="createdListName" placeholder="Enter name of new list..."> 

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