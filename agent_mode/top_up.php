<?php
    $get_data = "SELECT * FROM delivery_agent_wallet WHERE agentID = $agent_id;";
    $result_get = mysqli_query($con, $get_data);
    $row_data = mysqli_fetch_assoc($result_get);
    $earning_balance = $row_data["earning_balance"];
    $earning_paid = $row_data["earning_paid"];
    $earning_total = $row_data["earning_total"];
    $upiID = $row_data["upiID"];
        // earning_balance, earning_paid, earning_total,
?>

<div class="container mt-3">
    <h2 class="text-center">Withdraw Amount</h2>
    <h4 class="w-50 m-auto my-4">Current Balance: ₹<?php echo "$earning_balance";?></h4>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="amount" class="form-label">Withdraw Amount</label>
            <input type="number" name="amount" id="amount" value="<?php echo "$earning_balance"; ?>"
                class="form-control" placeholder="Enter Amount" autocomplete="off" required="required">
        </div>
        <div class="form-outline mb-4 w-50 m-auto">
                        <!-- password field -->
                        <label for="password" class="form-label">Password</label>
                        <input type="password" id="password" class="form-control" placeholder="Enter your Password"
                        autocomplete="off" required="required" name="password" />
                    </div>
        <div class="form-outline mb-4 w-50 m-auto">
            <input type="submit" name="edit_amount" class="btn btn-info mb-3 px-3" value="Withdraw">
        </div>
    </form>
</div>

<!-- updating wallet's details in the database -->
<?php
if (isset ($_POST['edit_amount'])) {
    $added_amount = $_POST['amount'];
    $password = $_POST['password'];

    // checking all filled - empty condition
    if ($added_amount == '') {
        echo "<script> alert('Please fill all the available fields.')</script>";
        exit();
    }if ($added_amount > $earning_balance){
        echo "<script> alert('Not enough balance .Enter amount less than balance')</script>";
        exit();
    }
    else if ($password != $pass){
        echo "<script> alert('Incorrect Password. Please try again.')</script>";
    }
    else {
        echo "$added_amount";
        // update wallet's new details to table - SET safe mode OFF to update
        $safe_mode_query = "SET SQL_SAFE_UPDATES = 0;";
        $result_safe = mysqli_query($con, $safe_mode_query);
        if ($result_safe==0){
            echo "Couldn't turn safe mode OFF";
        }
        
        $new_amount = $earning_balance - $added_amount;
        $new_paid = $earning_paid + $added_amount;
        $update_query = "UPDATE delivery_agent_wallet SET earning_balance = '$new_amount' , earning_paid = '$new_paid' WHERE agentID = '$agent_id';";
        
        $result_query = mysqli_query($con, $update_query);
        if ($result_query) {
            echo "<script>alert('Wallet has been updated successfully. Updated balance = ₹$new_amount'); window.location.href = 'profile_page.php?agent_id=" . $agent_id . "&top_up';</script>";
        }
    }
}
?>