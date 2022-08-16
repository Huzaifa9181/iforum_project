
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModal">Welcome to Add User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/php_forum/user.php" method="post">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" maxlength="50" class="form-control" id="email" name="signUp_email">
                    </div>
                    <div class="mb-3">
                        <label for="pass" class="form-label">Password</label>
                        <input type="password" class="form-control" id="pass" name="pass">
                    </div>
                    <div class="mb-3">
                        <label for="cpassword" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="cpassword" name="cpassword">
                    </div>
                    <select required class="form-select" name="role" aria-label="Default select example">
                        <option selected>Select Role</option>
                        <option value="Admin">Admin</option>
                        <option value="User">User</option>
                        <option value="Employee" >Employee</option>
                    </select>
                    <br>
                    <br>
                    <button type="submit" class="btn btn-primary">Add User</button>
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
    $user_email = $_POST['signUp_email'];
    $user_pass = $_POST['pass'];
    $user_cpass = $_POST['cpassword'];
    $user_role = $_POST['role'];
    
    include "database.php";
    $sql = "select * from `users` where user_email= '$user_email'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_num_rows($result);
    
    if($row == 0){
        if($user_pass == $user_cpass){
            $hash = password_hash($user_pass,PASSWORD_DEFAULT);
            $sql="INSERT INTO `users` ( `user_email`, `user_password`, `time`,`role`) VALUES ( '$user_email', '$hash', current_timestamp(),'$user_role');";
            $result = mysqli_query($conn,$sql);

        }else{
            $error =  "false";
            header("location: /php_forum/index.php?not_match=$error");
        }
        
    }
}

?>