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
    </style>
</head>

<body>

    <?php
        include 'components/nav.php';
        include 'components/database.php'; 
    ?>

    <?php

    $cat_id = $_GET['cat_id'];
  $sql = "SELECT * FROM `category` WHERE id = $cat_id;";
  $result = mysqli_query($conn,$sql);
  while($row = mysqli_fetch_assoc($result)){

    $id = $row['id'];
    $title = $row['title'];
    $desc = $row['description'];
  }
  
echo'
    <div class="container mt-5 mb-5">
        <div class="jumbotron p-3" style="background-color:#D3D3D3" >
            <h1 class="display-4">Welcome To '.$title.' forum</h1>
            <p class="lead">'.$desc.'</p>
            <a class="btn btn-success btn-lg" href="#" role="button">Learn more</a>
        </div>
    </div>';
?>

   
   <?php

   if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == "true" ){
   echo'
   <div class="container">
           <h1 class="text-center mt-3 mb-5">Start a Disscussion</h1>
           <form action="'. $_SERVER['REQUEST_URI'] .'" method="POST">
               <div class="mb-3">
                   <label for="title" class="form-label">Problem Title</label>
                   <input type="text" class="form-control" id="title" name="problem_title">
                   <div class="form-text">Write your issues about the language.</div>
                   <label for="floatingTextarea2" class="mt-3">Ellaborate Your concern</label>
                   <textarea class="form-control mt-2" id="floatingTextarea2" name="textarea"
                       style="height: 100px"></textarea>
               </div>
   
               <button type="submit" class="btn btn-success">Submit</button>
           </form>
       </div>
   ';
   }else{
       echo'<div class="container">
           <h1 class="text-center mt-3 mb-5">Start a Disscussion</h1>
       <p class="lead">You are not logged in. Please login to be able to start a disscussion</p>
   </div>
   ';
   }
      
   
   ?>
    <?php
        
        
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $th_title = $_POST['problem_title'];
            $th_desc = $_POST['textarea'];
            $th_sql = "INSERT INTO `thread_list` ( `thread_title`, `thread_desc`, `thread_time`, `thread_user_id`, `thread_cat_id`) VALUES ('$th_title', '$th_desc', current_timestamp(), '0', '$cat_id');" ;
            $th_result = mysqli_query($conn,$th_sql);
            echo "<script>window.location.href='http://localhost/php_forum/thread_list.php?cat_id=".$cat_id."'</script>";
        }


    ?>

    <h1 class="text-center mt-3 mb-5">Browse Questions</h1>
    <?php

                $cat_id = $_GET['cat_id'];
                $sql = "SELECT * FROM `thread_list` WHERE thread_cat_id=$cat_id;";
                $result = mysqli_query($conn,$sql);
                $data = mysqli_fetch_assoc($result);
                if(!$data){
                echo'
                <div class="container mt-5 mb-5">
                    <div class="jumbotron p-3" style="background-color:#D3D3D3" >
                        <p class="display-4">No Thread Found</p>
                        <p class="lead">Be the first person to ask te question</p>
                        
                    </div>
                </div>';
                }
                while($row = mysqli_fetch_assoc($result)){

                $thread_id = $row['thread_id'];
                $thread_title = $row['thread_title'];
                $thread_desc = $row['thread_desc'];

    echo'
    <div class="container mt-2 mb-5">    
        <div class="media mt-3">
            <img src="user.png" width="45px" class="mr-3">
            <div class="media-body">
            <h6><a class="text-decoration-none text-dark" href="thread.php?id='. $thread_id .'">'.$thread_title.'</a></h5>
            <p><a class="text-decoration-none text-dark" href="thread.php?id='. $thread_id .'">'.$thread_desc.'</a></p>
            </div>
        </div>
    </div>  ';
    
    }
?>
    
    <!-- footer -->
    <div class="container-fluid p-0 m-0">
        <div class="copy">
            <p class="text-center text-white bg-dark mb-0">Copyright iForum 2022 | All right reserved </p>
        </div>
    </div>





</body>

</html>