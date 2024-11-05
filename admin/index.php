<?php
include "includes/head.php";
?>

<body>

  <?php
  include "includes/header.php";
  ?>

  <div class=" container-fluid">

    <?php
    include "includes/sidebar.php";
    ?>
    <style>
      /* Custom CSS to replace Bootstrap */

body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}

.main-content {
    padding: 20px;
}

.card-container {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
}

.card {
    border: 1px solid #ddd;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    width: 25rem;
    background-color: #fff;
    margin-bottom: 20px;
    padding: 10px;
}

.card-img-top {
    width: 5rem;
    margin: 20px;
}

.card-body {
    padding: 15px;
}

.card-title {
    font-size: 1.25rem;
    margin: 0;
}

.card-text {
    margin: 10px 0;
}

.btn {
    display: inline-block;
    font-size: 1rem;
    font-weight: bold;
    text-align: center;
    text-decoration: none;
    padding: 10px 20px;
    border-radius: 4px;
    border: none;
    cursor: pointer;
}

.btn-primary {
    background-color: #007bff;
    color: #fff;
}

.btn-primary:hover {
    background-color: #0056b3;
}
    </style>
<main class="main-content">
    <br>
    <div class="card-container">
        <div class="card">
            <a href="orders.php">
                <img class="card-img-top" src="../images/shopping-cart.svg" alt="Orders">
            </a>
            <div class="card-body">
                <h5 class="card-title">Orders</h5>
                <p class="card-text">Display and modify the orders details.</p>
                <a href="orders.php" class="btn btn-primary">Go to orders page</a>
            </div>
        </div>
        <div class="card">
            <a href="products.php">
                <img class="card-img-top" src="../images/package.svg" alt="Products">
            </a>
            <div class="card-body">
                <h5 class="card-title">Products</h5>
                <p class="card-text">Display and modify the products details.</p>
                <a href="products.php" class="btn btn-primary">Go to products page</a>
            </div>
        </div>
    </div>
    <div class="card-container">
        <div class="card">
            <a href="customers.php">
                <img class="card-img-top" src="../images/users.svg" alt="Customers">
            </a>
            <div class="card-body">
                <h5 class="card-title">Customers</h5>
                <p class="card-text">Display and modify the customers details.</p>
                <a href="customers.php" class="btn btn-primary">Go to customers page</a>
            </div>
        </div>
        <div class="card">
            <a href="admin.php">
                <img class="card-img-top" src="../images/user.svg" alt="Pharmacist">
            </a>
            <div class="card-body">
                <h5 class="card-title">Pharmacist</h5>
                <p class="card-text">Display and modify the Pharmacist details.</p>
                <a href="admin.php" class="btn btn-primary">Go to Pharmacist page</a>
            </div>
        </div>
    </div>
</main>

  <?php
  include "includes/footer.php"
  ?>
</body>

</html>