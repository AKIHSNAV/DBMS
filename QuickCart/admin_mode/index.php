<!-- <?php
include('../includes/connect.php'); // Connect file to MySQL
include("../functions/common_function.php"); // Common functions file
?> -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Mode</title>
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
        .footer {
            position: absolute;
            bottom: 0;
            width: 100%;
        }
        body{
            overflow-x: hidden;
        }
    </style>
</head>

<body>
    <!-- navbar -->
    <div class="container-fluid p-0">
        <!-- first child -->
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"><i class="fa fa-shopping-basket" aria-hidden="true"> QuickCart</i></a>
                <nav class="navbar navbar-expand-lg">
                    <ul class="navbar-nav">
                    <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">Welcome Admin</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>

        <!-- second child -->
        <div class="bg-light">
            <h3 class="text-center p-2">Manage Inventory/View Analysis</h3>
        </div>

        <!-- third child -->
        
            <div class="row">
                <div class="col-md-12 bg-secondary p-1 align-items-center">
                    <div class="button text-center">
                        <button class="my-3"><a href="index.php?insert_product" class="nav-link text-dark bg-info my-1 mx-1">Insert
                                Products</a></button>
                        <button class="my-3"><a href="index.php?view_product" class="nav-link text-dark bg-info my-1 mx-1">View
                                Products</a></button>
                        <button class="my-3"><a href="index.php?insert_category" class="nav-link text-dark bg-info my-1 mx-1">Insert
                                Categories</a></button>
                        <button class="my-3"><a href="" class="nav-link text-dark bg-info my-1 mx-1">View
                                Categories</a></button>
                        <button class="my-3"><a href="" class="nav-link text-dark bg-info my-1 mx-1">All
                                Orders</a></button>
                        <button class="my-3"><a href="" class="nav-link text-dark bg-info my-1 mx-1">List
                                Customers</a></button>
                        <button class="my-3"><a href="" class="nav-link text-dark bg-info my-1 mx-1">List Delivery
                                Agents</a></button>
                        <button class="my-3"><a href="" class="nav-link text-dark bg-info my-1 mx-1">Logout</a></button>
                    </div>
                </div>
            </div>
        


        <!-- fourth child -->
        <div class="container my-3">
            <?php
            if(isset($_GET['insert_category'])){
                include('insert_category.php');
            }
            if(isset($_GET['insert_product'])){
                include('insert_product.php');
            }
            if(isset($_GET['view_product'])){
                include('view_product.php');
            }
            ?>
        </div>



        <!-- last child -->
        <!-- <div class="bg-info p-2 text-center footer">
            <p> All rights reserved © 2023-2024, QuickCart.com</p>
        </div> -->
    </div>



    <!-- bootstrap JS link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

    <!-- JS file link -->    
    <!-- <script src="script.js"></script> -->
</body>

</html>