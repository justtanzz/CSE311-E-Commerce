<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart Products</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f7f7f7;
        }

        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
        }

        .product {
            background-color: #fff;
            border: 1px solid #ddd;
            margin-bottom: 20px;
            padding: 20px;
            border-radius: 5px;
        }

        .product img {
            max-width: 100px;
            max-height: 100px;
            margin-right: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Your Cart</h1>
        <?php
        include("connection.php");
        session_start();

        // Get cart items with product details from the database
        $query = "SELECT cart.CartID, cart.PID, cart.Quantity, cart.TotalPrice, product.Pname, product.Price, product.ImageURL FROM cart INNER JOIN product ON cart.PID = product.PID";
        $result = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            $productName = $row["Pname"];
            $productPrice = $row["Price"];
            $productQuantity = $row["Quantity"];
            $totalPrice = $row["TotalPrice"];
            $productImage = $row["ImageURL"];

            echo "<div class='product'>";
            echo "<img src='$productImage' alt='$productName'>";
            echo "<strong>$productName</strong><br>";
            echo "Price: $$productPrice<br>";
            echo "Quantity: $productQuantity<br>";
            echo "Total Price: $$totalPrice<br>";
            echo "</div>";
        }
        ?>
    </div>
</body>
</html>

