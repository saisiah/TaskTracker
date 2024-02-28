<?php session_start();
    include ("config.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $view_task_query = "SELECT * FROM `tasks` WHERE `id` = '$id'";
            $view_task_query_result = mysqli_query($con, $view_task_query);

            if(mysqli_num_rows($view_task_query_result) > 0){
                foreach($view_task_query_result as $result){
        ?>
            <div class="content">
                <div class="view">
                    <h1>
                        <?=$result['title'];?>
                    </h1>
                    <h1>
                        <?=$result['description'];?>
                    </h1>
                    <h1>
                        <?=$result['priority'];?>
                    </h1>
                    <h1>
                        <?=$result['dueDate'];?>
                    </h1>
                </div>
            </div>
        <?php 
                }
            }
        }
        ?>

        
    
    
</body>
</html>