<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script>
$(document).ready(function() {
    $('#signUp').click(function() {
        event.preventDefault();
    });
});

$(document).ready(function() {
    $('#logIn').click(function() {
        event.preventDefault();
    });
});

$(document).ready(function() {
    $('#e2').click(function() {
        event.preventDefault();
    });
});
</script>

<?php 
include 'components/database.php'; 
session_start();
$sql = "SELECT `title`, `id` FROM `category` LIMIT 4;";
$cat_result = mysqli_query($conn,$sql);
$admin = false;
$emp = false;

if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] = true ){
    $em =  $_SESSION['login_email'];
    
    $admin_sql = "select * from `users` where user_email = '$em';";
    $admin_result = mysqli_query($conn,$admin_sql);
    $data = mysqli_fetch_assoc($admin_result);
    if(isset($data['role']) &&  $data['role'] == 'admin'){
        $admin = true;
    }
    if(isset($data['role']) &&  $data['role'] == 'employee'){
        $emp = true;
    }
}


echo '
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="/php_forum/">iForum</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link active" href="#">About</a>
                </li>';
                if($admin){
                    echo'
                    <li class="nav-item">
                    <a class="nav-link active" href="user.php">User</a>
                    </li>';
                }
            
                echo'   <li class="nav-item dropdown ">
                <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown"  role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Top Categories
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">';
                while($assoc = mysqli_fetch_assoc($cat_result)){
                    $c_id = $assoc['id'];

                    echo '<li><a class="dropdown-item" href="http://localhost/php_forum/thread_list.php?cat_id='.$c_id.'">'.$assoc['title'].'</a></li>';
                };
                    
                
                echo '
                </ul>
                </li>
                <li class="nav-item">
                <a class="nav-link active" href="contact.php">Contact</a>
                </li>';
                if($emp){
                echo'
                    <li class="nav-item">
                    <a class="nav-link active" href="setting.php">User Setting</a>
                    </li>';
                }
            echo'
            </ul>';
            if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
                echo ' <form class="d-flex"  method="get" action="search.php"  role="search">
                        <input class="form-control me-2 " type="search" name="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success mx-2" type="submit" >Search</button>
                        <p class="text-white wel  mt-2 p-0 m-0 ">Welcome</p>
                        <p class="text-white mx-2 p-0 mt-2 m-0 my-0">'. $_SESSION['login_email'].'</p>
                        <a href="/php_forum/components/logout.php" class="btn btn-success mx-2" >logout</a>
                    </form>';
            }else{
                echo ' <form class="d-flex" method="get" action="search.php" role="search">
                <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
                <button class="btn btn-success mx-2" data-bs-toggle="modal" id="logIn" data-bs-target="#exampleModal">login</button>
                <button class="btn btn-success mx-2" data-bs-toggle="modal" id="signUp" data-bs-target="#signupModal">Signup</button>
            </form>';

            }
        echo ' </div>
    </div>
    </nav>';
    

?>
<?php
include 'login_modal.php';
include 'signup_modal.php';

if(isset($_GET['signupsuccess']) && $_GET['signupsuccess'] == true ){
    echo'
        <div class="alert alert-success mb-0 alert-dismissible fade show" role="alert">
            <strong>Successfully!</strong> You are register in iforum & login.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    ';
};

if(isset($_GET['adminsuccess']) && $_GET['adminsuccess'] == true ){
    echo'
        <div class="alert alert-success mb-0 alert-dismissible fade show" role="alert">
            <strong>Successfully!</strong> You are register in iforum as admin.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    ';
};


if(isset($_GET['signup']) && $_GET['signup'] == 'false' ){
    echo'
        <div class="alert alert-danger mb-0 alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Email is already exsist.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    ';
};

if(isset($_GET['exsist']) && $_GET['exsist'] == 'true' ){
    echo'
        <div class="alert alert-danger mb-0 alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Email is already exsist.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    ';
};

if(isset($_GET['noexsist']) && $_GET['noexsist'] == 'true' ){
    echo'
        <div class="alert alert-danger mb-0 alert-dismissible fade show" role="alert">
            <strong>Error!</strong> User Email is doesnot exsist.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    ';
};

if(isset($_GET['not_match']) && $_GET['not_match'] == "false" ){
    echo'
        <div class="alert alert-danger mb-0 alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Enter same password.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    ';
};

if(isset($_GET['admin']) && $_GET['admin'] == "false" ){
    echo'
        <div class="alert alert-danger mb-0 alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Admin is already declared you are SignUp with User.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    ';
};

if(isset($_GET['pass_match']) && $_GET['pass_match'] == "false" ){
    echo'
        <div class="alert alert-danger mb-0 alert-dismissible fade show" role="alert">
            <strong>Error!</strong> wrong password.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    ';
};

if(isset($_GET['login']) && $_GET['login'] == "true" ){
    
    echo'
        <div class="alert alert-success mb-0 alert-dismissible fade show" role="alert">
            <strong>Successfully!</strong> You are login
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    ';
};


if(isset($_GET['logout']) && $_GET['logout'] == "true" ){
    
    echo'
        <div class="alert alert-success mb-0 alert-dismissible fade show" role="alert">
            <strong>Successfully!</strong> You are Logout
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    ';
};

?>