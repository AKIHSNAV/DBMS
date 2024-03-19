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
        /* Custom CSS styles */
        body {
            background-color: #f8f9fa;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .cart-item {
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .cart-item img {
            max-width: 100px;
            height: auto;
            margin-right: 10px;
        }

        .cart-item .item-details {
            display: flex;
            align-items: center;
        }

        .cart-item .item-details h4 {
            margin: 0;
        }

        .cart-item .item-price {
            font-weight: bold;
        }

        .cart-item .item-quantity {
            margin-top: 10px;
        }

        .cart-item .item-quantity input {
            width: 50px;
            padding: 5px;
            text-align: center;
        }

        .cart-item .item-remove {
            margin-top: 10px;
        }

        .cart-item .item-remove button {
            padding: 5px 10px;
            background-color: #dc3545;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Cart</h1>
        <a href="index.php" class="btn btn-primary">Home</a> <!-- Add this line -->
        <?php
        show_cart();
        ?>
    </div>
</body>

</html>
