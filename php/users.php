<?php
session_start();
 include_once "config.php";
   $outgoing_id = $_SESSION['user_id'];
 $sql = mysqli_query($conn, "SELECT * FROM users WHERE NOT user_id = {$_SESSION['user_id']}");
 $output = "";
 if(mysqli_num_rows($sql) == 1){
    $output = "No users available";
 }else {
    if(mysqli_num_rows($sql) > 1)
    include "data.php";
    }
 echo $output;
?>