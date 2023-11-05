<?php
// Get the supplier id from the session
$supplier_id = $_SESSION["supplier_id"];

// Get the supplier name from a variable
$supplier_name = $supplier_name_variable;

// Get the supplier's products from an array
$products = $products_array;

// Define some colours for the page
$bg_color = "#F0F0F0"; // Background colour
$hd_color = "#FFC107"; // Header colour
$bt_color = "#007BFF"; // Button colour
$tx_color = "#FFFFFF"; // Text colour
?>

<!DOCTYPE html>
<html>
<head>
  <title>Supplier Dashboard</title>
  <style>
    /* Style the header */
    .header {
      background-color: <?php echo $hd_color; ?>;
      padding: 20px;
      text-align: center;
    }

    /* Style the table */
    .table {
      border-collapse: collapse;
      width: 80%;
      margin: 0 auto;
    }

    /* Style the table header */
    .table th {
      border: 1px solid #dddddd;
      padding: 8px;
      text-align: left;
      background-color: <?php echo $hd_color; ?>;
      color: <?php echo $tx_color; ?>;
    }

    /* Style the table data */
    .table td {
      border: 1px solid #dddddd;
      padding: 8px;
      text-align: left;
    }

    /* Style the table odd rows */
    .table tr:nth-child(odd) {
      background-color: #dddddd;
    }

    /* Style the table even rows */
    .table tr:nth-child(even) {
      background-color: #ffffff;
    }

    /* Style the buttons */
    .button {
      background-color: <?php echo $bt_color; ?>;
      border: none;
      color: <?php echo $tx_color; ?>;
      padding: 10px 20px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      margin: 10px;
      cursor: pointer;
    }
  </style>
</head>
<body style="background-color: <?php echo $bg_color; ?>;">
  <!-- Display the header with the supplier name -->
  <div class="header">
    <h1>Welcome <?php echo $supplier_name; ?>!</h1>
  </div>

  <!-- Display the table with the supplier's products -->
  <table class="table">
    <tr>
      <th>Product ID</th>
      <th>Product Name</th>
      <th>Product Price</th>
      <th>Product Quantity</th>
      <th>Actions</th>
    </tr>
    <?php foreach ($products as $product) { ?>
    <tr>
      <td><?php echo $product["id"]; ?></td>
      <td><?php echo $product["name"]; ?></td>
      <td><?php echo $product["price"]; ?></td>
      <td><?php echo $product["quantity"]; ?></td>
      <td>
        <!-- Display the buttons for updating, deleting and adding products -->
        <a href="update_product.php?id=<?php echo $product["id"]; ?>" class="button">Update</a>
        <a href="delete_product.php?id=<?php echo $product["id"]; ?>" class="button">Delete</a>
      </td>
    </tr>
    <?php } ?>
  </table>

  <!-- Display the button for adding a new product -->
  <div style="text-align: center;">
    <a href="add_product.php" class="button">Add New Product</a>
  </div>
</body>
</html>
