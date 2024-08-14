<?php
session_start();
include "includes/functions.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PharmAid</title>
    <link rel="icon" href="images/logo.png" type="image/icon type">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            position: static;
        }
        .navbar {
            background-color: #198754;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
        }
        .logo {
            color: white;
            font-size: 24px;
            font-weight: bold;
        }
        .nav-links {
            display: flex;
            list-style-type: none;
            flex-wrap: wrap;
        }
        .nav-links li {
            margin-right: 20px;
        }
        .nav-links a {
            color: white;
            text-decoration: none;
        }
        .dropdown {
            position: relative;
            display: inline-block;
        }
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }
        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }
        .dropdown-content a:hover {
            background-color: #f1f1f1;
        }
        .show {
            display: block;
        }
        .search-container {
            display: flex;
            align-items: center;
        }
        .search-container input[type="text"] {
            padding: 6px;
            margin-right: 6px;
            border: none;
            flex: 1;
        }
        .search-container button {
            padding: 6px 10px;
            background: #ddd;
            border: none;
            cursor: pointer;
        }
        .search-container button:hover {
            background: #ccc;
        }
        
        @media screen and (max-width: 768px) {
            .navbar {
                flex-direction: column;
                align-items: flex-start;
            }
            .nav-links {
                flex-direction: column;
                width: 100%;
            }
            .nav-links li {
                margin-right: 0;
                margin-bottom: 10px;
            }
            .search-container {
                width: 100%;
                margin-top: 10px;
            }
            .search-container input[type="text"] {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="logo">PharmAid</div>
        <ul class="nav-links">
            <li><a href="index.php">Home</a></li>
            <li><a href="cart.php">Cart</a></li>
            <li class="dropdown">
                <a href="#" class="dropbtn">Categories ▼</a>
                <div class="dropdown-content" id="myDropdown">
                    <a href="search.php?cat=medicine">HealthCare</a>
                    <a href="search.php?cat=self-care">Vitamin & Supplements</a>
                    <a href="search.php?cat=machine">Equipment & Diagnostics</a>
                    <a href="search.php?cat=medicine">Family Planning</a>
                </div>
            </li>
            <li><a href="admin/index.php">Account</a></li>
            <li>
                <?php
                if (!isset($_SESSION['user_id'])) {
                    echo "<a class='nav-link' href='login.php' style='color: white; font-weight: bold;'>Log in</a>";
                } else {
                    $check_user_id = check_user($_SESSION['user_id']);
                    if ($check_user_id == 1) {
                        echo "<a class='nav-link' href='logout.php' style='color: white; font-weight: bold;'>Log out</a>";
                    } else {
                        post_redirect("logout.php");
                    }
                }
                ?>
            </li>
        </ul>
        <form class="search-container" action="search.php" method="GET">
            <input type="text" name="search_text" placeholder="Search">
            <button type="submit" name="search" value="go">🔍</button>
        </form>
    </nav>

    <script>
        var dropdownBtn = document.querySelector('.dropbtn');
        var dropdownContent = document.getElementById('myDropdown');

        dropdownBtn.addEventListener('click', function(e) {
            e.preventDefault();
            dropdownContent.classList.toggle('show');
        });

        window.addEventListener('click', function(e) {
            if (!e.target.matches('.dropbtn')) {
                if (dropdownContent.classList.contains('show')) {
                    dropdownContent.classList.remove('show');
                }
            }
        });
    </script>
</body>
</html>