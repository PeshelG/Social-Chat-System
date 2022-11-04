<?php
 session_start();
 include_once "config.php";

 $user_fname =mysqli_real_escape_string($conn, $_POST['user_fname']);
 $user_lname =mysqli_real_escape_string($conn, $_POST['user_lname']);
 $user_email =mysqli_real_escape_string($conn, $_POST['user_email']);
 $user_uid =mysqli_real_escape_string($conn, $_POST['user_uid']);
 $user_pwd =mysqli_real_escape_string($conn, $_POST['user_pwd']);

 if(!empty($user_fname) && !empty($user_lname) && !empty($user_email) && !empty($user_uid) && !empty($user_pwd)){
    if(filter_var($user_email, FILTER_VALIDATE_EMAIL)){
        $sql = mysqli_query($conn, "SELECT * FROM users WHERE user_email = '$user_email';");
        if(mysqli_num_rows($sql) > 0){
            //Validating email
            echo "$user_email - Email already exist";
        }else{
            //Checking for username
            $sql2 = mysqli_query($conn, "SELECT * FROM users WHERE user_uid = '$user_uid';");
            if(mysqli_num_rows($sql2)>0){
                echo "$user_uid - Username already exist";
            }else{
                //Checking for image file
                if(isset($_FILES['user_img'])){
                    $img_name = $_FILES['user_img']['name'];
                    $img_type = $_FILES['user_img']['type'];
                    $img_size = $_FILES['user_img']['size'];
                    $tmp_name = $_FILES['user_img']['tmp_name'];

                    $img_explode = explode(".",$img_name);
                    $img_ext = end($img_explode);
                    
                    $extensions =['jpg','png','jpeg'];
                    if(in_array($img_ext, $extensions) === true){
                        $time = time();
                        $new_img_name = $time.$img_name;
                        if(move_uploaded_file($tmp_name, "profileImg/".$new_img_name)){
                            $status = "Online";  
                            $sql3 = mysqli_query($conn, "INSERT INTO users (user_fname,user_lname,user_email,user_uid,user_pwd,user_img,status) VALUES ('$user_fname','$user_lname','$user_email','$user_uid','$user_pwd','$new_img_name','$status')");
                            if($sql3){
                                $sql4 = mysqli_query($conn, "SELECT * FROM users WHERE user_email = '$user_email'");
                                if(mysqli_num_rows($sql4)>0){
                                    $row = mysqli_fetch_assoc($sql4);
                                    $_SESSION['user_id']= $row['user_id'];
                                    echo "success";
                                }
                            }
                        }
                        
                    }else{
                        echo "Select image of type - .jpg .png .jpeg";
                    }
                }else{
                    echo "Please upload profile image!";
                }
            }
        }
    } else{
        echo "Email is invalid";
    }
 } else{
     echo "All input fields are required";
 }


?>