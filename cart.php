<?php
include "includes/head.php"
?>
<style>
    body {
        font-family: Arial, sans-serif;
        line-height: 1.6;
        margin: 0;
        padding: 0;
    }
    .container-fluid {
        width: 90%;
        margin: 0 auto;
    }
    .shopping {
        margin: 10px;
        border-bottom: 4px solid #000;
        font-weight: bold;
    }
    .card {
        border: 1px solid #ddd;
        margin-bottom: 20px;
        display: flex;
        flex-direction: row;
    }
    .card-image {
        flex: 1;
        padding: 10px;
    }
    .card-image img {
        width: 100%;
        max-width: 320px;
        height: auto;
    }
    .card-body {
        flex: 2;
        padding: 15px;
    }
    .card-title {
        font-size: 1.2em;
        margin-bottom: 10px;
    }
    .btn {
        display: inline-block;
        padding: 8px 15px;
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s;
    }
    .btn-outline-danger {
        color: #dc3545;
        border: 1px solid #dc3545;
    }
    .btn-outline-danger:hover {
        background-color: #dc3545;
        color: white;
    }
    .btn-outline-success {
        color: #28a745;
        border: 1px solid #28a745;
    }
    .btn-outline-success:hover {
        background-color: #28a745;
        color: white;
    }
    .btn-lg {
        padding: 10px 20px;
        font-size: 1.1em;
    }
    .total-section {
        text-align: center;
        margin: 20px 0;
    }
    .action-buttons {
        text-align: center;
        margin: 20px 0;
    }
    .empty-cart {
        text-align: center;
    }
    .empty-cart img {
        max-width: 100%;
        height: auto;
    }
</style>
<body>

    <div class="shopping">
        <h3>My Cart</h3>
        <hr>
    </div>

    <div class="container-fluid">
        <?php
        if (!empty($_SESSION['cart'])) {
            $data = get_cart();
            delete_from_cart();
            $num = sizeof($data);
            for ($i = 0; $i < $num; $i++) {
                if (isset($data[$i])) {
        ?>
                    <div class="card">
                        <div class="card-image">
                            <img src="images/<?php echo $data[$i][0]['item_image'] ?>" alt="<?php echo $data[$i][0]['item_title'] ?>">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $data[$i][0]['item_title'] ?></h5>
                            <?php if ($data[$i][0]['item_quantity'] > 0) { ?>
                                <small style="color: #28a745;">In Stock</small>
                            <?php } else { ?>
                                <small style="color: #dc3545;">Out Of Stock</small>
                            <?php } ?>
                            <p><strong>Ksh<?php echo $data[$i][0]['item_price'] ?></strong></p>
                            <p><strong>Brand Name: </strong><span style="color: #28a745;"><?php echo $data[$i][0]['item_brand'] ?></span></p>
                            <p><strong>Quantity: </strong><span style="color: #28a745;"><?php echo $_SESSION['cart'][$i]['quantity'] ?></span></p>
                            <a href="cart.php?delete=<?php echo $data[$i][0]['item_id'] ?>" class="btn btn-outline-danger">Delete</a>
                        </div>
                    </div>
            <?php
                }
            }
            ?>
            <div class="shopping">
                <h3>Total</h3>
                <hr>
            </div>
            <div class="total-section">
                <h5>Total (<?php
                    $total = total_price($data);
                    echo $num . " " . ($num == 1 ? "item" : "items");
                ?>) : Ksh<?php echo $total ?></h5>
            </div>
            <div class="action-buttons">
                <a href="cart.php?delete_all=1" class="btn btn-outline-danger btn-lg">Delete all Products!</a>
                <a href="receipt.php?order=done" class="btn btn-outline-success btn-lg">Checkout</a>
            </div>
        <?php
        } else {
        ?>
            <div class="empty-cart">
                <h1 style="font-family: 'Fredoka One', cursive;">No products in the Cart</h1>
                <p style="font-family: 'Fredoka One', cursive;">Please add at least one product to Buy</p>
                <img src="images/nocart.png" alt="Empty Cart">
            </div>
        <?php
        }
        ?>
    </div>

    <?php include "includes/footer.php" ?>
</body>
</html>