<?php
    require_once './php/database.php';

    $allLists = getLists('lists'); 
    
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $newlistName = sanitize($_POST['newListName']);
        $deletedListId = sanitize($_POST['deletedListId']);

        if(isset($newlistName) && !empty($newlistName)) createList($newlistName);
        if(isset($deletedListId) && !empty($deletedListId)) deleteList($deletedListId);
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/8254289b72.js" crossorigin="anonymous"></script>
    <title>Document</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <main class="container">
        <div class="row">
            <? foreach($allLists as $list) { ?>
            <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                <div class="LIST">
                    <div class="LIST_HEADER">
                        <h1 title=<?=$list['name']?>><?=$list['name']?></h1>       
                        <span class="LIST_DELETE_BUTTON">
                            <form method="POST">
                                <button type="submit" name="deletedListId" value=<?=$list['id']?>>
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>    
                        </span>
                    </div>

                    <div class="LIST_TASKS">
                        <div class="TASK">
                            <h1>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur, atque? Excepturi reiciendis aliquid aspernatur sunt perferendis.</h1>
                        </div>
                        <div class="TASK">
                            <h1>Dicta iusto aspernatur consequuntur harum, veritatis dignissimos veniam, molestias dolor in ex aliquid eaque.</h1>
                        </div>
                    </div>
                </div>
            </div>
            <? } ?>
            <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                <div class="CREATE_NEW_LIST">
                    <div class="LIST_HEADER">
                        <h1>
                            <i class="fas fa-plus"></i>
                            New list
                        </h1>
                    </div>
                    <form method="POST">
                        <div class="form-group">
                            <input type="text" class="form-control" name="newListName" placeholder="Enter name of new list..." style="display: block"> 
                            <input class="btn btn-primary" type="submit" value="Create" style="display: inline-block">
                            <button class="btn btn-secondary">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>

</html>