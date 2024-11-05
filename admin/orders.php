<?php
include "includes/head.php";
?>

<body>
    <?php
    include "includes/header.php";
    ?>

    <?php
    include "includes/sidebar.php";
    ?>
    <main style="margin-left: 250px; padding: 20px;">
        <?php
        message();
        ?>
        <div style="padding: 20px;">
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <div>
                    <h2>Order details</h2>
                </div>
                <div>
                    <form style="display: flex;" method="GET" action="orders.php">
                        <input style="flex: 1; padding: 8px; margin-right: 8px; border: 1px solid #ced4da; border-radius: 4px;" type="search" name="search_order_id" placeholder="Search for order (ID)" aria-label="Search">
                        <button style="padding: 8px 16px; border: 1px solid #ced4da; border-radius: 4px; background-color: #f8f9fa; color: #333; cursor: pointer;" type="submit" name="search_order" value="search">Search</button>
                    </form>
                </div>
            </div>
        </div>

        <div style="overflow-x: auto; padding: 20px;">
            <table style="width: 100%; border-collapse: collapse;">
                <thead>
                    <tr style="border-bottom: 2px solid #dee2e6;">
                        <th style="padding: 8px; text-align: left;">#</th>
                        <th style="padding: 8px; text-align: left;">ID</th>
                        <th style="padding: 8px; text-align: left;">User ID</th>
                        <th style="padding: 8px; text-align: left;">Product ID</th>
                        <th style="padding: 8px; text-align: left;">Product Quantity</th>
                        <th style="padding: 8px; text-align: left;">Order Date</th>
                        <th style="padding: 8px; text-align: left;">Order Status</th>
                        <th style="padding: 8px; text-align: left;">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $data = all_orders();
                    delete_order();
                    if (isset($_GET['search_order'])) {
                        $query = search_order();
                        if (!empty($query)) {
                            $data = $query;
                        } else {
                            get_redirect("orders.php");
                        }
                    }
                    $num = sizeof($data);
                    for ($i = 0; $i < $num; $i++) {
                    ?>
                        <tr style="<?php echo ($i % 2 == 0) ? 'background-color: #f8f9fa;' : ''; ?> border-bottom: 1px solid #dee2e6; border-top: 2px solid #dee2e6;">
                            <td style="padding: 8px;"><?php echo $i ?></td>
                            <td style="padding: 8px;"><?php echo $data[$i]['order_id'] ?></td>
                            <td style="padding: 8px;"><?php echo $data[$i]['user_id'] ?></td>
                            <td style="padding: 8px;"><?php echo $data[$i]['item_id'] ?></td>
                            <td style="padding: 8px;"><?php echo $data[$i]['order_quantity'] ?></td>
                            <td style="padding: 8px;"><?php echo $data[$i]['order_date'] ?></td>
                            <?php if ($data[$i]['order_status'] == 1) {
                            ?>
                                <td style="padding: 8px; color: green;">
                                    Shipped
                                </td>
                            <?php
                            } else {
                            ?>
                                <td style="padding: 8px; color: red;">
                                    Pending
                                </td>
                            <?php
                            }
                            ?>
                            <td style="padding: 8px;">
                                <button style="padding: 8px 16px; border: 1px solid #ced4da; border-radius: 4px; background-color: #f8d7da; color: #721c24; cursor: pointer;">
                                    <a style="text-decoration: none; color: black;" href="orders.php?delete=<?php echo $data[$i]['order_id'] ?>">Delete</a>
                                </button>
                            </td>

                            <?php if ($data[$i]['order_status'] == 1) {
                            ?>
                                <td style="padding: 8px;">
                                    <button style="padding: 8px 16px; border: 1px solid #ced4da; border-radius: 4px; background-color: #f8d7da; color: #721c24; cursor: pointer;">
                                        <a style="text-decoration: none; color: black;" href="orders.php?undo=<?php echo $data[$i]['order_id'] ?>">&nbsp;Undo&nbsp;</a>
                                    </button>
                                </td>
                            <?php
                            } else {
                            ?>
                                <td style="padding: 8px;">
                                    <button style="padding: 8px 16px; border: 1px solid #ced4da; border-radius: 4px; background-color: #d4edda; color: #155724; cursor: pointer;">
                                        <a style="text-decoration: none; color: black;" href="orders.php?done=<?php echo $data[$i]['order_id'] ?>">&nbsp;Done&nbsp;</a>
                                    </button>
                                </td>
                            <?php
                            }
                            ?>
                            <td style="padding: 8px;">
                                <button style="padding: 8px 16px; border: 1px solid #ced4da; border-radius: 4px; background-color: #d1ecf1; color: #0c5460; cursor: pointer;">
                                    <a style="text-decoration: none; color: black;" href="customers.php?id=<?php echo $data[$i]['user_id'] ?>"> &nbsp;User details&nbsp; </a>
                                </button>
                            </td>
                            <td style="padding: 8px;">
                                <button style="padding: 8px 16px; border: 1px solid #ced4da; border-radius: 4px; background-color: #d1ecf1; color: #0c5460; cursor: pointer;">
                                    <a style="text-decoration: none; color: black;" href="products.php?id=<?php echo $data[$i]['item_id'] ?>">Product details</a>
                                </button>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <br><br>
        <?php
        edit_admin($_SESSION['admin_id']);
        if (isset($_GET['edit'])) {
            $_SESSION['admin_id'] = $_GET['edit'];
            $data = get_admin($_SESSION['admin_id']);

        ?>
            <br>
            <h2>Edit Admin Details</h2>
            <form action="admin.php" method="POST">
                <div style="margin-bottom: 16px;">
                    <label>First name</label>
                    <input pattern="[A-Za-z_]{1,15}" type="text" style="width: 100%; padding: 8px; border: 1px solid #ced4da; border-radius: 4px;" placeholder="<?php echo $data[0]['admin_fname'] ?>" name="admin_fname">
                    <div style="color: #6c757d;">please enter the first name in range (1-30) characters, special characters & numbers not allowed!</div>
                </div>
                <br>
                <div style="margin-bottom: 16px;">
                    <label>Last name</label>
                    <input pattern="[A-Za-z_]{1,15}" type="text" style="width: 100%; padding: 8px; border: 1px solid #ced4da; border-radius: 4px;" placeholder="<?php echo $data[0]['admin_lname'] ?>" name="admin_lname">
                    <div style="color: #6c757d;">please enter the last name in range (1-30) characters, special characters & numbers not allowed!</div>
                </div>
                <br>
                <div style="margin-bottom: 16px;">
                    <label>Email address</label>
                    <input type="email" style="width: 100%; padding: 8px; border: 1px solid #ced4da; border-radius: 4px;" placeholder="<?php echo $data[0]['admin_email'] ?>" name="admin_email">
                    <div style="color: #6c757d;">please enter the email in format: example@gmail.com.</div>
                </div>
                <button type="submit" style="padding: 8px 16px; border: 1px solid #ced4da; border-radius: 4px; background-color: #007bff; color: white; cursor: pointer;" value="update" name="update_admin">Update</button>
                <button type="submit" style="padding: 8px 16px; border: 1px solid #ced4da; border-radius: 4px; background-color: #dc3545; color: white; cursor: pointer;" value="cancel" name="admin_cancel">Cancel</button>
                <br> <br>
            </form>

        <?php
        }
        add_admin();
        if (isset($_GET['add'])) {

        ?>
            <h2>Add new Pharmacist</h2>
            <form action="admin.php" method="POST">
                <div style="margin-bottom: 16px;">
                    <label>First name</label>
                    <input pattern="[A-Za-z_]{1,15}" type="text" style="width: 100%; padding: 8px; border: 1px solid #ced4da; border-radius: 4px;" placeholder="First name" name="admin_fname">
                    <div style="color: #6c757d;">please enter the first name in range (1-30) characters, special characters & numbers not allowed!</div>
                </div>
                <br>
                <div style="margin-bottom: 16px;">
                    <label>Last name</label>
                    <input pattern="[A-Za-z_]{1,15}" type="text" style="width: 100%; padding: 8px; border: 1px solid #ced4da; border-radius: 4px;" placeholder="Last name" name="admin_lname">
                    <div style="color: #6c757d;">please enter the last name in range (1-30) characters, special characters & numbers not allowed!</div>
                </div>
                <br>
                <div style="margin-bottom: 16px;">
                    <label>Email address</label>
                    <input type="email" style="width: 100%; padding: 8px; border: 1px solid #ced4da; border-radius: 4px;" placeholder="Email address" name="admin_email">
                    <div style="color: #6c757d;">please enter the email in format: example@gmail.com.</div>
                </div>
                <br>
                <div style="margin-bottom: 16px;">
                    <label>Password</label>
                    <input type="password" pattern="^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$" style="width: 100%; padding: 8px; border: 1px solid #ced4da; border-radius: 4px;" placeholder="Password" name="admin_password">
                    <div style="color: #6c757d;">
                        <ul>
                            <li>Must be a minimum of 8 characters</li>
                            <li>Must contain at least 1 number</li>
                            <li>Must contain at least one uppercase character</li>
                            <li>Must contain at least one lowercase character</li>
                        </ul>
                    </div>
                </div>
                <br>
                <button type="submit" style="padding: 8px 16px; border: 1px solid #ced4da; border-radius: 4px; background-color: #007bff; color: white; cursor: pointer;" value="update" name="add_admin">Submit</button>
                <button type="submit" style="padding: 8px 16px; border: 1px solid #ced4da; border-radius: 4px; background-color: #dc3545; color: white; cursor: pointer;" value="cancel" name="admin_cancel">Cancel</button>
                <br> <br>
            </form>

        <?php
        }

        ?>
    </main>
    </div>
    </div>
    <?php
    include "includes/footer.php";
    ?>
</body>