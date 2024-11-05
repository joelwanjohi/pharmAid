<?php
session_start();
include "includes/functions.php";
login();
?>
<head>
    <meta charset="UTF-8">
    <title>PharmAid</title>
    <link rel="icon" href="images/logo.png" type="image/icon type">
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            width: 100%;
            max-width: 500px;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .panel {
            background-color: #fff;
            border-radius: 10px;
        }

        .panel-heading {
            background-color: #d9edf7;
            padding: 10px;
            border-radius: 10px 10px 0 0;
            color: #31708f;
            text-align: center;
            position: relative;
        }

        .panel-title {
            font-weight: bold;
            font-size: 18px;
        }

        .panel-heading a {
            color: #31708f;
            text-decoration: none;
            font-size: 80%;
            position: absolute;
            top: 10px;
            right: 10px;
        }

        .panel-body {
            padding: 30px;
        }

        .input-group {
            margin-bottom: 25px;
            display: flex;
            align-items: center;
        }

        .input-group-addon {
            padding: 10px;
            background-color: #eee;
            border: 1px solid #ccc;
            border-right: 0;
            border-radius: 5px 0 0 5px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 0 5px 5px 0;
        }

        .btn-success {
            background-color: #5cb85c;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
        }

        .btn-success:hover {
            background-color: #4cae4c;
        }

        .form-group {
            margin-top: 10px;
        }

        .control {
            text-align: center;
            padding-top: 15px;
            border-top: 1px solid #888;
        }

        .control a {
            color: #5bc0de;
            text-decoration: none;
        }

        .control a:hover {
            text-decoration: underline;
        }

    </style>
</head>
<body>
    <div class="container">
        <div id="loginbox">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="panel-title">Sign In</div>
                    <a href="#">Forgot password?</a>
                </div>

                <div class="panel-body">
                    <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                    <?php message(); ?>
                    <form id="loginform" class="form-horizontal" role="form" method="post" action="login.php">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <img src="images/user-icon.png" alt="User Icon" width="16" height="16">
                            </span>
                            <input id="login-username" type="text" class="form-control" name="userEmail" placeholder="email">
                        </div>

                        <div class="input-group">
                            <span class="input-group-addon">
                                <img src="images/lock-icon.png" alt="Lock Icon" width="16" height="16">
                            </span>
                            <input id="login-password" type="password" class="form-control" name="password" placeholder="password">
                        </div>

                        <div class="form-group">
                            <div class="col-sm-12 controls">
                                <input id="btn-login" class="btn btn-success" type="submit" value="login" name="login" />
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12 control">
                                <div>
                                    Don't have an account!
                                    <a href="signUp.php">Sign Up Here</a>
                                    <br><br>
                                    <a href="admin/login.php">Sign In For Admin</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>