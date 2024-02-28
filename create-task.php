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

<h1 class="text-center">Insert Student Data</h1>
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-lg-9">

            <!-- Start Form  -->
                <form action="process.php" method ="POST">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" name="title">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="description" class="form-label">Description</label>
                            <input type="text" class="form-control" id="description" name="description">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="priority" class="form-label">Priority</label>
                            <select name="priority" id="priority" class="form-control">
                                <option value="" disabled selected> Select priority</option>
                                <option value="Low">Low</option>
                                <option value="Medium">Medium</option>
                                <option value="High">High</option>
                            </select>
                        </div>

                        <div class="col-md-4 mb-3 ">
                            <label for="dueDate" class="form-label">Due Date</label>
                            <input type="date" class="form-control" id="dueDate" name="dueDate">
                        </div>

                        <div class="col-md-12 mb-3 text-center" style=" justify-content: space-between; display: flex;">
                            <a class="btn btn-primary" style="float: right;" href="index.php">Go Back</a>
                            <button type="submit" class="btn btn-primary" name="handleAddTask" style="float: right;">Submit</button>
                        </div>

                        
                    </div>
                </form>
            <!-- End Form -->

        </div>
    </div>
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
