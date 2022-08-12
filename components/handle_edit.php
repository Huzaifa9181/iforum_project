<?php


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    include 'database.php';
    session_start();
    $email = $_POST['edit_email'];
    $role = $_POST['role'];
    $id = $_SESSION['login_id'];
    
    $sql = "UPDATE `users` SET `user_email` = '$email', `role` = '$role' WHERE `users`.`id` = $id;";
    $result = mysqli_query($conn,$sql);

    header("location: /php_forum/user.php");

}
?>