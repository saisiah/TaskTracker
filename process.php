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
                header("Location: create_task.php");
                exit();
            }
        // Start show result if success or failure
        
    }
// End add task

// Start Update Task Function
    if(isset($_POST['handleUpdateTask'])){

        // Start Importing Variables
            $id = $_POST['id'];
            $title = $_POST['title'];
            $description = $_POST['description'];
            $priority = $_POST['priority'];
            $dueDate = $_POST['dueDate'];
        // End Importing Variables

        // Start running query to database
            $update_query = "UPDATE `tasks` SET `title`='$title',`description`='$description',`priority`='$priority',`dueDate`='$dueDate' WHERE `id` = '$id'";

            $update_query_result = mysqli_query($con, $update_query); // -> Shows result
        // End Running query to database

        // Start show result
            if($update_query_result){
                $_SESSION['status'] = "Task Updated";
                $_SESSION['status_code'] = "Success";
                header("Location: index.php");
                exit();
            };
        // End show result

    };
// End Update Task

// Start Delete Function
    if(isset($_POST['handleDeleteTask'])){
        // Start Importing Variables
            $id = $_POST['id'];
        // End Importing Variables

        // Start running delete query
            $delete_query = "DELETE FROM `tasks` WHERE `id` = '$id'";
        // End running delete query

        // Start checking result
            $delete_query_result = mysqli_query($con, $delete_query);
        // End checking result

        // Start show result
            if($delete_query_result){
                $_SESSION['status'] = "Task Deleted";
                $_SESSION['status_code'] = "Success";
                header("Location: index.php");
                exit();
            };
        // End show result

    };
?>