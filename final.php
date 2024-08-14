<?php
include "includes/head.php";
?>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap');

    body {
        font-family: Arial, sans-serif;
        line-height: 1.6;
        margin: 0;
        padding: 0;
        text-align: center;
        background-color: white;
    }
    .container {
        width: 90%;
        max-width: 600px;
        margin: 20px auto;
        overflow: hidden;
    }
    h1 {
        font-family: Calibri, sans-serif;
        font-size: 1.5em;
        color: #333;
        margin-top: 20px;
        margin-bottom: 10px;
        text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
    }
    h5 {
        font-size: 1.2em;
        color: #666;
        margin-top: 0;
    }
    img {
        max-width: 100%;
        height: auto;
        margin: 20px 0;
    }
    .btn {
        display: inline-block;
        padding: 10px 20px;
        color:#198754;
        background-color: white;
        text-decoration: none;
        border-radius: 25px;
        font-size: 1.2em;
        margin-top: 20px;
        border: 2px solid#198754;
        transition: all 0.3s ease;
    }
    .btn:hover {
        background-color: #198754;
        color: white;
    }
</style>
</head>
<body>
  <div class="container">
        <h1>WE'VE RECEIVED YOUR ORDER!</h1>
        <h5>Thanks for shopping with PharmAid!</h5>
        <img src="images/order con.gif" alt="Order Confirmation">
        <a href="index.php" class="btn">Go back to the store</a>
    </div>

    <?php
    add_order();
    include "includes/footer.php";
    ?>
</body>
</html>