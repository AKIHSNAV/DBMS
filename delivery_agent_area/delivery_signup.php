<?php 
include('../includes/connect.php');
include('../functions/common_function.php') ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User -registration</title>
    <!-- bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    
</head>
<body>
<div class="container-fluid my-3">
    <h2 class="text-center">New Delivery Agent Registration</h2>
    <div class="row d-flex align-items-center justify-content-center">
        <div class="col-lg-l2 col-xl-6">
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-outline mb-4">
        <!-- user firstname field -->
        <label for="first_name" class="form-label">Agent First Name</label>
        <input type="text" id="first_name" class="form-control" placeholder="enter your first name" autocomplete="off" required="required" name="first_name" />
    </div>
    <div class="form-outline mb-4">
        <!-- user lastname field -->
        <label for="last_name" class="form-label">Agent Last Name</label>
        <input type="text" id="last_name" class="form-control" placeholder="enter your last name" autocomplete="off" name="last_name" />
    </div>
    <div class="form-outline mb-4">
        <!-- phone number field -->
        <label for="phone_no" class="form-label">Phone Number</label>
        <input type="tel" id="phone_no" class="form-control" placeholder="Enter your phone number" autocomplete="off" required="required" name="phone_no" />
    </div>
    <div class="form-outline mb-4">
        <!-- email field -->
        <label for="email" class="form-label">Email</label>
        <input type="text" id="email" class="form-control" placeholder="enter your email" autocomplete="off" required="required" name="email" />
    </div>
    <div class="form-outline mb-4">
        <!-- password field -->
        <label for="password" class="form-label">Password</label>
        <input type="text" id="password" class="form-control" placeholder="enter password" autocomplete="off" required="required" name="password" />
    </div>
    <div class="form-outline mb-4">
        <label for="conf_user_password" class="form-label">Confirm Password</label>
        <input type="text" id="conf_user_password" class="form-control" placeholder="confirm password" autocomplete="off" required="required" name="conf_agent_password" />
    </div>
    <div class=" mt-4 pt-2">
        <input type="submit" value="Register" class="bg-info py-2 px-3 border-0" name="delivery_signup">
        <p class="small fw-bold mt-2 pt-1 mb-0">Already have an account? <a href="delivery_login.php" class="text-danger"> Login</a></p>
    </div>
</form>
        </div>
    </div>

</div>

</body>
</html>

<!-- php code -->
<?php 
if(isset($_POST['delivery_signup'])){
    $first_name=$_POST['first_name'];
    $last_name=$_POST['last_name'];
    $phone_no=$_POST['phone_no'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $conf_password=$_POST['conf_agent_password'];
    // $user_ip=getIPAddress();  <!--After adding the function in the functions folder -->

    $select_query="Select * from deliveryAgent where email='$email' or phone_no='$phone_no'";
    $result=mysqli_query($con,$select_query);
    $rows_count=mysqli_num_rows($result);
    if ($rows_count > 0){
        echo "<script>alert('A delivery agent with given email or phone number already exist')</script>";
    }
    else if($password!=$conf_password){
        echo "<script>alert('Passwords donot match')</script>";
    }
    else{
        $insert_query="insert into deliveryAgent (first_name, last_name, phone_no, email, password) values ('$first_name','$last_name','$phone_no','$email','$password')";
        $sql_execute=mysqli_query($con,$insert_query);
        if($sql_execute){
            echo "<script>alert('Delivery Agent registered successfully')</script>";
        }else{
            die(mysqli_error($con));
        }
    }


// selecting cart items


}



?>