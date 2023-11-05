<?php
session_start();
// Connect to the database
include "connection.php";
include "login.php";

// Get the products from the database
$query = "SELECT * FROM product";
$result = mysqli_query($db, $query);

// Display the products in a table
echo "<table>";
echo "<tr><th>Name</th><th>Price</th><th>Description</th><th>Add to Cart</th></tr>";
while ($row = mysqli_fetch_assoc($result)) {
    // Get the product details
    $PID = $row["PID"];
    $name = $row["Pname"];
    $price = $row["Price"];
    $description = $row["Dsc"];

    // Display the product details in a table row
    echo "<tr>";
    echo "<td>$name</td>";
    echo "<td>$price</td>";
    echo "<td>$description</td>";
    // Display a button to add the product to the cart
    echo "<td><form action='add_to_cart.php' method='post'>";
    echo "<input type='hidden' name='id' value='$PID'>";
    echo "<input type='submit' name='add' value='Add to Cart'>";
    echo "</form></td>";
    echo "</tr>";
}
echo "</table>";
?>