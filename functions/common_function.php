<?php
include ('./includes/connect.php'); // Connect file to MySQL

// display all products on home-page
function display_products()
{
    global $con;
    if (!isset ($_GET['cat'])) {
        $select_prod = "SELECT * FROM product";
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
                                <img src='./images/$prod_image' class='card-img-top' alt='$prod_name image'>
                                <div class='card-body d-flex flex-column'> <!-- Use flex column to align content -->
                                    <h5 class='card-title'>$prod_name</h5>
                                    <p class='card-text flex-grow-1'>$prod_desc</p> <!-- Truncated description -->
                                    <div class='row justify-content-between align-items-center'> <!-- Align items horizontally -->
                                        <div class='col'>
                                            <p class='card-text'>Price: ₹$prod_price</p>
                                        </div>
                                        <div class='col-auto'>
                                            <a href='index.php?add_to_cart=$prod_id' class='btn btn-primary'>Add to Cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>";
        }
    }
}

// display unique category products only
function display_cat_products()
{
    global $con;
    if (isset ($_GET['cat'])) {
        $cat_id = $_GET['cat'];
        $select_prod = "SELECT * FROM product where categoryID = $cat_id";
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
                                    <img src='./images/$prod_image' class='card-img-top' alt='$prod_name image'>
                                    <div class='card-body d-flex flex-column'> <!-- Use flex column to align content -->
                                        <h5 class='card-title'>$prod_name</h5>
                                        <p class='card-text flex-grow-1'>$prod_desc</p> <!-- Truncated description -->
                                        <div class='row justify-content-between align-items-center'> <!-- Align items horizontally -->
                                            <div class='col'>
                                                <p class='card-text'>Price: ₹$prod_price</p>
                                            </div>
                                            <div class='col-auto'>
                                            <a href='index.php?add_to_cart=$prod_id' class='btn btn-primary'>Add to Cart</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>";
        }
    }
}

// display categories on side-nav
function display_categories()
{
    global $con;
    $select_cat = "SELECT * FROM productCategory";
    $cat_result = mysqli_query($con, $select_cat);
    while ($row = mysqli_fetch_assoc($cat_result)) {
        $cat_name = $row["name"];
        $cat_id = $row["categoryID"];
        echo "<li class='nav-item'>
                            <a href='index.php?cat=$cat_id' class='nav-link text-light'>$cat_name</a>
                        </li>";
    }

}

// displaying products searched
function search_products() {
    global $con;
    if (isset ($_GET['search_data'])) {
        $searched_word = $_GET['search_bar'];
        $select_prod = "SELECT * FROM product WHERE name LIKE '%$searched_word%' AND stock>0";
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
                                    <img src='./images/$prod_image' class='card-img-top' alt='$prod_name image'>
                                    <div class='card-body d-flex flex-column'> <!-- Use flex column to align content -->
                                        <h5 class='card-title'>$prod_name</h5>
                                        <p class='card-text flex-grow-1'>$prod_desc</p> <!-- Truncated description -->
                                        <div class='row justify-content-between align-items-center'> <!-- Align items horizontally -->
                                            <div class='col'>
                                                <p class='card-text'>Price: ₹$prod_price</p>
                                            </div>
                                            <div class='col-auto'>
                                            <a href='index.php?add_to_cart=$prod_id' class='btn btn-primary'>Add to Cart</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>";
        }
    }
}

function Cart() {
    if (isset ($_GET['add_to_cart'])) {
        global $con;
        $prod_id = $_GET['add_to_cart'];
        $user_id = 1; // auto set customer id
        $select_cart = "SELECT * FROM addstocart WHERE productID = '$prod_id' AND customerID = '$user_id'";
        $result_query = mysqli_query($con, $select_cart);
        $num_of_rows = mysqli_num_rows($result_query);
        echo "check if the function is called!";
        if ($num_of_rows > 0) {
            echo "<script> alert('Product already added to cart!') </script>";
            echo "<script> window.open('index.php', '_self') </script>";
        }
        else{
            $insert_cart = "INSERT INTO addstocart (customerID, productID, quantity) VALUES ('$user_id', '$prod_id', 1)";
            $result_cart = mysqli_query($con, $insert_cart);
            if ($result_cart) {
                echo "<script>alert('Product added to cart successfully!')</script>";
                echo "<script>window.open('index.php', '_self')</script>";
            }
        }
    }
}

// function to get cart item numbers
function cart_item(){
    global $con;
    $user_id = 1; // auto set customer id
    $select_cart = "SELECT * FROM addstocart WHERE customerID = '$user_id'";
    $result_cart = mysqli_query($con, $select_cart);
    $count_items = mysqli_num_rows($result_cart);
    echo $count_items;

}
//function to get total price in cart
function total_cart(){
    global $con;
    $user_id = 1; // auto set customer id
    $total = 0;
    $select_cart = "SELECT * FROM addstocart WHERE customerID = '$user_id'";
    $result_cart = mysqli_query($con, $select_cart);
    while ($row_cart = mysqli_fetch_assoc($result_cart)) {
        $prod_id = $row_cart['productID'];
        $prod_qty = $row_cart['quantity'];
        $select_prod = "SELECT * FROM product WHERE productID = '$prod_id'";
        $result_prod = mysqli_query($con, $select_prod);
        while ($row_prod = mysqli_fetch_assoc($result_prod)) {
            $prod_price = $row_prod['price'];
            $total += $prod_price * $prod_qty;
        }
    }
    echo $total;

}

function show_cart(){
    global $con;
    $user_id = 1; // auto set customer id
    $select_cart = "SELECT * FROM addstocart WHERE customerID = '$user_id'";
    $result_cart = mysqli_query($con, $select_cart);
    $num_of_rows = mysqli_num_rows($result_cart);
    if ($num_of_rows == 0) {
        echo "<h2 class = 'text-center text-danger'> No Products available in Cart! </h2>";
    }
    while ($row_cart = mysqli_fetch_assoc($result_cart)) {
        $prod_id = $row_cart['productID'];
        $prod_qty = $row_cart['quantity'];
        $select_prod = "SELECT * FROM product WHERE productID = '$prod_id'";
        $result_prod = mysqli_query($con, $select_prod);
        while ($row_prod = mysqli_fetch_assoc($result_prod)) {
            $prod_name = $row_prod['name'];
            $prod_desc = $row_prod['description'];
            $prod_image = $row_prod['prod_image'];
            $prod_price = $row_prod['price'];
            $total_price = $prod_price * $prod_qty;
            echo "<div class='row'>
                            <div class='col-md-3'>
                                <img src='./images/$prod_image' class='img-fluid' alt='$prod_name image'>
                            </div>
                            <div class='col-md-6'>
                                <h5>$prod_name</h5>
                                <p>$prod_desc</p>
                                <p>Price: ₹$prod_price</p>
                            </div>
                            <div class='col-md-3'>
                                <div class='row'>
                                    <div class='col-md-6'>
                                        <input type='number' class='form-control' value='$prod_qty'>
                                    </div>
                                    <div class='col-md-6'>
                                        <a href='#' class='btn btn-danger'>Remove</a>
                                    </div>
                                </div>
                            </div>
                        </div>";
        }
    }
}
?>
