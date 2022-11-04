<?php
 session_start();
 include_once "config.php";

 $user_name =mysqli_real_escape_string($conn, $_POST['user_uid']);
 $user_pwd =mysqli_real_escape_string($conn, $_POST['user_pwd']);

 if(!empty($user_name) && !empty($user_pwd)){
        $sql = mysqli_query($conn, "SELECT * FROM users WHERE user_email = '$user_name' OR user_uid = '$user_name';");
        if(mysqli_num_rows($sql) > 0){
            $sql2 = mysqli_query($conn, "SELECT * FROM users WHERE (user_email = '$user_name' OR user_uid = '$user_name') AND user_pwd = '$user_pwd';");
            if($sql2){
              if(mysqli_num_rows($sql2) > 0){
                $row = mysqli_fetch_assoc($sql2);
                $status = "Online";
                //$sql8 = mysqli_query($conn, "UPDATE users SET status = '$status' WHERE user_uid = {$row['user_uid']}");
                //if($sql8){
                     $_SESSION['user_id'] = $row['user_id'];
                    echo "success";
               // }  
            }else{
                echo "Wrong Password";
            }
            }
              
        }else{
             echo "Account does not exist!";
            }
   
}else{
    echo "All input fields are required";
 }
    
      

?>