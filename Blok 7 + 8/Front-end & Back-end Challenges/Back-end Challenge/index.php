<?php
    require './php/database.php';

    $lists = getLists('lists');    
?>

<!-- <pre> -->
<!-- <? var_dump($lists);?> -->
<!-- </pre> -->

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

    <title>Document</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <main class="container">
        <div class="row">
            <?php for($i = 0; $i < 6; $i++) { ?>
            <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                <div class="LIST">
                    <div class="LIST_NAME">
                        <h1>List name</h1>
                    </div>

                    <div class="LIST_TASKS">
                        <div class="TASK">
                            <h1>st corporis fugiat quod. Reiciendis in illum praesentium consequatur nostrum. Molestias,
                                voluptatum.</h1>
                        </div>
                        <div class="TASK">
                            <h1>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Recusandae beatae laborio</h1>
                        </div>
                        <div class="TASK">
                            <h1>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Reiciendis ipsa magni maxime
                                enim temporibus, officiis voluptates, est veniam iusto eum nam sunt debitis explicabo,
                                dicta quibusdam quis! Quibusdam, alias nulla?</h1>
                        </div>
                    </div>
                </div>
            </div>
            <? } ?>
        </div>
    </main>
</body>

</html>