<?php
session_start();
if(isset($_SESSION['user_id'])){
    include_once "config.php";
    $outgoing_id = mysqli_real_escape_string($conn, $_POST['outgoing_id']);
    $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
    $output = "";

    $sql=mysqli_query($conn, "SELECT * FROM messages WHERE (outgoing_msg_id = '$outgoing_id' AND incoming_msg_id = '$incoming_id') OR (outgoing_msg_id = '$incoming_id' AND incoming_msg_id = '$outgoing_id') ORDER BY msg_id ASC");
    if(mysqli_num_rows($sql)>0){
        while($row = mysqli_fetch_assoc($sql)){
            if($row['outgoing_msg_id'] === $outgoing_id){// is sender
                $output .= '<div class="chat outgoing">
                            <div class="details">
                            <p>'.$row['message'].'</p>
                            </div>
                            </div>';
            }else{ //is receiver
                $output .= '<div class="chat incoming">
                            <div class="details">
                            <p>'.$row['message'].'</p>
                            </div>
                            </div>';
            }
        }

    }else{
        $output = "No messages yet..";
    }
   
}else{
    header("Location: ../login.php");
}
echo $output;
?>