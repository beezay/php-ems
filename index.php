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
    <title>Beezay Networking</title>
</head>
<body>

<div class="container">
<h3>Hello!, Welcome to Beezay Networking</h3>
<form action="" method="POST" >
        <table>
            <tr>
            <td>Email</td>
            <td><input type="email" name="u_email" required></td>
            </tr>
            <tr>
            <td>Password</td>
            <td><input type="password" name="u_pass" required></td>
            </tr>
            <td></td>
            <td><input type="submit" name="u_login"></td>
            </tr>
        </table>
        <h4>No Account</h4>
        <button><a class="btn btn-success" href="register.php">Register</a></button>
    </form>
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