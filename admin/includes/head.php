<?php
session_start();
include "includes/functions.php";
if (isset($_SESSION['admin_id'])) {
    $check_admin = check_admin($_SESSION['admin_id']);
    if ($check_admin == 0) {
        post_redirect("logout.php");
    }
} else {
    post_redirect("login.php");
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PharmAid</title>
    <link rel="icon" href="../images/logo.png" type="image/icon type">
    <link href="dashboard.css" rel="stylesheet">
    <style>
        /* General styles */
        body {
            overflow-x: hidden;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0; 
            position: relative;
            
            box-sizing: border-box;

        }

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
            padding: 0 25px;
        }

        header img {
            max-height: 150px;
            width: auto;
        }

        .navbar {
            display: flex;
            align-items: center;
        }

        .navbar .nav-link {
            color: #fff;
            text-decoration: none;
            padding: 0 15px;
        }

        .navbar .nav-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>