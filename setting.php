<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Setting</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
</head>

<body>

    <?php
include 'components/database.php';
include 'components/nav.php';
?>


    <div class="container mt-5">
        <h1 class="text-center">User Setting</h1>
    </div>

<div class="container">
<div class="container mb-5 ">
        <table class="table" style="padding-top: 16px">
            <thead class="table-dark ">
                <th>User Id</th>
                <th>User Email</th>
                <th>User Time</th>
                <th>Role</th>
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
                                </tr>";
                            
                            echo "<br>";
                        }    

                    ?>

            </tbody>
        </table>
    </div>

</div>











</body>

</html>