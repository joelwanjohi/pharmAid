<?php
session_start();
$connection = mysqli_connect("localhost", "root", "", "PharmEasy");

// Function to execute SQL queries
function query($query)
{
    global $connection;
    $run = mysqli_query($connection, $query);
    if ($run) {
        while ($row = $run->fetch_assoc()) {
            $data[] = $row;
        }
        return !empty($data) ? $data : []; // Return data array if not empty, otherwise an empty array
    } else {
        return []; // Return empty array on query failure
    }
}

// Function to retrieve cart items from database based on session data
function get_cart()
{
    $data = [];
    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $cart_item) {
            $item_id = $cart_item['item_id'];
            $query = "SELECT item_id, item_image, item_title, item_quantity, item_price, item_brand FROM item WHERE item_id='$item_id'";
            $result = query($query);
            if (!empty($result)) {
                $result[0]['quantity'] = $cart_item['quantity']; // Add quantity to result array
                $data[] = $result[0]; // Assuming query returns only one row per item_id
            }
        }
    }
    return $data;
}

// Function to calculate total price of items in cart
function total_price($data)
{
    $sum = 0;
    foreach ($data as $item) {
        if (isset($item['item_price']) && isset($item['quantity'])) {
            $sum += ($item['item_price'] * $item['quantity']);
        }
    }
    return $sum;
}

// Fetch cart items and calculate total price
$cart_items = get_cart();
$total = total_price($cart_items);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Receipt</title>
    <link rel="stylesheet" type="text/css" href="/print.css" media="print">
    <style>
           
        .btn-custom {
            padding: 10px 20px; /* Adjust padding to match */
            font-size: 16px; /* Adjust font size to match */
            background-color: #28a745; /* Green background */
            color: #fff; /* White text color */
            border: none; /* No border */
            border-radius: 0.3rem; /* Rounded corners */
            text-decoration: none; /* Remove underline */
            display: inline-block; /* Inline block for alignment */
            margin-right: 10px; /* Space between buttons */
            border: none;
            cursor: pointer;
            font-family: Arial, sans-serif;
        }
        .btn-custom:hover {
            background-color: #218838; /* Darker green on hover */
        }
        .button-container {
            text-align: right; /* Align content to the right */
        }
  
        /* print.css */
@media print {
    body {
        font-family: 'Courier', monospace;
        font-size: 16px;
    }

    .receipt {
        width: 80%;
        margin: 0 auto;
        padding: 20px;
        border: 1px solid #ccc;
        page-break-after: always;
    }

    .logo {
        text-align: center;
        margin-bottom: 10px;
    }

    .logo img {
        max-width: 200px;
        height: auto;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    table, th, td {
        border: 1px solid #ccc;
    }

    th, td {
        padding: 10px;
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
    }

    .total {
        text-align: right;
        margin-top: 20px;
    }

    /* Hide everything except the printable content */
    body * {
        visibility: hidden;
    }

    .receipt, .receipt * {
        visibility: visible;
    }

    .receipt {
        position: absolute;
        left: 0;
        top: 0;
    }

    /* Hide the print button during printing */
    .print-button {
        display: none;
    }
}
        body {
            font-family: courier;
            font-size: 16px;
        }
        .receipt {
            width: 80%;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
        }
        .logo {
            text-align: center;
            margin-bottom: 10px;
        }
        .logo img {
            max-width: 200px;
            height: auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #ccc;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .total {
            text-align: right;
            margin-top: 20px;
        }
        .print-button {
            text-align: center;
            margin-top: 20px;
        }
        .print-button button {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #28a745; /* Green button color */
            color: #fff;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>

<div class="receipt">
    <div class="logo">
        <img src="images/pharmAid.png" alt="PharmAid Logo">
    </div>
    <h2>Order Receipt</h2>
    <table>
        <thead>
            <tr>
                <th>Item</th>
                <th>Brand</th>
                <th>Price (Ksh)</th>
                <th>Quantity</th>
                <th>Total (Ksh)</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cart_items as $item) : ?>
                <tr>
                    <td><?php echo isset($item['item_title']) ? $item['item_title'] : ''; ?></td>
                    <td><?php echo isset($item['item_brand']) ? $item['item_brand'] : ''; ?></td>
                    <td><?php echo isset($item['item_price']) ? $item['item_price'] : ''; ?></td>
                    <td><?php echo isset($item['quantity']) ? $item['quantity'] : ''; ?></td>
                    <td><?php echo isset($item['item_price']) && isset($item['quantity']) ? ($item['item_price'] * $item['quantity']) : ''; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="total">
        <h3>Total Amount: Ksh <?php echo $total; ?></h3>
    </div>
</div>

<div class="print-button">
    <button onclick="window.print()">Print Receipt</button>
</div>
  <!-- Button to style -->
  <div class="button-container">
  <a href="final.php?order=done" class="btn btn-custom">
            &nbsp;Proceed to Buy Your &nbsp;
        </a>
        </div>
</body>
</html>