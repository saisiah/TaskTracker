<?php session_start();
include ("config.php");
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
          crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h1 class="text-center">Update Student Data</h1>
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-lg-9">

        <?php
            if(isset($_GET['id']))
            {
                $id = $_GET['id'];
                $update_tasks_query = "SELECT * FROM `tasks` WHERE `id` = '$id'";
                $update_tasks_query_result = mysqli_query($con, $update_tasks_query);

                if(mysqli_num_rows($update_tasks_query_result) > 0)
                {
                    foreach($update_tasks_query_result as $task)
                    {
        ?>
                        <form action="process.php" method="POST">
                            <input type="hidden" name="id" value="<?=$task['id'];?>">
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" class="form-control" id="title" value="<?=$task['title'];?>" name="title">
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="description" class="form-label">First Name</label>
                                    <input type="text" class="form-control" id="description" value="<?=$task['description'];?>" name="description">
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="priority" class="form-label">
                                        Priority
                                    </label>
                                    <select name="priority" id="priority" class="form-control">
                                        <option value="" disabled selected>Current Priority: <?=$task['priority'];?></option>
                                        <option value="Low">Low</option>
                                        <option value="Medium">Medium</option>
                                        <option value="High">High</option>
                                    </select>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="dueDate" class="form-label">Due Date</label>
                                    <input type="date" class="form-control" value="<?=$task['dueDate'];?>" id="dueDate" name="dueDate">
                                </div>
                                <div class="col-md-12 mb-3 text-center">
                                    <button type="submit" class="btn btn-primary" style="float: right;" name="handleUpdateTask">Submit</button>
                                </div>
                            </div>
                        </form>
        </div>
    </div>

    <?php
                }
            }
            else
            {
                ?>
                <h4>No Record Found!</h4>
                <?php
            }
        }
?>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>


<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php
if (isset($_SESSION['status']) && $_SESSION['status_code'] != '' )
{
    ?>
    <script>
        swal({
            title: "<?php echo $_SESSION['status']; ?>",
            icon: "<?php echo $_SESSION['status_code']; ?>",
        });
    </script>
    <?php
    unset($_SESSION['status']);
    unset($_SESSION['status_code']);
}
?>
</body>
</html>
