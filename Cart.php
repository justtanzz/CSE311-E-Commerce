<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #333;
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .cart-container {
            background-color: #444;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
            padding: 20px;
        }

        .cart-item {
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div class="cart-container">
        <h1>Shopping Cart</h1>
        <?php
        session_start();

        if(isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
            foreach ($_SESSION['cart'] as $item) {
                $name = $item['name'];
                $price = $item['price'];
                $description = $item['description'];
                $image = $item['image'];

                echo "<div class='cart-item'>";
                echo "<img src='$image' alt='$name' style='width: 50px; height: 50px; object-fit: cover; border-radius: 5px; margin-right: 10px;'>";
                echo "<strong>$name</strong> - $$price<br>";
                echo "<em>$description</em>";
                echo "</div>";
            }
        } else {
            echo "<p>Your cart is empty.</p>";
        }
        ?>
        <a href="product_listing.php" style="color: #4caf50; text-decoration: none;">Continue Shopping</a>
    </div>
</body>
</html>
