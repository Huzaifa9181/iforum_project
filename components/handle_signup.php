<?php
// echo $_POST['role'];
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $user_email = $_POST['signUp_email'];
    $user_pass = $_POST['pass'];
    $user_cpass = $_POST['cpassword'];
    $user_role = $_POST['role'];
    
    include "database.php";
    $sql = "select * from `users` where user_email= '$user_email'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_num_rows($result);
    
    if($row == 0){
        if(isset($_POST['role']) && $_POST['role'] == 'Admin'){
            $m_sql = "SELECT * FROM `users` WHERE role='admin'";
            $m_result = mysqli_query($conn,$m_sql);
            $m_row = mysqli_num_rows($m_result);
            if($m_row == 0){
                if($row>0){
                    header("location: /php_forum/index.php?signup=false");
                }else{
                    if($user_pass == $user_cpass){
                        $hash = password_hash($user_pass,PASSWORD_DEFAULT);
                        $sql="INSERT INTO `users` ( `user_email`, `user_password`, `time`,`role`) VALUES ( '$user_email', '$hash', current_timestamp(),'$user_role');";
                        $result = mysqli_query($conn,$sql);
                        header("location: /php_forum/index.php");
                
                    }else{
                        $error =  "false";
                        header("location: /php_forum/index.php?not_match=$error");
                    }
                    
                }    
            }elseif($m_row > 0){
                header("location: /php_forum/index.php?admin=false");
            }
    
        }elseif(isset($_POST['role']) && $_POST['role'] =='User' ){
            if($user_pass == $user_cpass){
                $hash = password_hash($user_pass,PASSWORD_DEFAULT);
                $sql="INSERT INTO `users` ( `user_email`, `user_password`, `time`, `role`) VALUES ( '$user_email', '$hash', current_timestamp() , '$user_role');";
                $result = mysqli_query($conn,$sql);
                header("location: /php_forum/index.php?signupsuccess=true");
        
            }else{
                $error =  "false";
                header("location: /php_forum/index.php?not_match=$error");
            }
        }elseif(isset($_POST['role'])&& $_POST['role'] =='Employee'){
            if($user_pass == $user_cpass){
                $hash = password_hash($user_pass,PASSWORD_DEFAULT);
                $sql="INSERT INTO `users` ( `user_email`, `user_password`, `time`, `role`) VALUES ( '$user_email', '$hash', current_timestamp() , '$user_role');";
                $result = mysqli_query($conn,$sql);
                header("location: /php_forum/index.php?signupsuccess=true");
                session_start();
                $_SESSION['signUp'] = true;
                $_SESSION['signUp_email'] = $user_email;
                $_SESSION['signUp_pass'] = $user_pass;
            }else{
                $error =  "false";
                header("location: /php_forum/index.php?not_match=$error");
            }
        }
        else{
            echo "some tecnical issue";
        }       
    }else{
        header("location: /php_forum/index.php?exsist=true");
    }
    
}else{
    echo "system tecnical issue";
}






?>