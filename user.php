<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">

    <style>
    th#act {
        padding-left: 55px !important;
    }

    .main-cont {
    padding-bottom: 239px;
    }
    </style>


</head>

<body>

    <?php
  include 'components/database.php';
  include 'components/nav.php';
  include 'edit_modal.php';
  include 'components/add_modal.php';
?>

    <div class="container mb-5 mt-5 main-cont">
        <button class="btn btn-primary" data-bs-toggle='modal' data-bs-target='#addModal'>Add User</button>
        <table class="table" style="padding-top: 16px" id="myTable">
            <thead class="table-dark ">
                <th>User Id</th>
                <th>User Email</th>
                <th>User SignUp Time</th>
                <th>Role</th>
                <th id="act">Action</th>
            </thead>
            <tbody>
                <?php
                        $sql = "SELECT * FROM `users`";
                        $result = mysqli_query($conn,$sql);

                        $count = 0;
                        while($row = mysqli_fetch_assoc($result)){
                            $count = $count + 1;
                            echo "<tr>
                                <td>" . $count . "</td>
                                <td>" . $row['user_email'] . "</td>
                                <td>" .$row['time'] . "</td>
                                <td>" .$row['role']. "</td>
                                <td><span class='p-2'><a href='?edit=".$row['id']."' class='btn btn-success' data-bs-toggle='modal' data-bs-target='#editModal'>Edit</a></span>||<span class='p-2'><a href='?delet=".$row['id']."' class='btn btn-danger'>Delet</a></span></td>
                                </tr>";
                            
                            echo "<br>";
                        }    

                        if(isset($_GET['delet']) && !empty($_GET['delet'])){
                            $id = $_GET['delet'];
                            $d_sql = "DELETE FROM `users` WHERE `users`.`id` = $id";
                            $d_result = mysqli_query($conn,$d_sql);
                        }

                    ?>

            </tbody>
        </table>
    </div>
    <script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
    </script>

<!-- footer -->
<div class="container-fluid">
        <div class="copy">
            <p class="text-center text-white bg-dark mb-0">Copyright iForum 2022 | All right reserved </p>
        </div>
    </div>

</body>

</html>