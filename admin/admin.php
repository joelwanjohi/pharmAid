<?php
include "includes/head.php";
?>
<style>
/* General Layout */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}

.container {
    margin: 0 auto;
    padding: 20px;
    max-width: 1200px; /* Adjust as needed */
}

/* Flexbox Layout */
.row {
    display: flex;
    flex-wrap: wrap;
    margin: 0 -15px;
}

.col {
    flex: 1;
    padding: 0 15px;
}

/* Main content area */
.main-content {
    margin-left: 250px; /* Adjust based on sidebar width */
    padding: 20px;
}

/* Form Styles */
.form-group {
    margin-bottom: 15px;
}

.form-group label {
    display: block;
    margin-bottom: 5px;
}

.form-control {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box; /* Include padding and border in element's total width and height */
}

.form-text {
    font-size: 0.875em;
    color: #6c757d;
}

/* Button Styles */
.custom-btn {
    padding: 10px 20px;
    border: 2px solid;
    border-radius: 4px;
    text-align: center;
    cursor: pointer;
    background-color: transparent;
    color: #333;
    display: inline-block;
    text-decoration: none; /* Ensure no underline for the button itself */
    margin-right: 10px; /* Add spacing between buttons */
}

.custom-btn a {
    text-decoration: none; /* Remove underline from links inside buttons */
    color: inherit; /* Inherit button color */
}

.primary {
    border-color: #007bff;
    color: #007bff;
}

.primary:hover {
    border-color: #0056b3;
    color: #0056b3;
}

.secondary {
    border-color: #6c757d;
    color: #6c757d;
}

.secondary:hover {
    border-color: #5a6268;
    color: #5a6268;
}

.danger {
    border-color: #dc3545;
    color: #dc3545;
}

.danger:hover {
    border-color: #c82333;
    color: #c82333;
}

.warning {
    border-color: #ffc107;
    color: #ffc107;
}

.warning:hover {
    border-color: #e0a800;
    color: #e0a800;
}

/* Table Styles */
.custom-table {
    width: 100%;
    border-collapse: collapse;
}

.custom-table th,
.custom-table td {
    padding: 10px;
    border: 1px solid #dee2e6;
    text-align: left;
}

.custom-table th {
    background-color: #f8f9fa;
}

/* Responsive Styles */
@media (max-width: 1200px) {
    .container {
        padding: 15px;
    }
}

@media (max-width: 992px) {
    .main-content {
        margin-left: 0; /* Remove margin for smaller screens */
    }
    .row {
        flex-direction: column;
        margin: 0;
    }
    .col {
        padding: 0;
        margin-bottom: 15px; /* Add margin to the bottom of columns */
    }
    .col:last-child {
        margin-bottom: 0; /* Remove bottom margin from the last column */
    }
}

@media (max-width: 768px) {
    .custom-btn {
        width: 100%; /* Make buttons full-width on small screens */
        display: block;
        margin-bottom: 10px; /* Add margin between buttons */
    }
}
</style>
<body>
    <?php
    include "includes/header.php";
    include "includes/sidebar.php";
    ?>
    
    <main class="main-content">
        <?php
        message();
        ?>
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2>Pharmacist Details</h2>
                </div>
                <div class="col"></div>
                <div class="col">
                    <form class="search-form" method="GET" action="admin.php">
                        <input class="form-control search-input" type="search" name="search_admin_email" placeholder="Search for admin (email)" aria-label="Search">
                        <button class="custom-btn secondary" type="submit" name="search_admin" value="search">Search</button>
                    </form>
                </div>
            </div>
            
            <?php
            edit_admin($_SESSION['admin_id']);
            if (isset($_GET['edit'])) {
                $_SESSION['admin_id'] = $_GET['edit'];
                $data = get_admin($_SESSION['admin_id']);
            ?>
                <h2>Edit Pharmacist Details</h2>
                <form action="admin.php" method="POST">
                    <div class="form-group">
                        <label>First Name</label>
                        <input pattern="[A-Za-z_]{1,15}" type="text" class="form-control" placeholder="<?php echo $data[0]['admin_fname'] ?>" name="admin_fname">
                        <div class="form-text">Please enter the first name in range (1-30) characters, special characters & numbers not allowed!</div>
                    </div>
                    <div class="form-group">
                        <label>Last Name</label>
                        <input pattern="[A-Za-z_]{1,15}" type="text" class="form-control" placeholder="<?php echo $data[0]['admin_lname'] ?>" name="admin_lname">
                        <div class="form-text">Please enter the last name in range (1-30) characters, special characters & numbers not allowed!</div>
                    </div>
                    <div class="form-group">
                        <label>Email Address</label>
                        <input type="email" class="form-control" placeholder="<?php echo $data[0]['admin_email'] ?>" name="admin_email">
                        <div class="form-text">Please enter the email in format: example@gmail.com.</div>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" pattern="^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$" class="form-control" placeholder="Password" name="admin_password">
                        <div class="form-text">
                            <ul>
                                <li>Must be a minimum of 8 characters</li>
                                <li>Must contain at least 1 number</li>
                                <li>Must contain at least one uppercase character</li>
                                <li>Must contain at least one lowercase character</li>
                            </ul>
                        </div>
                    </div>
                    <button type="submit" class="custom-btn primary" value="update" name="admin_update">Submit</button>
                    <button type="submit" class="custom-btn danger" value="cancel" name="admin_cancel">Cancel</button>
                </form>
            <?php
            }
            add_admin();
            if (isset($_GET['add'])) {
            ?>
                <h2>Add New Admin</h2>
                <form action="admin.php" method="POST">
                    <div class="form-group">
                        <label>First Name</label>
                        <input pattern="[A-Za-z_]{1,15}" type="text" class="form-control" placeholder="First name" name="admin_fname">
                        <div class="form-text">Please enter the first name in range (1-30) characters, special characters & numbers not allowed!</div>
                    </div>
                    <div class="form-group">
                        <label>Last Name</label>
                        <input pattern="[A-Za-z_]{1,15}" type="text" class="form-control" placeholder="Last name" name="admin_lname">
                        <div class="form-text">Please enter the last name in range (1-30) characters, special characters & numbers not allowed!</div>
                    </div>
                    <div class="form-group">
                        <label>Email Address</label>
                        <input type="email" class="form-control" placeholder="Email address" name="admin_email">
                        <div class="form-text">Please enter the email in format: example@gmail.com.</div>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" pattern="^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$" class="form-control" placeholder="Password" name="admin_password">
                        <div class="form-text">
                            <ul>
                                <li>Must be a minimum of 8 characters</li>
                                <li>Must contain at least 1 number</li>
                                <li>Must contain at least one uppercase character</li>
                                <li>Must contain at least one lowercase character</li>
                            </ul>
                        </div>
                    </div>
                    <button type="submit" class="custom-btn primary" value="update" name="add_admin">Submit</button>
                    <button type="submit" class="custom-btn danger" value="cancel" name="admin_cancel">Cancel</button>
                </form>
            <?php
            }
            ?>
            
            <div class="table-responsive">
                <table class="custom-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>
                                <button type="button" class="custom-btn primary"><a href="admin.php?add=1">Add</a></button>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $data = all_admins();
                        delete_admin();
                        if (isset($_GET['search_admin'])) {
                            $query = search_admin();
                            if (!empty($query)) {
                                $data = $query;
                            } else {
                                get_redirect("admin.php");
                            }
                        }
                        $num = sizeof($data);
                        for ($i = 0; $i < $num; $i++) {
                        ?>
                            <tr>
                                <td><?php echo $i + 1 ?></td>
                                <td><?php echo $data[$i]['admin_id'] ?></td>
                                <td><?php echo $data[$i]['admin_fname'] ?></td>
                                <td><?php echo $data[$i]['admin_lname'] ?></td>
                                <td><?php echo $data[$i]['admin_email'] ?></td>
                                <td>
                                    <button type="button" class="custom-btn warning"><a href="admin.php?edit=<?php echo $data[$i]['admin_id'] ?>">Edit</a></button>
                                </td>
                                <?php
                                if ($data[$i]['admin_id'] != $_SESSION['admin_id']) {
                                ?>
                                    <td>
                                        <button type="button" class="custom-btn danger"><a href="admin.php?delete=<?php echo $data[$i]['admin_id'] ?>">Delete</a></button>
                                    </td>
                                <?php
                                } else {
                                ?>
                                    <td></td>
                                <?php
                                }
                                ?>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
    <?php
    include "includes/footer.php";
    ?>
</body>