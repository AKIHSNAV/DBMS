<?php
// include('../includes/connect.php'); // Connect file to MySQL - already did in common_function.php and including that file
include ('../functions/common_function.php'); // Common functions file

if (isset ($_GET['customer_id'])) {
    $cust_id = $_GET['customer_id'];
    $get_data = "SELECT * FROM customer WHERE customerID = $cust_id;";
    $result_get = mysqli_query($con, $get_data);
    $row_data = mysqli_fetch_assoc($result_get);
    $cust_id = $row_data["customerID"];
    $cust_fname = $row_data['first_name'];
    $cust_lname = $row_data['last_name'];
    // Check if last_name is null
    if ($cust_lname === null) {
        $cust_name = $cust_fname;
    } else {
        $cust_name = $cust_fname . ' ' . $cust_lname;
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuickCart</title>
    <!-- bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- CSS file link -->
    <link rel="stylesheet" href="../style.css">
    <style>
        body {
            overflow-x: hidden;
        }
    </style>
</head>

<body>

    <!-- responsive navbar - container fluid is a bootstrap class which takes complete 100% width -->
    <div class="container-fluid p-0">
        <!-- first child -->
        <nav class="navbar navbar-expand-lg bg-info">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"><i class="fa fa-shopping-basket" aria-hidden="true"> QuickCart</i></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <!-- Here, it will redirect to profile page of the customer -->
                            <a class="nav-link active" aria-current="page"
                                href='index.php?customer_id=<?php echo "$cust_id"; ?>'>My Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href='index.php?customer_id=<?php echo "$cust_id"; ?>'>Products</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="#">Reviews</a>
                        </li> -->
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fa fa-shopping-cart"></i> My Cart </a>
                        </li>

                    </ul>
                    <form class="d-flex" role="search" action="search_bar.php" method="get">
                        <input type="hidden" name="customer_id" value='<?php echo "$cust_id"; ?>'>
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"
                            name="search_bar">
                        <!-- <button class="btn btn-outline-success" type="submit">Search</button> -->
                        <input type="submit" value="Search" class="btn btn-outline-success" name="search_data">
                    </form>
                </div>
            </div>
        </nav>


        <!-- second child -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link text-dark" href="">Welcome
                        <?php echo "$cust_name"; ?>
                    </a> <!-- will be changed to customer's name -->
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="../start.php">Logout</a>
                </li>
            </ul>
        </nav>

        <!-- third child -->
        <div class="bg-light p-2">
            <p class="text-center">Splash into Savings this Holi Season with QuickCart!!!</p>
        </div>

        <!-- fourth child -->

        <div class="row">
            <div class="col-md-10">
                <!-- products -->
                <div class="row">
                    <!-- fetching products from the database -->
                    <?php
                    display_products($cust_id);
                    display_cat_products($cust_id);
                    ?>
                </div>
            </div>
            <div class="col-md-2 bg-secondary p-0">
                <!-- sidenav - categories to be listed -->
                <ul class="navbar-nav me-auto text-center">
                    <li class="nav-item bg-info">
                        <a href="#" class="nav-link text-light">
                            <h4>Categories</h4>
                        </a>
                    </li>
                    <?php
                    display_categories($cust_id);
                    ?>
                </ul>
            </div>
        </div>




        <!-- last child - footer -->
        <?php
        include ("../includes/footer.php");
        ?>
    </div>




    <!-- bootstrap JS link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

    <!-- JS file link -->
    <!-- <script src="script.js"></script> -->
</body>

</html>