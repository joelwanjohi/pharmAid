<?php include "includes/head.php"; ?>
<style>
    /* General Styles */
    body {
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
    }

    .container {
        margin-top: 20px;
        margin-left: 0%;
    }

    /* Sidebar styles */
    .sidebar {
        position: fixed;
        top: 0;
        left: 0;
        width: 100px;
        height: 100%;
        background-color: #f8f9fa;
        padding: 15px;
        box-shadow: 2px 0 5px rgba(0,0,0,0.1);
    }

    .main-content {
        margin-left: 250px; /* Width of the sidebar */
        padding: 20px;
    }

    /* Header styles */
    header {
        position: sticky;
            top: 0;
            z-index: 1030;
            background-color:  #198754;
            color: #fff;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 15px;
        
    }

    /* Forms */
    form {
        margin-bottom: 20px;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-control {
        width: 100%;
        padding: 0.375rem 0.75rem;
        font-size: 1rem;
        line-height: 1.5;
        border: 1px solid #ced4da;
        border-radius: 0.25rem;
    }

    .form-control::placeholder {
        color: #6c757d;
    }

    .form-text {
        font-size: 0.875rem;
        color: #6c757d;
    }

    /* Buttons */
    .btn {
        display: inline-block;
        font-weight: 400;
        text-align: center;
        vertical-align: middle;
        cursor: pointer;
        border: 1px solid transparent;
        border-radius: 4px;
        padding: 0.5rem 1rem;
        text-decoration: none;
        color: #198754;
    }

    .btn-outline-primary {
        color: #007bff;
        border-color: #007bff;
        background-color: transparent;
    }

    .btn-outline-danger {
        color: #dc3545;
        border-color: #dc3545;
        background-color: transparent;
    }

    .btn-outline-warning {
        color: #ffc107;
        border-color: #ffc107;
        background-color: transparent;
    }

    .btn-outline-primary:hover {
        color: #fff;
        background-color: #007bff;
    }

    .btn-outline-danger:hover {
        color: #fff;
        background-color: #dc3545;
    }

    .btn-outline-warning:hover {
        color: #fff;
        background-color: #ffc107;
    }

    /* Table */
    .table {
        width: 100%;
        border-collapse: collapse;
    }

    .table th, .table td {
        border: 1px solid #dee2e6;
        padding: 8px;
        text-align: left;
    }

    .table thead {
        background-color: #f1f1f1;
    }

    .table-striped tbody tr:nth-of-type(odd) {
        background-color: #f9f9f9;
    }

    .table-responsive {
        overflow-x: auto;
    }
</style>

<body>
    <?php include "includes/header.php"; ?>

    <div class="sidebar">
        <?php include "includes/sidebar.php"; ?>
    </div>

    <div class="main-content">
        <?php
        message();
        ?>

        <div class="container">
            <div class="row align-items-start">
                <div class="col">
                    <h2>Products details</h2>
                </div>
                <div class="col">
                    <!-- Empty Column -->
                </div>
                <div class="col">
                    <form class="d-flex" method="GET" action="products.php">
                        <input class="form-control" type="search" name="search_item_name" placeholder="Search for product" aria-label="Search">
                        <button class="btn btn-outline-secondary" type="submit" name="search_item" value="search">Search</button>
                    </form>
                </div>
            </div>

            <?php
            edit_item($_SESSION['id']);

            if (isset($_GET['edit'])) {
                $_SESSION['id'] = $_GET['edit'];
                $data = get_item($_SESSION['id']);
            ?>
                <h2>Edit Product Details</h2>
                <form action="products.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="existing_image" value="<?php echo htmlspecialchars($data[0]['item_image']); ?>">
                    <div class="form-group">
                        <label>Product name</label>
                        <input pattern="[A-Za-z0-9_]{1,25}" type="text" class="form-control" placeholder="<?php echo $data[0]['item_title'] ?>" name="name">
                        <div class="form-text">Please enter the product name in range (1-25) characters, special characters not allowed!</div>
                    </div>
                    <div class="form-group">
                        <label>Brand name</label>
                        <input pattern="[A-Za-z0-9_]{1,25}" type="text" class="form-control" placeholder="<?php echo $data[0]['item_brand'] ?>" name="brand">
                        <div class="form-text">Please enter the brand name in range (1-25) characters, special characters not allowed!</div>
                    </div>
                    <div class="form-group">
                        <label>Category</label>
                        <select name="cat" class="form-control">
                           <option value="HealthCare Products">HealthCare Products</option>
                            <option value="Viatmin & Supplements">Viatmin & Supplements</option>
                            <option value="Equipments & Diagnostics">Equipments & Diagnostics</option>
                            <option value="Family Planning">Family Planning</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Product tags</label>
                        <input pattern="^[#.0-9a-zA-Z\s,-]+$" type="text" class="form-control" placeholder="<?php echo $data[0]['item_tags'] ?>" name="tags">
                        <div class="form-text">Please enter tags for the product in range (1-250) characters, special characters not allowed!</div>
                    </div>
                    <div class="form-group">
                        <label>Product image</label>
                        <input type="file" accept="image/*" class="form-control"  placeholder="<?php echo $data[0]['item_image'] ?>" name="image">
                        <div class="form-text">Please upload an image for the product.</div>
                    </div>
                    <div class="form-group">
                        <label>Product quantity</label>
                        <input type="number" class="form-control" placeholder="<?php echo $data[0]['item_quantity'] ?>" name="quantity" min="1" max="999">
                        <div class="form-text">Please enter the quantity of the product in range (1-999).</div>
                    </div>
                    <div class="form-group">
                        <label>Product price</label>
                        <div class="input-group">
                            <span class="input-group-text">Ksh</span>
                            <input pattern="[0-9]+" type="text" class="form-control" aria-label="Amount" name="price" placeholder="<?php echo $data[0]['item_price'] ?>">
                            <span class="input-group-text">.00</span>
                        </div>
                        <div class="form-text">Please enter the price of the product.</div>
                    </div>
                    <div class="form-group">
                        <label>Product details</label>
                        <input type="text" class="form-control" placeholder="<?php echo $data[0]['item_details'] ?>" name="details">
                        <div class="form-text">Please enter the product details.</div>
                    </div>
                    <button type="submit" class="btn btn-outline-primary" value="update" name="update">Submit</button>
                    <button type="submit" class="btn btn-outline-danger" value="cancel" name="cancel">Cancel</button>
                </form>
            <?php
              } ?>

            <?php add_item();
             if (isset($_GET['add'])) { 
                ?>
                <h2>Add Product</h2>
                <form action="products.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Product name</label>
                        <input type="text" class="form-control" placeholder="Product name" name="name">
                        <div class="form-text">Please enter the product name in range (1-25) characters, special characters not allowed!</div>
                    </div>
                    <div class="form-group">
                        <label>Brand name</label>
                        <input type="text" class="form-control" placeholder="Product brand" name="brand">
                        <div class="form-text">Please enter the brand name in range (1-25) characters, special characters not allowed!</div>
                    </div>
                    <div class="form-group">
                        <label>Category</label>
                        <select name="cat" class="form-control">
                            <option value="HealthCare Products">HealthCare Products</option>
                            <option value="Viatmin & Supplements">Viatmin & Supplements</option>
                            <option value="Equipments & Diagnostics">Equipments & Diagnostics</option>
                            <option value="Family Planning">Family Planning</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Product tags</label>
                        <input pattern="^[#.0-9a-zA-Z\s,-]+$" type="text" class="form-control" placeholder="Product tags" name="tags">
                        <div class="form-text">Please enter tags for the product in range (1-250) characters, special characters not allowed!</div>
                    </div>
                    <div class="form-group">
                        <label>Product image</label>
                        <input type="file" accept="image/*" class="form-control" name="image">
                        <div class="form-text">Please upload an image for the product.</div>
                    </div>
                    <div class="form-group">
                        <label>Product quantity</label>
                        <input type="number" class="form-control" name="quantity" min="1" max="999">
                        <div class="form-text">Please enter the quantity of the product in range (1-999).</div>
                    </div>
                    <div class="form-group">
                        <label>Product price</label>
                        <div class="input-group">
                            <span class="input-group-text">Ksh</span>
                            <input pattern="[0-9]+" type="text" class="form-control" aria-label="Amount" name="price">
                            <span class="input-group-text">.00</span>
                        </div>
                        <div class="form-text">Please enter the price of the product.</div>
                    </div>
                    <div class="form-group">
                        <label>Product details</label>
                        <input type="text" class="form-control" name="details">
                        <div class="form-text">Please enter the product details.</div>
                    </div>
                    <button type="submit" class="btn btn-outline-primary" value="update" name="add_item">Submit</button>
                    <button type="submit" class="btn btn-outline-danger" value="cancel" name="cancel">Cancel</button>
                </form>
            <?php
             }
             ?>

            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Brand</th>
                            <th>Category</th>
                            <th>Tags</th>
                            <th>Image</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Details</th>
                            <th>
                                <button type="button" class="btn btn-outline-primary"><a href="products.php?add=1" style="text-decoration: none; color: black;">Add</a></button>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $data = all_items();
                        delete_item();
                        if (isset($_GET['search_item'])) {
                            $query = search_item();
                            if (isset($query)) {
                                $data = $query;
                            } else {
                                get_redirect("products.php");
                            }
                        } elseif (isset($_GET['id'])) {
                            $data = get_item_details();
                        }
                        if (isset($data)) {
                            $num = sizeof($data);
                            for ($i = 0; $i < $num; $i++) {
                        ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $data[$i]['item_id']; ?></td>
                                <td><?php echo $data[$i]['item_title']; ?></td>
                                <td><?php echo $data[$i]['item_brand']; ?></td>
                                <td><?php echo $data[$i]['item_cat']; ?></td>
                                <td><?php echo $data[$i]['item_tags']; ?></td>
                                <td><?php echo $data[$i]['item_image']; ?></td>
                                <td><?php echo $data[$i]['item_quantity']; ?></td>
                                <td><?php echo $data[$i]['item_price']; ?></td>
                                <td><?php echo $data[$i]['item_details']; ?></td>
                                <td>
                                    <button type="button" class="btn btn-outline-warning"><a href="products.php?edit=<?php echo $data[$i]['item_id']; ?>" style="text-decoration: none; color: black;">Edit</a></button>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-outline-danger"><a href="products.php?delete=<?php echo $data[$i]['item_id']; ?>" style="text-decoration: none; color: black;">Delete</a></button>
                                </td>
                            </tr>
                        <?php 
                    }
                     } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <?php
     include "includes/footer.php"; 
     ?>
</body>