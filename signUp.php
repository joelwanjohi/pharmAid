<?php
session_start();
include "includes/functions.php";
singUp();
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
            width: 360px;
            background-color: #ffffff;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        
        .panel {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
        }
        
        .panel-heading {
            background-color: #5bc0de;
            padding: 10px;
            border-bottom: 1px solid #ccc;
            border-radius: 10px 10px 0 0;
            text-align: center;
        }
        
        .panel-title {
            font-weight: bold;
            font-size: 18px;
        }
        
        .form-group {
            margin-bottom: 15px;
        }
        
        .control-label {
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
        }
        
        .form-control {
            width: 100%;
            height: 40px;
            padding: 10px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        
        .btn {
            background-color: #4CAF50;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
            margin-top: 20px;
        }
        
        .btn:hover {
            background-color: #45a049;
        }
        
        .password-info {
            margin: 10px 0;
            font-size: 12px;
            color: #555;
        }
        
        .controls {
            text-align: center;
        }
        
        .signin-link {
            border-top: 1px solid #888;
            padding-top: 15px;
            font-size: 14px;
            text-align: center;
            margin-top: 20px;
        }
        
        .signin-link a {
            text-decoration: none;
            color:#5bc0de;
        }
        
        .signin-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<div class="container">
    <div id="signupbox">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">Sign Up</div>
            </div>
            <?php message(); ?>
            <div class="panel-body">
                <form id="signupform" method="post" action="signUp.php">
                    <div class="form-group">
                        <label for="email" class="control-label">Email</label>
                        <div>
                            <input type="email" class="form-control" name="email" placeholder="Email Address" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="firstname" class="control-label">First Name</label>
                        <div>
                            <input type="text" class="form-control" name="Fname" placeholder="First Name" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="lastname" class="control-label">Last Name</label>
                        <div>
                            <input type="text" class="form-control" name="Lname" placeholder="Last Name" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="address" class="control-label">Address</label>
                        <div>
                            <input type="text" class="form-control" name="address" placeholder="Address" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="control-label">Password</label>
                        <div>
                            <input type="password" class="form-control" name="passwd" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="password-info">
                        <b>Password must contain the following:</b>
                        <ul style="padding-left: 20px; margin-top: 5px;">
                            <li>at least 1 number and 1 letter</li>
                            <li>Must be 8-30 characters</li>
                        </ul>
                    </div>

                    <div class="form-group">
                        <div class="controls">
                            <input id="btn-login" class="btn btn-success" type="submit" value="Sign Up" name="singUp" />
                        </div>
                    </div>
                    <div class="signin-link">
                        You already have an account?
                        <a href="login.php">Sign In Here</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>