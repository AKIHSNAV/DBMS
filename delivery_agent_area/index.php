<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Quickcart</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-RE7UfBeNBJvXd/9SBwzDWjuQFMJFGF9ILrji6TwRVzhZdY9/G4M+n3W57sJa0K/dgnALyi4XubYjxLmVl4OeOg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-image: linear-gradient(120deg, #fdfbfb 0%, #ebedee 100%);
            text-align: center;
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        h1 {
            color: #007bff;
            margin-top: 20px;
        }
        h2 {
            color: #343a40;
        }
        .options {
            list-style-type: none;
            padding: 0;
            margin-top: 30px;
        }
        .option {
            display: inline-block;
            margin: 20px;
        }
        .option a {
            text-decoration: none;
            color: #fff;
            font-size: 20px;
            background-color: #007bff;
            padding: 10px 20px;
            border-radius: 5px;
            transition: all 0.3s ease;
        }
        .option a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Welcome Delivery Agent</h1>
    <ul class="options">
        <li class="option">
            <a href="delivery_login.php">
                <i class="fas fa-shopping-cart"></i> Login
            </a>
        </li>
        <li class="option">
            <a href="#">
                <i class="fas fa-user-shield"></i> Sign Up
            </a>
        </li>
    </ul>
</body>
</html>
