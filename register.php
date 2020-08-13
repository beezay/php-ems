<?php require 'conn.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <title>Register on EMS</title>
</head>

<body>

  <div class="container">
    <div class="panel panel-default">
      <div class="panel-heading">REGISTER</div>
      <form action="" method="POST">
        <table class="table table-bordered">
          <tr>
            <td>Email</td>
            <td><input type="email" name="u_email" required></td>
          </tr>
          <tr>
            <td>Name</td>
            <td><input type="text" name="u_name" required></td>
          </tr>
          <tr>
            <td>Password</td>
            <td><input type="password" name="u_pass" required></td>
          </tr>
          <tr>
            <td></td>
            <td>
              <input type="submit" class="btn btn-sm btn-success" name="u_reg">
              <a class="btn btn-sm btn-danger" href="index.php">Back</a>
            </td>
          </tr>
        </table>
      </form>
    </div>
  </div>


  <?php

if(isset($_POST['u_reg'])){
  $u_email = $_POST['u_email'];
  $u_name = $_POST['u_name'];
  $u_pass = md5($_POST['u_pass']);

  
  $sql = "INSERT INTO users (u_email, u_name, u_pass) VALUES ('$u_email', '$u_name', '$u_pass')";

  if(mysqli_query($conn, $sql)){
    echo "<script>alert('New Record Updated Successfully');</script>";
  }else{
    echo "Error: ".$sql. "<br>" . mysqli_error($conn);
  }
}

?>





  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>