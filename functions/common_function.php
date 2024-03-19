<?php
include ('../includes/connect.php'); // Connect file to MySQL

// display all products on home-page
function display_products($cust_id)
{
    global $con;
    if (!isset ($_GET['cat'])) {
        $select_prod = "SELECT * FROM product;";
        $result_prod = mysqli_query($con, $select_prod);
        $num_of_rows = mysqli_num_rows($result_prod);
        if ($num_of_rows == 0) {
            echo "<h2 class = 'text-center text-danger'> No Products available in Store right now! Please visit again! </h2>";
        }
        while ($row_prod = mysqli_fetch_assoc($result_prod)) {
            $prod_id = $row_prod['productID'];
            $prod_name = $row_prod['name'];
            $prod_desc = $row_prod['description'];
            $prod_image = $row_prod['prod_image'];
            $prod_price = $row_prod['price'];

            // // Truncate description to a fixed number of characters
            // $truncated_desc = substr($prod_desc, 0, 100); // Adjust the number of characters as needed

            echo "<div class='col-md-4 mb-2'>
                            <div class='card h-100'> <!-- Set a fixed height for the card -->
                                <img src='../images/$prod_image' class='card-img-top' alt='$prod_name image'>
                                <div class='card-body d-flex flex-column'> <!-- Use flex column to align content -->
                                    <h5 class='card-title'>$prod_name</h5>
                                    <p class='card-text flex-grow-1'>$prod_desc</p> <!-- Truncated description -->
                                    <div class='row justify-content-between align-items-center'> <!-- Align items horizontally -->
                                        <div class='col'>
                                            <p class='card-text'>Price: ₹$prod_price</p>
                                        </div>
                                        <div class='col-auto'>
                                            <a href='#' class='btn btn-primary'>Add to Cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>";
        }
    }
}

// display unique category products only
function display_cat_products($cust_id)
{
    global $con;
    if (isset ($_GET['cat'])) {
        $cat_id = $_GET['cat'];
        $select_prod = "SELECT * FROM product where categoryID = $cat_id;";
        $result_prod = mysqli_query($con, $select_prod);
        $num_of_rows = mysqli_num_rows($result_prod);
        if ($num_of_rows == 0) {
            echo "<h2 class = 'text-center text-danger'> No Products available in this Category! </h2>";
        }
        while ($row_prod = mysqli_fetch_assoc($result_prod)) {
            $prod_id = $row_prod['productID'];
            $prod_name = $row_prod['name'];
            $prod_desc = $row_prod['description'];
            $prod_image = $row_prod['prod_image'];
            $prod_price = $row_prod['price'];

            // // Truncate description to a fixed number of characters
            // $truncated_desc = substr($prod_desc, 0, 100); // Adjust the number of characters as needed

            echo "<div class='col-md-4 mb-2'>
                                <div class='card h-100'> <!-- Set a fixed height for the card -->
                                    <img src='../images/$prod_image' class='card-img-top' alt='$prod_name image'>
                                    <div class='card-body d-flex flex-column'> <!-- Use flex column to align content -->
                                        <h5 class='card-title'>$prod_name</h5>
                                        <p class='card-text flex-grow-1'>$prod_desc</p> <!-- Truncated description -->
                                        <div class='row justify-content-between align-items-center'> <!-- Align items horizontally -->
                                            <div class='col'>
                                                <p class='card-text'>Price: ₹$prod_price</p>
                                            </div>
                                            <div class='col-auto'>
                                                <a href='#' class='btn btn-primary'>Add to Cart</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>";
        }
    }
}

// display categories on side-nav
function display_categories($cust_id)
{
    global $con;
    $select_cat = "SELECT * FROM productCategory;";
    $cat_result = mysqli_query($con, $select_cat);
    while ($row = mysqli_fetch_assoc($cat_result)) {
        $cat_name = $row["name"];
        $cat_id = $row["categoryID"];
        echo "<li class='nav-item'>
                            <a href='index.php?customer_id=$cust_id&cat=$cat_id' class='nav-link text-light'>$cat_name</a>
                        </li>";
    }

}

// displaying products searched
function search_products($cust_id) {
    global $con;
    if (isset ($_GET['search_data'])) {
        $searched_word = $_GET['search_bar'];
        $select_prod = "SELECT * FROM product WHERE name LIKE '%$searched_word%' AND stock>0;";
        $result_prod = mysqli_query($con, $select_prod);
        $num_of_rows = mysqli_num_rows($result_prod);
        if ($num_of_rows == 0) {
            echo "<h2 class = 'text-center text-danger'> No results match! </h2>";
        }
        while ($row_prod = mysqli_fetch_assoc($result_prod)) {
            $prod_id = $row_prod['productID'];
            $prod_name = $row_prod['name'];
            $prod_desc = $row_prod['description'];
            $prod_image = $row_prod['prod_image'];
            $prod_price = $row_prod['price'];

            // // Truncate description to a fixed number of characters
            // $truncated_desc = substr($prod_desc, 0, 100); // Adjust the number of characters as needed

            echo "<div class='col-md-4 mb-2'>
                                <div class='card h-100'> <!-- Set a fixed height for the card -->
                                    <img src='../images/$prod_image' class='card-img-top' alt='$prod_name image'>
                                    <div class='card-body d-flex flex-column'> <!-- Use flex column to align content -->
                                        <h5 class='card-title'>$prod_name</h5>
                                        <p class='card-text flex-grow-1'>$prod_desc</p> <!-- Truncated description -->
                                        <div class='row justify-content-between align-items-center'> <!-- Align items horizontally -->
                                            <div class='col'>
                                                <p class='card-text'>Price: ₹$prod_price</p>
                                            </div>
                                            <div class='col-auto'>
                                                <a href='#' class='btn btn-primary'>Add to Cart</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>";
        }
    }
}

?>
