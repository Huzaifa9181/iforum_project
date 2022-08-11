<?php

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $user_email = $_POST['signUp_email'];
    $user_pass = $_POST['pass'];
    $user_cpass = $_POST['cpassword'];
    
    include "database.php";
    $sql = "select * from `users` where user_email= '$user_email'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_num_rows($result);
    if($row>0){
        header("location: /php_forum/index.php?signup=false");

    }else{
        if($user_pass == $user_cpass){
            $hash = password_hash($user_pass,PASSWORD_DEFAULT);
            $sql="INSERT INTO `users` ( `user_email`, `user_password`, `time`) VALUES ( '$user_email', '$hash', current_timestamp());";
            $result = mysqli_query($conn,$sql);
            header("location: /php_forum/index.php?signupsuccess=true");
    
        }else{
            $error =  "false";
            header("location: /php_forum/index.php?not_match=$error");
        }
    }
}

?>