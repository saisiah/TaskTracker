<?php
session_start();    
include("config.php");


if(isset($_POST["createButton"])){

    $title = $_POST['title'];
    $description = $_POST['description'];
    $priority = $_POST['priority'];
    $dueDate = $_POST['dueDate'];

    $insert = "INSERT INTO `tasks`(`title`, `description`, `priority`, `dueDate`) VALUES ('$title','$description','$priority','$priority','$dueDate')";
    $login_result = mysqli_query($con, $insert);

    if($login_result){
            $_SESSION['status'] = "Welcome!";
            $_SESSION['status_code'] = "success";
            header("Location: index.php");
            exit();
    }else{
        $_SESSION['status'] = "Lacking input";
        $_SESSION['status_code'] = "error";
        header("Location: createTask.php");
        exit();
    }
}


if(isset($_POST["addTask"])){

    $title = $_POST['title'];
    $description = $_POST['description'];
    $priority = $_POST['priority'];
    $dueDate = $_POST['dueDate'];

    $check_email_query = "SELECT * FROM `task` WHERE `email` = '$email'";
    $email_result = mysqli_query($con,$check_email_query);
    $email_count = mysqli_fetch_array($email_result)[0];

    if($email_count > 0){
        $_SESSION['status'] = "Email address already taken";
        $_SESSION['status_code'] = "error";
        header("Location: register.php");
        exit();
    }

    if ($password !== $repassword){
        $_SESSION['status'] = "Password does not match";
        $_SESSION['status_code'] = "error";
        header("Location: register.php");
        exit();
    }


    $query = "INSERT INTO `user`(`email`, `password`, `fname`, `mname`, `lname`) VALUES ('$email','$password','$fname','$mname','$lname')";
    $query_result = mysqli_query( $con, $query );

    if($query_result){
        $_SESSION['status'] = "Registration Sucess!";
        $_SESSION['status_code'] = "success";
        header("Location: login.php");
        exit();
    }
}


if(isset($_POST["createButton"])){

    $title = $_POST['title'];
    $description = $_POST['description'];
    $priority = $_POST['priority'];
    $dueDate = $_POST['dueDate'];

    $insert = "INSERT INTO `tasks`(`title`, `description`, `priority`, `dueDate`) VALUES ('$title','$description','$priority','$priority','$dueDate')";
    $login_result = mysqli_query($con, $insert);

    if($login_result){
            $_SESSION['status'] = "Welcome!";
            $_SESSION['status_code'] = "success";
            header("Location: index.php");
            exit();
    }else{
        $_SESSION['status'] = "Invalid Username/Password";
        $_SESSION['status_code'] = "error";
        header("Location: editTask.php");
        exit();
    }
}

?>