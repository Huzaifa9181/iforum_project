<?php

if($_SERVER['REQUEST_METHOD'] == "POST"){
    include "database.php";
    $login_email = $_POST['login_email'];
    $login_pass = $_POST['login_pass'];
    
    $sql = "select * from `users` where user_email= '$login_email'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_num_rows($result);
    if($row == 1){
        $assoc = mysqli_fetch_assoc($result);
        $login_id = $assoc['id'];
        if(password_verify($login_pass , $assoc['user_password'])){
            header("location: /php_forum/index.php?login=true&&role=". $assoc['role']."&&user_id=".$assoc['id']."");
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['login_email'] = $login_email;
            $_SESSION['login_id'] = $login_id;
        }else{
            header("location: /php_forum/index.php?pass_match=false");
        }
        
    }else{
        header("location: /php_forum/index.php?noexsist=true");
            // echo "user does not exist";
    }

}else{
    echo "some tecnical issue";
}

?>


