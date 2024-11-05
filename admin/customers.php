<?php
include "includes/head.php";
?>

<style>
    /* General Styles */
body {
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
}

/* Header and Footer */
header, footer {
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

/* Sidebar */
.sidebar {
    position: fixed;
    top: 0;
    left: 0;
    width: 250px;
    height: 100%;
    background-color: #f8f9fa;
    padding: 15px;
    box-shadow: 2px 0 5px rgba(0,0,0,0.1);
}

/* Main Content */
.main-content {
    margin-left: 250px; /* Width of the sidebar */
    padding: 20px;
}

/* Container */
.container {
    margin-top: 20px;
}

/* Form Styles */
form {
    margin-bottom: 20px;
}

.form-group {
    margin-bottom: 15px;
}

input[type="text"],
input[type="email"],
input[type="search"] {
    width: 40%;
    padding: 10px;
    margin-top: 5px;
    border: 1px solid #ced4da;
    border-radius: 4px;
}

input::placeholder {
    color: #6c757d;
}

/* Buttons */
.btn {
    display: inline-block;
    font-weight: 400;
    color: #fff;
    text-align: center;
    vertical-align: middle;
    cursor: pointer;
    border: 1px solid transparent;
    border-radius: 4px;
    padding: 0.5rem 1rem;
    text-decoration: none;
}

.btn-submit {
    margin-top: 5px;
    color: #fff;
    background-color: #28a745;
    border-color: #28a745;
}

.btn-submit:hover {
    background-color: #218838;
    border-color: #1e7e34;
}

.btn-cancel {
    color: #fff;
    background-color: #dc3545;
    border-color: #dc3545;
}

.btn-cancel:hover {
    background-color: #c82333;
    border-color: #bd2130;
}

.btn-edit {
    background-color: #ffc107;
    border-color: #ffc107;
    color: #212529;
}

.btn-edit:hover {
    background-color: #e0a800;
    border-color: #d39e00;
}

.btn-delete {
    background-color: #dc3545;
    border-color: #dc3545;
    color: #ffffff;
}

.btn-delete:hover {
    background-color: #c82333;
    border-color: #bd2130;
}

/* Table Styles */
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
    <?php include "includes/sidebar.php"; ?>

    <main class="main-content">
        <?php message(); ?>

        <div class="container">
            <div class="row align-items-start">
                <div class="col">
                    <br>
                    <h2>Customer Details</h2>
                    <br>
                </div>
                <div class="col"></div>
                <div class="col">
                    <br>
                    <form class="search-form" method="GET" action="customers.php">
                        <input type="search" name="search_user_email" placeholder="Search for user (email)" aria-label="Search">
                        <button type="submit" name="search_user" value="search">Search</button>
                    </form>
                    <br>
                </div>
            </div>

            <?php
            if (isset($_GET['edit'])) {
                $_SESSION['id'] = $_GET['edit'];
                $data = get_user($_SESSION['id']);
            ?>
                <br>
                <h2>Edit Customer Details</h2>
                <form action="customers.php" method="POST">
                    <div class="form-group">
                        <label>First name</label>
                        <input pattern="[A-Za-z_]{1,15}" type="text" placeholder="<?php echo htmlspecialchars($data[0]['user_fname']); ?>" name="fname">
                        <div class="form-text">Please enter the first name in range (1-15) characters; special characters & numbers are not allowed!</div>
                    </div>
                    <br>
                    <div class="form-group">
                        <label>Last name</label>
                        <input pattern="[A-Za-z_]{1,15}" type="text" placeholder="<?php echo htmlspecialchars($data[0]['user_lname']); ?>" name="lname">
                        <div class="form-text">Please enter the last name in range (1-15) characters; special characters & numbers are not allowed!</div>
                    </div>
                    <br>
                    <div class="form-group">
                        <label>Email address</label>
                        <input type="email" placeholder="<?php echo htmlspecialchars($data[0]['email']); ?>" name="email">
                        <div class="form-text">Please enter the email in format: example@gmail.com.</div>
                    </div>
                    <br>
                    <div class="form-group">
                        <label>Address</label>
                        <input pattern="^[#.0-9a-zA-Z\s,-]+$" type="text" placeholder="<?php echo htmlspecialchars($data[0]['user_address']); ?>" name="address">
                        <div class="form-text">Please enter the address in format: #1, Tom Mboya Street, Nairobi - 11.</div>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-submit" value="update" name="update">Submit</button>
                    <button type="submit" class="btn btn-cancel" value="cancel" name="cancel">Cancel</button>
                    <br><br>
                </form>
            <?php
            }
            if (isset($_SESSION['id'])) {
                edit_user($_SESSION['id']);
            }
            ?>

            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $data = all_users();
                        delete_user();
                        if (isset($_GET['search_user'])) {
                            $query = search_user();
                            if (isset($query)) {
                                $data = $query;
                            } else {
                                get_redirect("customers.php");
                            }
                        } elseif (isset($_GET['id'])) {
                            $data = get_user_details();
                        }
                        $num = sizeof($data);
                        for ($i = 0; $i < $num; $i++) {
                        ?>
                            <tr>
                                <td><?php echo htmlspecialchars($data[$i]['user_id']); ?></td>
                                <td><?php echo htmlspecialchars($data[$i]['user_fname']); ?></td>
                                <td><?php echo isset($data[$i]['user_lname']) ? htmlspecialchars($data[$i]['user_lname']) : 'N/A'; ?></td>
                                <td><?php echo htmlspecialchars($data[$i]['email']); ?></td>
                                <td><?php echo htmlspecialchars($data[$i]['user_address']); ?></td>
                                <td>
                                    <button type="button" class="btn btn-edit"><a href="customers.php?edit=<?php echo $data[$i]['user_id']; ?>">Edit</a></button>
                                    <button type="button" class="btn btn-delete"><a href="customers.php?delete=<?php echo $data[$i]['user_id']; ?>">Delete</a></button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <?php include "includes/footer.php"; ?>
</body>
</html>