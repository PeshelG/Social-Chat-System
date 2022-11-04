<?php

while($row = mysqli_fetch_assoc($sql)){
    $sql2=mysqli_query($conn, "SELECT * FROM messages WHERE (outgoing_msg_id = {$row['user_id']} OR incoming_msg_id = {$row['user_id']})
     AND (outgoing_msg_id = '$outgoing_id' OR outgoing_msg_id = '$outgoing_id') ORDER BY msg_id DESC LIMIT 1");
     if($sql2){
         $row2 = mysqli_fetch_assoc($sql2);
         if(mysqli_num_rows($sql2)>0){
            $result = $row2['message'];
         }else{
             $result = "No messages available";
         }
     }
       (strlen($result) > 20) ? $msg = substr($result, 0, 28)."..." : $msg = $result;
       //($outgoing_id == $row2['outgoing_msg_id']) ? $you = "YOU: " : $you = "";
        
        
        
        $output .= '<div class="users_list">
                    <a href="chat.php?user_id='. $row['user_id'].'">
                        <img src="php/profileImg/'.$row['user_img'] .'">
                        <div class="user">
                        <label>'. $row['user_uid']. '</label>
                        <label>'.$msg.'</label>
                        </div>
                        <p>'.$row['status'].'</p>
                    </a>
                    </div>';
}
?>