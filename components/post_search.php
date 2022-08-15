<?php
    include 'database.php';

    $search_value = $_POST['search'];
    $sql = "SELECT * FROM `post`WHERE title LIKE '%{$search_value}%' OR description LIKE '%{$search_value}%'";
    $result = mysqli_query($conn,$sql);


    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            $output = '
            <div class="col-md-3 mt-3 mb-3">
                    <div class="card" style="width: 18rem;">
                        <img src="uploads/'.$row['image'].'" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">'.$row['title'].'</h5>
                            <p class="card-text">'.$row['description'].'</p>
                            <a href="#" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
            ';
        }

        echo $output;
    }else{
        echo '<h1 class="mt-5 mb-5">No Post Found.</h1>';
    }

?>