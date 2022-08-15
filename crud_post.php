<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud Post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>

    <style>
    th#act {
        padding-left: 55px !important;
    }

    .main-cont {
    padding-bottom: 369px;
    }

    .add-btn{
    margin-bottom: -30px;
    }
    </style>

</head>

<body>

    <?php
        include 'components/database.php';
        include 'components/nav.php';
    ?>

    <div class="container mt-5 main-cont">
        <a href="post.php" class="btn btn-primary add-btn">Add Post</a>
        <table class="table">
            <thead class="table-dark ">
                <th>Id</th>
                <th>Title</th>
                <th>Description</th>
                <th>Category</th>
                <th id="act">Action</th>
            </thead>
            <tbody>
                <?php
                        $sql = "SELECT * FROM `post`";
                        $result = mysqli_query($conn,$sql);

                        $count = 0;
                        while($row = mysqli_fetch_assoc($result)){
                            $count = $count + 1;
                            $cat_id = $row['category_id'];
                            $a_sql = "SELECT * FROM `category` WHERE id = $cat_id;";
                            $a_result = mysqli_query($conn,$a_sql);
                            $a_row = mysqli_fetch_assoc($a_result);
                            $desc = $row['description'];
                            echo "<tr>
                                <td>" . $count . "</td>
                                <td>" . $row['title'] . "</td>
                                <td>" . substr($desc,0,90) . "</td>
                                <td>" .$a_row['category']. "</td>
                                <td><span class='p-2'><a href='edit_post.php?edit=".$row['id']."' class='btn btn-success'>Edit</a></span>||<span class='p-2'><a href='?delet=".$row['id']."' class='btn btn-danger'>Delet</a></span></td>
                                </tr>";
                            
                            echo "<br>";
                        }    

                        if(isset($_GET['delet']) && !empty($_GET['delet'])){
                            $id = $_GET['delet'];
                            $d_sql = "DELETE FROM `post` WHERE `id` = $id";
                            $d_result = mysqli_query($conn,$d_sql);
                        }

                    ?>

            </tbody>
        </table>
    </div>

<!-- footer -->
<div class="container-fluid">
        <div class="copy">
            <p class="text-center text-white bg-dark mb-0">Copyright iForum 2022 | All right reserved </p>
        </div>
    </div>

</body>

</html>