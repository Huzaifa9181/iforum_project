<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FeedBack</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
</head>

<body>
    
<?php
$sent=false;
if(isset($_GET['submit']) && $_GET['submit']== "true"){
    $to_email = $_POST['email'];
    $subject = "iforum feedback mail";
    $body =  'Hello '.$to_email.' Your feedback will be sent to the admin of iforum . Thank you for feedback in iforum quickly we solve your problem. Your feedback is :'. $_POST['feedback'];
    $headers = "From: huzaifaahmed1110@gmail.com";

    if (mail($to_email, $subject, $body, $headers)) {
        $sent = true;
        // echo "Email successfully sent to $to_email...";
    } else {
        echo "Email sending failed...";
    }
}

include 'components/nav.php';
if($sent == true){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Thank You !</strong> Your feedback will be sent to admin and  '.$to_email.'
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}
?>

    <div class="container mt-5" style="margin-bottom: 219px;">
    <h1 class="mt-3 mb-5 text-center">Contact For Feedback</h1>
        <form action="contact.php?submit=true" method="post">          
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" name="email" require placeholder="someone@gmail.com" class="form-control" id="email">
            </div>
            <div class="mb-3 mt-4">
                <label for="feedback" class="form-label">Leave a Feedback here</label>
                <textarea class="form-control" name="feedback" require id="feedback" style="height: 100px"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

<?php
?>

<!-- footer -->
<div class="container-fluid">
        <div class="copy">
            <p class="text-center text-white bg-dark mb-0">Copyright iForum 2022 | All right reserved </p>
        </div>
    </div>

</body>

</html>