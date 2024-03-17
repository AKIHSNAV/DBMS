<?php
include ('../includes/connect.php');
if (isset ($_POST['insert_cat'])) {
    $cat_name = $_POST['category_name'];

    // Selecting data from table to check if category already exists
    $select_query = "SELECT * FROM productCategory WHERE name='$cat_name'";
    $select_result = mysqli_query($con, $select_query);
    $number = mysqli_num_rows($select_result);
    if ($number > 0) {
        echo '<script>alert("This category is already present in Quickcart.")</script>';
    } else {
        $insert_query = "INSERT INTO productCategory (name, noOfProducts) VALUES ('$cat_name', DEFAULT)";
        $result = mysqli_query($con, $insert_query);
        if ($result) {
            echo '<script>alert("Category has been inserted successfully.")</script>';
        }
    }
}
?>

<h2 class="text-center">Insert Category</h2>
<form action="" method="post" class="mb-2">
    <div class="input-group w-90 mb-2">
        <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control" name="category_name" placeholder="Insert Category"  autocomplete="off"
            aria-label="insert-category" aria-describedby="basic-addon1">
    </div>
    <div class="input-group w-10 mb-2 m-auto">
        <input type="submit" class="bg-info border-0 p-2 my-3" name="insert_cat" placeholder="Insert Category">
        <!-- <button class="bg-info p-2 my-3 border-0">Insert Category</button> -->
    </div>
</form>