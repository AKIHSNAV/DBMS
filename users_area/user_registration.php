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
    <h2 class="text-center">New User Registration</h2>
    <div class="row d-flex align-items-center justify-content-center">
        <div class="col-lg-l2 col-xl-6">
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-outline mb-4">
        <!-- user firstname field -->
        <label for="first_name" class="form-label">User First Name</label>
        <input type="text" id="first_name" class="form-control" placeholder="enter your first name" autocomplete="off" required="required" name="first_name" />
    </div>
    <div class="form-outline mb-4">
        <!-- user lastname field -->
        <label for="last_name" class="form-label">User Last Name</label>
        <input type="text" id="last_name" class="form-control" placeholder="enter your last name" autocomplete="off" name="last_name" />
    </div>
    <div class="form-outline mb-4">
        <!-- address street field -->
        <label for="address_street" class="form-label">Street Address</label>
        <input type="text" id="address_street" class="form-control" placeholder="Enter your street address" autocomplete="off" required="required" name="address_street" />
    </div>
    <div class="form-outline mb-4">
        <!-- address city field -->
        <label for="address_city" class="form-label">City</label>
        <input type="text" id="address_city" class="form-control" placeholder="Enter your city" autocomplete="off" required="required" name="address_city" />
    </div>
    <div class="form-outline mb-4">
        <!-- address state field -->
        <label for="address_state" class="form-label">State</label>
        <input type="text" id="address_state" class="form-control" placeholder="Enter your state" autocomplete="off" required="required" name="address_state" />
    </div>
    <div class="form-outline mb-4">
        <!-- pincode field -->
        <label for="pincode" class="form-label">Pincode</label>
        <input type="text" id="pincode" class="form-control" placeholder="Enter your pincode" autocomplete="off" required="required" name="pincode" />
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
        <input type="text" id="conf_user_password" class="form-control" placeholder="confirm password" autocomplete="off" required="required" name="conf_user_password" />
    </div>
    <div class="form-outline mb-4">
        <!-- date of birth field -->
        <label for="dob" class="form-label">Date of Birth (YYYY-MM-DD)</label>
        <input type="text" id="dob" class="form-control" pattern="\d{4}-\d{2}-\d{2}" placeholder="Enter your date of birth (YYYY-MM-DD)" autocomplete="off" required="required" name="dob" />
        <small class="text-muted">Format: YYYY-MM-DD</small>
    </div>
    <div class="form-outline mb-4">
        <!-- age field -->
        <label for="age" class="form-label">Age</label>
        <input type="text" id="age" class="form-control" placeholder="enter age" autocomplete="off" required="required" name="age" />
    </div>
    <div class="form-outline mb-4">
        <!-- gender field -->
        <label for="gender" class="form-label">Gender</label>
        <select id="gender" class="form-select" required="required" name="gender">
            <option value="" disabled selected>Select your gender</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Other">Other</option>
        </select>
    </div>
    <div class=" mt-4 pt-2">
        <input type="submit" value="Register" class="bg-info py-2 px-3 border-0" name="user_register">
        <p class="small fw-bold mt-2 pt-1 mb-0">Already have an account? <a href="user_login.php" class="text-danger"> Login</a></p>
    </div>
</form>
        </div>
    </div>

</div>

</body>
</html>

<!-- php code -->
<?php 
if(isset($_POST['user_register'])){
    $first_name=$_POST['first_name'];
    $last_name=$_POST['last_name'];
    $address_street=$_POST['address_street'];
    $address_city=$_POST['address_city'];
    $address_state=$_POST['address_state'];
    $pincode=$_POST['pincode'];
    $phone_no=$_POST['phone_no'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $conf_password=$_POST['conf_user_password'];
    $dob=$_POST['dob'];
    $age=$_POST['age'];
    $gender=$_POST['gender'];
    // $user_ip=getIPAddress();  <!--After adding the function in the functions folder -->

    $select_query="Select * from customer where email='$email' or phone_no='$phone_no'";
    $result=mysqli_query($con,$select_query);
    $rows_count=mysqli_num_rows($result);
    if ($rows_count > 0){
        echo "<script>alert('User with given email or phone number already exist')</script>";
    }
    else if($password!=$conf_password){
        echo "<script>alert('Passwords donot match')</script>";
    }
    else{
        $insert_query="insert into customer (first_name, last_name, address_street, address_city, address_state, pincode, phone_no, email, password, dob,age, gender) values ('$first_name','$last_name','$address_street','$address_state','$address_state','$pincode','$phone_no','$email','$password','$dob','$age','$gender')";
        $sql_execute=mysqli_query($con,$insert_query);
        if($sql_execute){
            echo "<script>alert('User registered successfully')</script>";
        }else{
            die(mysqli_error($con));
        }
    }


// selecting cart items


}



?>