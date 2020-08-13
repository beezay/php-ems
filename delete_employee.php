<?php 

require 'conn.php'; 
$id = $_GET['e_id'];
$sql = "DELETE FROM employees WHERE e_id='$id'";

if(mysqli_query($conn, $sql)){
            
    header('Location: dashboard.php');
}else{
    echo "Error: ".$sql. "<br>" . mysqli_error($conn);
}
?>