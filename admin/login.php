<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PharmAid</title>
    <link rel="icon" href="../images/logo.png" type="image/icon type">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 400px;
            margin: 50px auto;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .panel-heading {
            background-color: #5bc0de;
            color: white;
            padding: 15px;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
            position: relative;
        }
        .panel-title {
            margin: 0;
            font-size: 18px;
        }
        .forgot-password {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 12px;
            color: white;
            text-decoration: none;
        }
        .panel-body {
            padding: 30px;
        }
        .input-group {
            display: flex;
            margin-bottom: 15px;
            border: 1px solid #ced4da;
            border-radius: 3px;
        }
        .input-group-addon {
            background-color: #f8f9fa;
            padding: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            border-right: 1px solid #ced4da;
        }
        .form-control {
            flex-grow: 1;
            padding: 10px;
            border: none;
            outline: none;
        }
        .btn {
            width: 100%;
            padding: 10px;
            background-color: #5cb85c;
            color: white;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            font-size: 16px;
        }
        .btn:hover {
            background-color: #4cae4c;
        }
        .form-group {
            margin-top: 20px;
        }
        .form-footer {
            border-top: 1px solid #ddd;
            padding-top: 15px;
            font-size: 14px;
            text-align: center;
        }
        @media (max-width: 480px) {
            .container {
                margin: 20px auto;
                width: 95%;
            }
        }
    </style>
</head>
<body>
    <?php
    session_start();
    include "includes/functions.php";
    login();
    ?>
    <div class="container">
        <div id="loginbox">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Admin Sign In</h3>
                    <a href="#" class="forgot-password">Forgot password?</a>
                </div>
                <div class="panel-body">
                    <div id="login-alert"></div>
                    <?php message(); ?>
                    <form id="loginform" method="post" action="login.php">
                        <div class="input-group">
                            <span class="input-group-addon">👤</span>
                            <input id="login-username" type="text" class="form-control" name="adminEmail" placeholder="Email">
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon">🔒</span>
                            <input id="login-password" type="password" class="form-control" name="adminPassword" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <input id="btn-login" class="btn" type="submit" value="Login" name="login">
                        </div>
                        <div class="form-footer">
                            Regular user? <a href="../login.php">Sign In Here</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>