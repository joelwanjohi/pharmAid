<?php
include "includes/head.php";
?>
<style>
    body {
        font-family: Arial, sans-serif;
        line-height: 1.6;
        margin: 0;
        padding: 0;
        background-color: #f8f9fa;
    }
    .container {
        width: 90%;
        max-width: 1200px;
        margin: 20px auto;
        padding: 20px;
    }
    .product-grid {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        justify-content: flex-start;
    }
    .product-card {
        width: calc(25% - 20px);
        min-width: 200px;
        background-color: transparent;
        border: 1px solid #ffc107;
        border-radius: 5px;
        padding: 15px;
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    .product-image {
        width: 125px;
        height: 125px;
        object-fit: cover;
        margin-bottom: 10px;
    }
    .product-title {
        font-size: 1em;
        margin-bottom: 10px;
        text-align: center;
    }
    .product-price {
        color: #82E0AA;
        font-size: 1.2em;
        font-weight: bold;
        margin-bottom: 10px;
    }
    .product-brand {
        font-size: 0.9em;
        color: #6c757d;
        margin-bottom: 10px;
    }
    .btn {
        display: inline-block;
        padding: 8px 15px;
        background-color: transparent;
        color: #28a745;
        text-decoration: none;
        border: 1px solid #28a745;
        border-radius: 5px;
        transition: all 0.3s ease;
    }
    .btn:hover {
        background-color: #28a745;
        color: white;
    }
    h2 {
        text-align: start;
        margin: 20px 0;
    }
    .no-results {
        text-align: center;
    }
    .no-results img {
        max-width: 100%;
        height: auto;
    }
    .search-results, .recommended-products {
        margin-bottom: 30px;
    }
</style>
</head>
<body>

    <div class="container">
        <?php
        $data = search();
        if (!empty($data)) {
            $num = sizeof($data);
        ?>
            <div class="search-results">
               
                <div class="product-grid">
                    <?php
                    for ($i = 0; $i < $num; $i++) {
                        outputProductCard($data[$i]);
                    }
                    ?>
                </div>
            </div>
        <?php
        } else {
        ?>
            <div class="no-results">
                <img src="images/1.gif" alt="No results found">
            </div>
        <?php
        }
        ?>

        <div class="recommended-products">
            <h2>You might also like:</h2>
            <div class="product-grid">
                <?php
                $recommended = empty($data) ? all_products() : all_products();
                $num = sizeof($recommended);
                for ($i = 0; $i < min(4, $num); $i++) {
                    outputProductCard($recommended[$i]);
                }
                ?>
            </div>
        </div>
    </div>

    <?php include "includes/footer.php"; ?>

</body>
</html>

<?php
function outputProductCard($item) {
?>
    <div class="product-card">
        <img src="images/<?php echo $item['item_image'] ?>" class="product-image" alt="<?php echo $item['item_title'] ?>">
        <h5 class="product-title"><?php echo strlen($item['item_title']) <= 20 ? $item['item_title'] : substr($item['item_title'], 0, 20) . "..." ?></h5>
        <strong class="product-price">Ksh<?php echo $item['item_price'] ?></strong>
        <small class="product-brand">Brand Name: <?php echo $item['item_brand'] ?></small>
        <a href="product.php?product_id=<?php echo $item['item_id'] ?>" class="btn">More details</a>
    </div>
<?php
}
?>