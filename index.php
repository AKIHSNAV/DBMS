<?php
include ('./includes/connect.php'); // Connect file to MySQL
include ('./functions/common_function.php'); // Common functions file
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
    <link rel="stylesheet" href="style.css">
    <style>
        body{
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
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Products</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#">Reviews</a>
                        </li>

                        <li class = "nav-item">
                        <div class="nav-link"><i id="shopping-cart-icon" class="fa fa-shopping-cart" data-bs-toggle="dropdown"></i><sup> <?php cart_item();?></sup>
                            <div class="dropdown-menu" id="cart-dropdown">
                                <div class="cart-dropdown-header">
                                    <h6>My Cart</h6>
                                </div>
                                <div class="cart-dropdown-body" style="max-height: 50vh; overflow-y: auto; width: 40vh;">
                                    <?php show_cart();?>
                                </div>
                                <div class="cart-dropdown-footer">
                                    <a href="cart.php" class="btn btn-primary">Go to Cart</a>
                                    <?php
                                    $totalPrice = total_cart(); // Get the total cart price
                                    $walletBalance = wallet(); // Get the wallet balance

                                    if ($totalPrice <= $walletBalance) {
                                        echo '<a href="checkout.php" class="btn btn-success" >Checkout</a>'; // Allow checkout if wallet has sufficient funds
                                    } else {
                                        echo '<p>Insufficient funds in wallet, cannot checkout!</p>'; // Display message for insufficient funds
                                    }
                                    ?>

                                    <strong>Rs. <?php echo total_cart();?></strong>
                                </div>
                            </div>
                        </div>
                        </li>

                        <li class = "wallet">
                            <!-- use a wallet symbol -->
                            <a href="#" class="nav-link"><i class = "fa fa-wallet"></i> Wallet: Rs. <?php echo wallet(); ?></a>
                        </li>
                        
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="cart.php"><i class="fa fa-shopping-cart"></i><sup> <?php cart_item();?></sup></a>
                        </li> -->
                        <li class = "total_price">
                            <a href="#" class="nav-link">Total Price: Rs. <?php echo total_cart();?></a>
                        </li>

                    </ul>
                    
                    <form class="d-flex" role="search" action="search_bar.php" method="get">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_bar">
                        <!-- <button class="btn btn-outline-success" type="submit">Search</button> -->
                        <input type="submit" value="Search" class="btn btn-outline-success" name="search_data">
                    </form>
                </div>
            </div>
        </nav>

        <!-- calling Cart function -->
        
        <?php
        Cart();
        remove_cart();
        updateCart();
        ?>


        <!-- second child -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Welcome Guest</a> <!-- will be changed to customer's name -->
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Login</a>
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
                        display_products();
                        display_cat_products();
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
                        display_categories();
                        ?>
                    </ul>
                </div>
            </div>
        



        <!-- last child - footer -->
        <?php
            include("./includes/footer.php");
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