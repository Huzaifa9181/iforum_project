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
    <div class="container-fluid mt-5 mb-5" style="margin-bottom: 165px !important;">
        <div class="row justify-content-center">
            <?php

$sql = "SELECT * FROM `category`";
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_assoc($result)){
    $id = $row['id'];
    echo'    
        <div class="col-sm-3 mt-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">'.$row['title'].'</h5>
                    <p class="card-text">'. substr($row['description'],0,200) .'</p>
                    <a href="thread_list.php?cat_id='.$id.'" class="btn btn-primary">View Threads</a>
                </div>
            </div>
        </div>
';
}

?>
        </div>
    </div>

    <!-- footer -->
    <div class="container-fluid">
        <div class="copy">
            <p class="text-center text-white bg-dark mb-0">Copyright iForum 2022 | All right reserved </p>
        </div>
    </div>

</body>

</html>