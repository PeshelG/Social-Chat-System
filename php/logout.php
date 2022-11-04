<?php
if(isset($_SESSION['user_id'])){
    include_once "config.php";
    $status ="Offline";
    $sql = mysqli_query($conn, "UPDATE users SET status = '$status' WHERE user_id = {$_SESSION['user_id']}");
    if($sql){
        session_unset();
        session_destroy();
        header("Location: ../login.php");
    } else{
        header("Location: ../login.php");
    }
    
}else{
    header("Location: ../login.php");
}
    
?>