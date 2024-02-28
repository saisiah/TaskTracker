<?php
    session_start();    
    include("config.php");


// Start Add Task Function
    if(isset($_POST["handleAddTask"])){
        // Start Importing Variables
            $title = $_POST['title'];
            $description = $_POST['description'];
            $priority = $_POST['priority'];
            $dueDate = $_POST['dueDate'];
        // End Importing Variables
        
        // Start running query to database
            $add_tasks_query = "INSERT INTO `tasks`(`title`, `description`, `priority`, `dueDate`) VALUES ('$title','$description','$priority','$dueDate')";
            $add_tasks_query_result = mysqli_query($con, $add_tasks_query);
        // End running query to database

        // Start show result if success or failure
            if($add_tasks_query_result){
                $_SESSION['status'] = "Task Added Successfully!";
                $_SESSION['status_code'] = "success";
                header("Location: create-task.php");
                exit();
            }
        // Start show result if success or failure
    }
// End add task

// Start Update Task Function
    if(isset($_POST["handleUpdateTask"])){

        // Start Importing Variables
            $id = $_POST['id'];
            $title = $_POST['title'];
            $description = $_POST['description'];
            $priority = $_POST['priority'];
            $dueDate = $_POST['dueDate'];
        // End Importing Variables

        // Start running query to database
            $update_query = "UPDATE `tasks` SET `title`='$title',`description`='$description',`priority`='$priority',`dueDate`='$dueDate' WHERE `id` = '$id'";

            $update_query_result = mysqli_query($con, $update_query);
        // End Running query to database
    }
// End Update Task


// Start Delete Function
    if(isset($_POST['handleDeleteTask'])){
        
    }
?>