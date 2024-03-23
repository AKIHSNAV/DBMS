<?php
include ('../includes/connect.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agent Registration</title>
    <!-- bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


</head>

<body>
    <div class="container-fluid my-5">
        <h2 class="text-center">New Delivery Agent Registration</h2>
        <div class="row d-flex align-items-center justify-content-center mt-4">
            <div class="col-lg-l2 col-xl-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-outline mb-4">
                        <!-- agent firstname field -->
                        <label for="first_name" class="form-label">First Name</label>
                        <input type="text" id="first_name" class="form-control" placeholder="Enter your First Name"
                            autocomplete="off" required="required" name="first_name" />
                    </div>
                    <div class="form-outline mb-4">
                        <!-- agent lastname field -->
                        <label for="last_name" class="form-label">Last Name</label>
                        <input type="text" id="last_name" class="form-control" placeholder="Enter your Last Name"
                            autocomplete="off" name="last_name" />
                    </div>
                    <div class="form-outline mb-4">
                        <!-- phone number field -->
                        <label for="phone_no" class="form-label">Phone Number</label>
                        <input type="tel" id="phone_no" class="form-control" placeholder="Enter your Phone Number"
                            autocomplete="off" required="required" name="phone_no" />
                    </div>
                    <div class="form-outline mb-4">
                        <!-- email field -->
                        <label for="email" class="form-label">Email</label>
                        <input type="text" id="email" class="form-control" placeholder="Enter your Email ID"
                            autocomplete="off" required="required" name="email" />
                    </div>
                    <div class="form-outline mb-4">
                        <!-- password field -->
                        <label for="password" class="form-label">Password</label>
                        <input type="password" id="password" class="form-control" placeholder="Enter Password"
                            autocomplete="off" required="required" name="password" />
                    </div>
                    <div class="form-outline mb-4">
                        <label for="conf_agent_password" class="form-label">Confirm Password</label>
                        <input type="password" id="conf_agent_password" class="form-control" placeholder="Confirm Password"
                            autocomplete="off" required="required" name="conf_agent_password" />
                    </div>
                    <div class=" mt-4 pt-2">
                        <input type="submit" value="Register" class="btn btn-info py-2 px-3 border-0" name="delivery_signup">
                        <p class="small fw-bold mt-2 pt-1 mb-0">Already have an account? <a href="delivery_login.php"
                                class="text-danger"> Login</a></p>
                    </div>
                </form>
            </div>
        </div>

    </div>

</body>

</html>

<!-- php code -->
<?php
if (isset ($_POST['delivery_signup'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $phone_no = $_POST['phone_no'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $conf_password = $_POST['conf_agent_password'];
    // $agent_ip=getIPAddress();  <!--After adding the function in the functions folder -->

    $select_total = "SELECT * FROM deliveryAgent;";
    $result_total = mysqli_query($con, $select_total);
    $row_total = mysqli_num_rows($result_total); 
    $select_query = "SELECT * FROM deliveryAgent WHERE email='$email' OR phone_no='$phone_no';";
    $result = mysqli_query($con, $select_query);
    $rows_count = mysqli_num_rows($result);
    if ($rows_count > 0) {
        echo "<script>alert('Delivery Agent with given Email or Phone Number already exist. Please use Login option to login into your account')</script>";
    } else if ($password != $conf_password) {
        echo "<script>alert('Passwords do not match. Please try again.')</script>";
    } else {
        $insert_query = "INSERT INTO deliveryAgent (first_name, last_name, phone_no, email, password) values ('$first_name','$last_name','$phone_no','$email','$password');";
        $sql_execute = mysqli_query($con, $insert_query);
        $new_cust = $row_total+1;
        $upi_id = 'agent'. $new_cust . '@upi';
        $insert_wallet = "INSERT INTO delivery_agent_wallet (agentID, earning_balance, earning_paid, earning_total, Transaction_history, upiID) VALUES
        ('$new_cust', DEFAULT, DEFAULT, DEFAULT, '', '$upi_id');";
        $sql_wallet = mysqli_query($con, $insert_wallet);
        if ($sql_execute and $sql_wallet) {
            echo "<script>alert('You are registered successfully. Kindly login into your account.');  window.location.href = 'delivery_login.php';</script>";
        } else {
            die (mysqli_error($con));
        }
    }
}

?>