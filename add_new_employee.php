<?php
require 'conn.php';

session_start();

if((!$_SESSION['u_email'])){
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <title>DashBoard</title>
</head>

<body>
    <p><a class="btn btn-danger" href="logout.php">LogOut</a></p>
    <h3>Welcome to the DashBoard <?php echo $_SESSION['u_email'];?></h3>

    <!-- NAVBAR  -->
    <?php
        require 'nav.php';
    ?>
    <!-- NAVBAR  -->

    <!-- Main Content  -->
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Employees
                    </div>
                    <ul class="list-group">
                        <li class="list-group-item"><a href="add_new_employee.php">Add New Employee</a></li>
                        <li class="list-group-item"><a href="dashboard.php">View All Employees</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-9 col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">Add Employee</div>
                <div class="panel-body">
                    <form action="" method="POST">
                        <div class="form-group">
                            <input type="text" class="form-control input-sm" name="e_name" placeholder="Employee Name" required>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control input-sm" name="e_email" placeholder="Employee Email" required>
                        </div>
                        <div class="form-group">
                            <input type="tel" class="form-control input-sm" name="e_phone" placeholder="Employee Phone" required>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-sm btn-success" value="Add Employee" name="e_add">
                        </div>
                    </form>
                </div>
            </div>
            </div>
        </div>
    </div>

    <!-- Main Content  -->

    <?php
    
        if(isset($_POST['e_add'])){
            $e_name = $_POST['e_name'];
            $e_email = $_POST['e_email'];
            $e_phone = $_POST['e_phone'];

            $sql = "INSERT INTO employees (e_name, e_email, e_phone) VALUES ('$e_name', '$e_email', '$e_phone')";

            if(mysqli_query($conn, $sql)){
                header('Location: dashboard.php');
            }else{
                echo "Error: ". $sql ."<br>" . mysqli_error($conn);
            }
        }
    
    ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>