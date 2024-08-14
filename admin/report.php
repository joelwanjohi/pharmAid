<?php
include "includes/head.php";
require_once "includes/functions.php"; 

// Check if a date is provided, otherwise use today's date
$date = isset($_GET['date']) ? $_GET['date'] : date('Y-m-d');

// Get the orders for the selected date
$orders = get_orders_by_date($date);

// Calculate total sales
$total_sales = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pharmAid Daily Report</title>
    <link rel="stylesheet" href="styles.css"> 
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        .bg-gradient-danger {
            background: linear-gradient(45deg, #198754, #198754);
            color: white;
            padding: 20px;
            text-align: center;
        }
        .btn {
            border: 2px solid;
            border-radius: 4px;
            padding: 10px 15px;
            cursor: pointer;
            text-decoration: none;
            color: white;
            display: inline-block;
            text-align: center;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
        .btn-success {
            background-color: #28a745;
            border-color: #28a745;
        }
        .btn-success:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }
        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }
        .btn-danger:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }
        .btn-warning {
            background-color: #ffc107;
            border-color: #ffc107;
        }
        .btn-warning:hover {
            background-color: #e0a800;
            border-color: #d39e00;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
        }
        .table-bordered td, .table-bordered th {
            border: 1px solid #dee2e6;
        }
        .table th, .table td {
            padding: 8px;
            text-align: center;
        }
        .table th {
            background-color: #f8f9fa;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-control {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .form-control-sm {
            font-size: 0.875em;
        }
        .text-center {
            text-align: center;
        }
        .text-right {
            text-align: right;
        }
        .d-flex {
            display: flex;
        }
        .justify-content-center {
            justify-content: center;
        }
        .align-items-end {
            align-items: flex-end;
        }
        .mt-4 {
            margin-top: 1.5rem;
        }
        .mb-2 {
            margin-bottom: 0.5rem;
        }
        .shadow {
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .card {
            border: 1px solid #ddd;
            border-radius: 4px;
            overflow: hidden;
            margin-bottom: 20px;
        }
        .card-body {
            padding: 15px;
        }
        .card-header {
            padding: 10px;
            background-color: #f8f9fa;
            border-bottom: 1px solid #ddd;
        }
        .card-tools {
            display: flex;
            justify-content: flex-end;
        }
        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 15px;
        }
        @media print {
            #print-header {
                display: block;
                text-align: center;
            }
            #print-button {
                display: none;
            }
            .card {
                border: none;
                box-shadow: none;
            }
        }
    </style>
</head>
<body>
    <!-- Header Section -->
    <div class="bg-gradient-danger">
        <h2>pharmAid Daily Report</h2>
    </div>

    <!-- Filter Form -->
    <div class="container mt-4">
       
            <div class="card-body">
                <fieldset>
                    <legend>Filter</legend>
                    <form action="report.php" method="GET" id="filter-form">
                        <div class="d-flex align-items-end">
                            <div style="flex: 1; padding-right: 15px;">
                                <div class="form-group">
                                    <label for="date">Choose Date</label>
                                    <input type="date" class="form-control form-control-sm" name="date" id="date" required value="<?php echo $date; ?>">
                                </div>
                            </div>
                            <div style="flex: 1;">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-filter"></i> Filter</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </fieldset>
            </div>
        </div>
    </div>

    <!-- Report Table -->
    <div class="container mt-4">
      
            <div class="card-header">
                <div class="card-tools">
                    <button class="btn btn-success" type="button" id="print-button" onclick="print_r()">
                        <i class="fa fa-print"></i> Print
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div id="printout">
                    <table class="table table-bordered">
                        <colgroup>
                            <col width="5%">
                            <col width="20%">
                            <col width="25%">
                            <col width="20%">
                            <col width="10%">
                            <col width="20%">
                        </colgroup>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Order Code</th>
                                <th>Product</th>
                                <th>Unit Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            if ($orders):
                                foreach ($orders as $index => $order): 
                                    $subtotal = $order['order_quantity'] * $order['item_price'];
                                    $total_sales += $subtotal;
                            ?>
                                <tr>
                                    <td><?php echo $index + 1; ?></td>
                                    <td><?php echo $order['order_id']; ?></td>
                                    <td><?php echo $order['product_name']; ?></td>
                                    <td class="text-right"><?php echo number_format($order['item_price'], 2); ?></td>
                                    <td><?php echo $order['order_quantity']; ?></td>
                                    <td class="text-right"><?php echo number_format($subtotal, 2); ?></td>
                                </tr>
                            <?php 
                                endforeach;
                            else:
                            ?>
                                <tr>
                                    <td colspan="6" class="text-center">No orders found for this date.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="5" class="text-center">Total Sales</th>
                                <th class="text-right"><?php echo number_format($total_sales, 2); ?></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Print Header -->
    <noscript id="print-header">
        <div>
            <div style="text-align: center;">
                <div class="font-weight-bold" style="font-size: 1.25em;">pharmAid Pharmaceuticals</div>
                <div class="font-weight-bold" style="font-size: 1.25em;">Daily Sales Report</div>
                <div class="font-weight-bold" style="font-size: 1.25em;">as of <?php echo date('F j, Y', strtotime($date)); ?></div>
            </div>
            <hr>
        </div>
    </noscript>

    <!-- JavaScript -->
    <script>
        function print_r() {
            var h = document.head.cloneNode(true);
            var el = document.getElementById('printout').cloneNode(true);
            var ph = document.getElementById('print-header').innerHTML;
            var nw = window.open("", "_blank", "width=" + (window.innerWidth * 0.8) + ",left=" + (window.innerWidth * 0.1) + ",height=" + (window.innerHeight * 0.8) + ",top=" + (window.innerHeight * 0.1));
            nw.document.querySelector('head').innerHTML = h.innerHTML;
            nw.document.querySelector('body').innerHTML = ph + el.outerHTML;
            nw.document.close();
            setTimeout(() => {
                nw.print();
                setTimeout(() => {
                    nw.close();
                }, 200);
            }, 300);
        }
    </script>
</body>
</html>