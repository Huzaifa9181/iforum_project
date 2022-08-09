<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Forum</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
    <style>
        .media-body {
            display: inline-block;
            padding: 7px;
        }
        img, svg {
            vertical-align: baseline;
        }
        .com {
            margin-top: -6px;
        }
    </style>
</head>

<body>

    <?php
        include 'components/database.php'; 
        include 'components/nav.php';
    ?>

    <?php

    $th_id = $_GET['id'];
  $sql = "SELECT * FROM `thread_list` WHERE thread_id =$th_id;";
  $result = mysqli_query($conn,$sql);
  while($row = mysqli_fetch_assoc($result)){

    $id = $row['thread_id'];
    $title = $row['thread_title'];
    $desc = $row['thread_desc'];
  }
  
echo'
    <div class="container mt-5 mb-5">
        <div class="jumbotron p-3" style="background-color:#D3D3D3" >
            <h1 class="display-4 p-2">Welcome To '.$title.' forum</h1>
            <p class="lead p-2">'.$desc.'</p>
            <hr>
            <p>This is peer to peer forum . Keep it friendly,
            Be courteous and respectful. Appreciate that others may have an opinion different from yours.
            Stay on topic,
            Share your knowledge,
            Refrain from demeaning, discriminatory, or harassing behaviour and speech.</p>
            
        </div>
    </div>';
?>

<?php

if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == "true" ){
echo'
<div class="container">
        <h1 class="text-center mt-3 mb-5">Post a Comment</h1>
        <form action="'. $_SERVER["REQUEST_URI"].'" method="POST">
            <div class="mb-3">
                <label for="floatingTextarea2" class="mt-3">Type your comment</label>
                <textarea class="form-control mt-2" id="floatingTextarea2" name="comment"
                    style="height: 100px"></textarea>
            </div>

            <button type="submit" class="btn btn-success">Post Comment</button>
        </form>
    </div>';
}else{
    echo'<div class="container">
    <h1 class="text-center mt-3 mb-5">Post a Comment</h1>
    <p class="lead">You are not logged in. Please login to be able to post a comment</p>
</div>
';
}
?>

    <?php

    // session_start();
    
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $comment = $_POST['comment'];
            $comment = str_replace("<","&lt;",$comment);
            $comment = str_replace(">","&gt;",$comment);
            
            $comment_sql = "INSERT INTO `comments` (`comment_user`, `comment_content`, `thread_id`, `time`) VALUES ( '$_SESSION[login_email]', '$comment', '$th_id', current_timestamp());";
            $comment_result = mysqli_query($conn,$comment_sql); 
            echo "<script>window.location.href='http://localhost/php_forum/thread.php?id=".$th_id."'</script>";
        }
        
    ?>

    <div class="container mt-5 mb-5" >
        <h1 class="text-center mt-3 mb-5">Disscussion</h1>
    </div>

    <?php
    $sql = "SELECT * FROM `comments` WHERE thread_id=$th_id;";
    $select_result = mysqli_query($conn,$sql);
    $data = mysqli_fetch_assoc($select_result);
    if(!$data){
    echo'
    <div class="container mt-5 mb-5">
        <div class="jumbotron p-3" style="background-color:#D3D3D3" >
            <p class="display-4">No Comment Found</p>
            <p class="lead">Be the first person to reply the thread </p>
            
        </div>
    </div>';
    }
    while($row = mysqli_fetch_assoc($select_result)){

        $comment_content = $row['comment_content'];
        $comment_time = $row['time'];
        $comment_user = $row['comment_user'];

        echo'
        <div class="container mt-2 mb-5">    
        <div class="media mt-3">
            <img src="user.png" width="45px" class="mr-3">
            <div class="media-body">
            <h6 class="fw-bold">'.$comment_user .' at '. $comment_time.'</h6>
            <p class="com">'. $comment_content . '</p>
            </div>
        </div>
        </div>  ';

}
    
    ?>
            

    <!-- footer -->
    <div class="container-fluid p-0 m-0">
        <div class="copy ">
            <p class="text-center text-white bg-dark mb-0">Copyright iForum 2022 | All right reserved </p>
        </div>
    </div>

</body>

</html>