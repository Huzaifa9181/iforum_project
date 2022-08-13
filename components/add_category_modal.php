<!-- Modal -->
<div class="modal fade" id="catModal" tabindex="-1" aria-labelledby="catModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="catModal">Welcome to Add Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/php_forum/components/add_category_modal.php" method="post">
                    <div class="mb-3">
                        <label for="cat" class="form-label">Category Name</label>
                        <input type="text" class="form-control" id="cat" name="cat_name" >
                    </div>
                    <div class="mb-3">
                        <label for="desc" class="form-label">Category Description</label>
                        <input type="text" class="form-control" id="desc" name="cat_desc">
                    </div>
                    <button type="submit" class="btn btn-primary">Add Category</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<?php


if($_SERVER['REQUEST_METHOD'] == "POST"){
    $cat_name = $_POST['cat_name'];
    $cat_desc = $_POST['cat_desc'];
    include "database.php";
    $sql = "SELECT * FROM `category` WHERE category = '$cat_name';";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_num_rows($result);
    if($row == 0){
        $add_sql = "INSERT INTO `category` (`category`, `description`) VALUES ('$cat_name', '$cat_desc');";
        $add_result = mysqli_query($conn,$add_sql);
        header("location: ../index.php?add_cat=true");
    }else{
        echo"cat is already created";
    }
}else{
    // echo "some tecnical issue";
}

?>