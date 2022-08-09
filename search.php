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
</head>

<body>
    <?php
  include 'components/database.php';
  include 'components/nav.php';
              
?>

    <div class="container mt-5 mb-5" style="margin-bottom: 250px !important;">
        <h1>Search results for <i>"<?php echo $_GET['search'];?>"</i> </h1>
        <?php
    
        $els = false;
        $val = $_GET['search'];
          $sql = "SELECT * FROM `thread_list` WHERE MATCH (`thread_title`,`thread_desc`) against('.$val.');
          ";
          $result = mysqli_query($conn,$sql);

          $num = mysqli_num_rows($result);
          if($num > 0 ){
                while($row = mysqli_fetch_assoc($result)){
                $thread_id = $row['thread_id'];
                $thread_title = $row['thread_title'];
                $thread_desc = $row['thread_desc'];
                $els = true;
                echo'        
                    <div class="data_search mt-5">
                        <h3><a href="thread.php?id='.$thread_id.'" class="text-dark text-decoration-none">'.$thread_title.'</a></h3>
                        <p>'.$thread_desc.'</p>
                    </div>';
                }
             }else{
                 echo'
                 <div class="container mt-5 mb-5">
                 <div class="jumbotron p-4" style="background-color:#D3D3D3" >
                     <h1 class="display-4">No Result Found</h1>
                     <p class="lead">Suggestions :</p>
                     <ul>
                     <li>Make sure that all words are spelled correctly.</li>
                     <li>Try different keywords.</li>
                     <li>Try more general keywords.</li>
                     </ul>
                 </div>
                 </div>';
             }
        ?>

    </div>
    <!-- footer -->
    <div class="container-fluid">
        <div class="copy">
            <p class="text-center text-white bg-dark mb-0">Copyright iForum 2022 | All right reserved </p>
        </div>
    </div>

</body>

</html>