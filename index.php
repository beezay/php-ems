<?php 
require 'conn.php';

session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Employee Managemet System(EMS) </title>
</head>

<body>

    <div class="container">
        <h3 class="display-4 text-success">Hello!, Welcome to Beezay EMS</h3>
        <div class="panel panel-default">
            <div class="panel-heading">Login</div>
            <div class="panel-body">
                <form action="" method="POST">
                    <div class="form-group">
                        <input type="text" class="form-control input-sm" name="u_email" placeholder="User Email"
                            required>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control input-sm" name="u_pass" placeholder="User Password"
                            required>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-sm btn-success" name="u_login" value="LOGIN">
                    </div>
                    <p class="lead text-primary">No Account</p>
                    <div class="form-group">
                        <a class="btn btn-warning" href="register.php">Register</a>
                    </div>

                </form>
            </div>
        </div>
    </div>


    <?php

if(isset($_POST['u_login'])){
    $u_email = $_POST['u_email'];
    $u_pass = md5($_POST['u_pass']);

    $sql = "SELECT * FROM users WHERE u_email='$u_email'";
    $result = mysqli_query($conn, $sql);
    
    if(mysqli_num_rows($result)> 0){
        
        while($user = mysqli_fetch_assoc($result)){
            if($u_email == $user['u_email'] && $u_pass == $user['u_pass']){
                $_SESSION['u_email'] = $u_email;
                header('Location: dashboard.php');
            }else{
                echo "Some Error Persists. Please check.";
            }
        }
    }
}
?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>