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
                <div class="panel-heading">Employees List</div>
                <table class="table table-bordered">
                    <?php
                        $id = $_GET['e_id'];
                        $sql = "SELECT * FROM employees WHERE e_id='$id'";
                        $result = mysqli_query($conn, $sql);
                        
                        if(mysqli_num_rows($result)> 0){
                            
                            while($employee = mysqli_fetch_assoc($result)){ ?>

                            <tr>
                                <th>Name</th>
                                <td><?php echo $employee['e_name'] ?></td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td><?php echo $employee['e_email'] ?></td>
                            </tr> 
                            <tr>
                                <th>Phone</th>
                                <td><?php echo $employee['e_phone'] ?></td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="edit_employee.php?e_id=<?php echo $employee['e_id'] ?>" class="btn btn-xs btn-warning">Edit</a>
                                    <a href="delete_employee.php?e_id=<?php echo $employee['e_id']; ?>" class="btn btn-xs btn-danger">Delete</a>
                                </td>
                            </tr>
                            <?php }
                        }
                    ?>
                </table>
            </div>
            </div>
        </div>
    </div>

    <!-- Main Content  -->


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>