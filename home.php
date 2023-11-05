<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Listing</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f7f7f7;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            width: 80%;
            max-width: 1200px;
        }

        table {
            width: 100%;
            background-color: #fff;
            border-collapse: collapse;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #4caf50;
            color: white;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        .add-to-cart-btn {
            background-color: #4caf50;
            color: white;
            border: none;
            padding: 10px 20px;
            text-decoration: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .add-to-cart-btn:hover {
            background-color: #45a049;
        }

        @media (max-width: 768px) {
            table {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 style="text-align: center;">Product Listing</h1>
        <table>
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        <?php
        session_start();
        include("connection.php");
        mysqli_select_db($conn, 'ecommerce');

        // Get the products from the database
        $query = "SELECT * FROM product";
        $result = $conn->query($query);
        

           while ($row = mysqli_fetch_assoc($result)) {
                // Get the product details
                $PID = $row["PID"];
                $name = $row["Pname"];
                $price = $row["Price"];
                $description = $row["Dsc"];
                $rand = rand(1,100);
                $qty = 1;
                $tprice = $price*$qty;
                $sql = "INSERT INTO Cart(CartID, CustomerID, Price, Quantity, TotalPrice, PID) VALUES
                        ('{$rand}', '{$_SESSION['cid']}', '{$PID}', '{$price}', '{$qty}', '{$tprice}', '{$PID}')";
                $stmt = $conn->prepare($sql);
                $stmt->execute();


                // Display the product details in a table row
                echo "<tr>";
                echo "<td>$name</td>";
                echo "<td>$price</td>";
                echo "<td>$description</td>";
                // Display a button to add the product to the cart
                echo "<td><form action='Cart.php' method='post'>";
                echo "<input type='hidden' name='id' value='$PID'>";
                echo "<input class='add-to-cart-btn' type='submit' name='add' value='Add to Cart'>";
                echo "</form></td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>
