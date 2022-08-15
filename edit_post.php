<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
    <style>
      .m-cont {
        padding-bottom: 96px;
      }
    </style>
</head>

<body>

    <?php
      include 'components/database.php';      
      include 'components/nav.php';
      $upload_issue = false;
      
      if(isset($_GET['edit']) && empty($_GET['edit'])){
        $upload_issue = true;
      }

      if($upload_issue){
        echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error !</strong> Your Post Will Not Be Edit. Beacuse Uploading Issue.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
      }

      $sql = "SELECT * FROM `category`";
      $result = mysqli_query($conn,$sql);

     $server = $_SERVER['REQUEST_URI'];
      $id = $_GET['edit'];
      $u_sql = "SELECT * FROM `post` WHERE id =$id;";
      $u_result = mysqli_query($conn,$u_sql);
      $u_row = mysqli_fetch_assoc($u_result);
      $c_id = $u_row['category_id'];

      $c_sql = "SELECT * FROM `category` WHERE id = $c_id;";
      $c_result = mysqli_query($conn,$c_sql);
      $c_row = mysqli_fetch_assoc($c_result);

    ?>
    <div class="container mt-5 mb-5">
        <h1 class="text-center">Edit Post & News in Iforum</h1>
    </div>

    <div class="container m-cont">
        <form action="<?php $server ?>" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="title" class="form-label">Post Title</label>
                <input type="text" maxlength="255" class="form-control" id="title" value="<?php echo $u_row['title']?>" name="title">
            </div>
            <div class="mb-3">
                <label for="desc" class="form-label">Description</label>
                <textarea class="form-control" id="desc" name="desc" style="height: 100px"><?php echo $u_row['description']?></textarea>
            </div>
            <div class="mb-3">
                <label for="desc" class="form-label">Category</label>
                <select class="form-select" name="category" aria-label="Default select example">
                    <option selected><?php echo $c_row['category'];?></option>
                    <?php
                while($row = mysqli_fetch_assoc($result)){
                  echo'
                    <option value="'.$row['id'].'">'.$row['category'].'</option>';
                    
                }?>
                </select>
            </div>
            <div class="input-group mb-3">
                <input type="file" name="upload" class="form-control" id="inputGroupFile02">
            </div>
            <button type="submit" class="btn btn-primary">Edit Post</button>
        </form>
    </div>


    <?php
        // echo $_SERVER['REQUEST_METHOD'];
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $title = $_POST['title'];
            $desc = $_POST['desc']; 
            $cat = $_POST['category'];
            $img = $_FILES['upload'];

            $file_name = $_FILES['upload']['name'];
            $file_path = $_FILES['upload']['full_path'];
            $file_type =  $_FILES['upload']['type'];
            $file_tmp = $_FILES['upload']['tmp_name'];
            $file_error = $_FILES['upload']['error'];
            $file_size = $_FILES['upload']['size'];

            

            if(move_uploaded_file($file_tmp,"uploads/".$file_name)){
                $sql = "UPDATE `post` SET `title` = '$title', `description` = '$desc', `category_id` = '$cat', `image` = '$file_name' WHERE `post`.`id` = $id;";
                $result = mysqli_query($conn,$sql);
                // header("location: index.php?edit=true");
            }else{
                header("location: edit_post.php?post=false");
            }
        }else{
            // echo 'some technical issue';
        }
    ?>

    <!-- footer -->
    <div class="container-fluid">
        <div class="copy">
            <p class="text-center text-white bg-dark mb-0">Copyright iForum 2022 | All right reserved </p>
        </div>
    </div>
</body>

</html>

