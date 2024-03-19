<?php 
include('../includes/connect.php');
include('../functions/common_function.php')
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delivery Agent Login</title>
    <!-- bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
body{
    overflow-x:hidden
}
        </style>
    
</head>
<body>
<div class="container-fluid my-3">
    <h2 class="text-center">Delivery Agent Login</h2>
    <div class="row d-flex align-items-center justify-content-center mt-5">
        <div class="col-lg-l2 col-xl-6">
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-outline mb-4">
        <!-- email field -->
        <label for="email" class="form-label">Email</label>
        <input type="text" id="email" class="form-control" placeholder="enter your email" autocomplete="off" required="required" name="email" />
    </div>
    <div class="form-outline mb-4">
        <!-- password field -->
        <label for="password" class="form-label">Password</label>
        <input type="password" id="password" class="form-control" placeholder="enter password" autocomplete="off" required="required" name="password" />
    </div>
    <div class=" mt-4 pt-2">
        <input type="submit" value="Login" class="bg-info py-2 px-3 border-0" name="delivery_login">
        <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="delivery_signup.php" class="text-danger">Register</a></p>
    </div>
</form>
        </div>
    </div>

</div>
  
</body>
</html>

<?php

if(isset($_POST['delivery_login'])){
    // $first_name = $_POST['first_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $select_query="Select * from deliveryAgent where email='$email' and password='$password'";
    $result=mysqli_query($con,$select_query);
    $rows_count=mysqli_num_rows($result);
    // cart item
    $select_query="Select * from deliveryAgent where email='$email' and password='$password'";
    if($rows_count > 0){
        echo "<script>alert('Logged In successfully')</script>";
        } else {
            echo "<script>alert('Invalid Credentials')</script>";
        }
}

?>