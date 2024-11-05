
<body>
<?php include "includes/head.php" ?>

    <style>
          body {
            overflow-x: hidden;
            margin: 0;
            padding: 0; /* Prevent horizontal scroll */
        }
      
      .product-container {
        width: 90%;
        max-width: 1200px;
        margin: 20px auto;
        padding: 20px;
    }
    .product-grid {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        justify-content: flex-start; /* Ensures minimum width for 4 columns */
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
    .btn-details {
        display: inline-block;
        padding: 8px 15px;
        background-color: transparent;
        color: #28a745;
        text-decoration: none;
        border: 1px solid #28a745;
        border-radius: 5px;
        transition: all 0.3s ease;
    }
        .carousel {
            width: 100%;
            height: 350px;
            position: relative;
            overflow: hidden;
        }
        .carousel-item {
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
            opacity: 0;
            transition: opacity 0.5s ease-in-out;
        }
        .carousel-item.active {
            opacity: 1;
        }
        .carousel-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .carousel-control {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: rgba(0, 0, 0, 0.3);
            color: white;
            padding: 10px;
            width: 36px;
            height: 36px;
            text-decoration: none;
            font-size: 18px;
            line-height: 1;
            border-radius: 50%;
            transition: background 0.3s ease;
        }
        .carousel-control:hover {
            background: rgba(0, 0, 0, 0.6);
        }
        .carousel-control-prev { left: 10px; }
        .carousel-control-next { right: 10px; }
    </style>

    <div class="carousel">
        <div class="carousel-item active">
            <img src="images/trans1.png" alt="Image 1">
        </div>
        <div class="carousel-item">
            <img src="images/trans2.png" alt="Image 2">
        </div>
        <div class="carousel-item">
            <img src="images/trans3.jpg" alt="Image 3">
        </div>
        <div class="carousel-item">
            <img src="images/trans4.gif" alt="Image 4">
        </div>
        <div class="carousel-item">
            <img src="images/trans5.png" alt="Image 5">
        </div>
        <a href="#" class="carousel-control carousel-control-prev" id="prevBtn">&lt;</a>
        <a href="#" class="carousel-control carousel-control-next" id="nextBtn">&gt;</a>
    </div>

    <script>
        const items = document.querySelectorAll('.carousel-item');
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');
        let currentIndex = 0;

        function showSlide(index) {
            items[currentIndex].classList.remove('active');
            currentIndex = (index + items.length) % items.length;
            items[currentIndex].classList.add('active');
        }

        prevBtn.addEventListener('click', (e) => {
            e.preventDefault();
            showSlide(currentIndex - 1);
        });

        nextBtn.addEventListener('click', (e) => {
            e.preventDefault();
            showSlide(currentIndex + 1);
        });

        // Auto-play
        setInterval(() => showSlide(currentIndex + 1), 5000);
    </script>

    <br>
    <br>

   
        <style>
           .container {
  display: grid;
  grid-template-columns: repeat(5, 1fr);
  gap: 20px;
  padding: 80px;
  font-family: Noto Sans, sans-serif;
  font-weight: lighter;
}

.item {
  display: flex;
  align-items: flex-start;
}

.item svg {
  margin-right: 20px;
  height: 44px;
  width: 44px;
  flex-shrink: 0;
}

.title {
  font-weight: bold;
  color: #198754;
}

.text {
  color: #000000;
}

/* Media queries */


@media (max-width: 768px) {
 .container {
    grid-template-columns: repeat(3, 1fr);
  }
}


@media (max-width: 480px) {
 .container {
    grid-template-columns: repeat(2, 1fr);
  }
 .item svg {
    height: 30px;
    width: 30px;
  }
 .title {
    font-size: 18px;
  }
 .text {
    font-size: 14px;
  }
}
            
        </style>

        <div class="container">
            <div class="item">
                <img src="images/genuine pro.svg" alt="Genuine Products Icon">
                <div>
                    <div class="title">Genuine Products</div>
                    <div class="text">All our products are 100% genuine.</div>
                </div>
            </div>
            <div class="item">
                <img src="images/easy pay.svg" alt="Easy Payments Icon">
                <div>
                    <div class="title">Easy Payments</div>
                    <div class="text">Pay by Mpesa, Visa or MasterCard.</div>
                </div>
            </div>
            <div class="item">
                <img src="images/customer su.svg" alt="Customer Support Icon">
                <div>
                    <div class="title">Customer Support</div>
                    <div class="text">Available 7 days a week.</div>
                </div>
            </div>
            <div class="item">
                <img src="images/country.svg" alt="Nationwide Delivery Icon">
                <div>
                    <div class="title">Countrywide Delivery</div>
                    <div class="text">From a network of over 100+ stores.</div>
                </div>
            </div>
            <div class="item">
                <img src="images/express.svg" alt="Express Delivery Icon">
                <div>
                    <div class="title">Express Delivery</div>
                    <div class="text">2-hour delivery if ordered by 4pm</div>
                </div>
            </div>
        </div>

        <br>
       
        <hr>
        <br>
       

        <style>
    /* Custom CSS */
  #cards-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
  }
 .card {
    flex: 0 0 23%;
    margin: 10px;
    background-color: AntiqueWhite;
    padding: 10px;
    border-radius: 5px;
  }
 .card-body {
    text-align: center;
  }
 .card strong {
    display: inline-block;
    padding: 5px;
    background-color: LightSteelBlue;
    color: white;
    font-weight: bold;
  }
 .card h5 {
    font-weight: bold;
    color: rgb(104, 97, 97);
  }
 .card img {
    width: 125.4px;
    height: 125px;
    display: block;
    margin: 0 auto;
    object-fit: cover;
    margin-bottom: 10px;
  }
 .card button {
    width: 100%;
    padding: 10px 20px;
    background-color: LightSalmon;
    color: white;
    font-weight: bold;
    border: none;
    border-radius: 5px;
    cursor: pointer;
  }
 .card button:hover {
    background-color:#28a745;
    cursor: pointer;
  }
 .card:nth-child(2) {
    background-color: LightSlateGrey;
  }
 .card:nth-child(2) strong {
    background-color: SlateGray;
  }
 .card:nth-child(2) button {
    background-color: SteelBlue;
    border-color: PowderBlue;
  }
 .card:nth-child(3) {
    background-color: rgb(81, 211, 216);
  }
 .card:nth-child(3) button {
    background-color: LightSlateGrey;
    border-color: LightSlateGrey;
  }
  @media (max-width: 768px) {
   .card {
      flex: 0 0 40%;
    }
  }
  @media (max-width: 480px) {
   .card {
      flex: 0 0 60%;
    }
  }
</style>

<h2 style="margin-top: 10px; text-align: center;">Shop By Category</h2>
<br>
        <br>
        
        <br>
<body>
    <div id="cards-container">
        <div class="card">
            <div class="card-body">
                <strong>&nbsp;UPTO 30% OFF&nbsp;</strong>
                <h5>HealthCare</h5>
                <a href="search.php?cat=medicine">
                    <img src="images/SENSODYNE-REPAIR-_-PROTECT-WHITENING-TPASTE-75ML.jpg.webp" alt="HealthCare">
                </a>
                <br>
                <a href="search.php?cat=medicine">
                    <button>HealthCare Products</button>
                </a>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <strong>&nbsp;UPTO 30% OFF&nbsp;</strong>
                <h5>Vitamin & Supplements</h5>
                <a href="search.php?cat=medicine">
                    <img src="images/self-care.jpg" alt="Vitamin & Supplements">
                </a>
                <br>
                <a href="search.php?cat=Vitamin & Supplements">
                    <button>Vitamin & Supplements</button>
                </a>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <strong>&nbsp;UPTO 40% OFF&nbsp;</strong>
                <h5>Equipment & Diagnostics</h5>
                <a href="search.php?cat=Equipment & Diagnostics">
                    <img src="images/Romsons Respirometer SH-6082.jpeg" alt="Equipment & Diagnostics">
                </a>
                <br>
                <a href="search.php?cat=Equipment & Diagnostics">
                    <button>Equipment & Diagnostics</button>
                </a>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <strong>&nbsp;UPTO 20% OFF&nbsp;</strong>
                <h5>Family Planning</h5>
                <a href="search.php?cat=Family Planning">
                    <img src="images/midicin.jpg" alt="Family Planning">
                </a>
                <br>
                <a href="search.php?cat=Familly Planning">
                    <button>Family Planning</button>
                </a>
            </div>
        </div>
        <!-- Add other category cards similarly -->
    </div>
</body>

        <br>
        <br>
        <hr>
        <br>
        <br>
      

        <h2 style="margin-top: 10px; text-align: center; height: 10%">Products</h2>
        <div class="product-grid">
    <?php
    $data = all_products();
    $num = sizeof($data);
    for ($i = 0; $i < min($num, 8); $i++) {
    ?>
        <div class="product-card">
            <img src="images/<?php echo $data[$i]['item_image'] ?>" alt="<?php echo $data[$i]['item_title'] ?>" class="product-image">
            <h3 class="product-title"><?php echo strlen($data[$i]['item_title']) > 20 ? substr($data[$i]['item_title'], 0, 20) . "..." : $data[$i]['item_title'] ?></h3>
            <p class="product-price">Ksh<?php echo $data[$i]['item_price'] ?></p>
            <p class="product-brand">Brand: <?php echo $data[$i]['item_brand'] ?></p>
            <a href="product.php?product_id=<?php echo $data[$i]['item_id'] ?>" class="btn-details">More details</a>
        </div>
    <?php
    }
    ?>
</div>
        <br>
        <br>
        <div class="container-fluid">
            <style>
                .image-container {
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    height: 100vh;
                    overflow: hidden;
                    margin-top: 20px;
                }
                .image-container img {
                    width: 100%;
                    height: auto;
                    max-width: 100%;
                    object-fit: contain;
                    overflow: hidden;
                    margin-top: 20px;
                }
                .image-container::-webkit-scrollbar {
                    display: none;
                }
                .image-container {
                    -ms-overflow-style: none;
                    scrollbar-width: none;
                }
            </style>
        </div>
    </div>
    
    <br>

    <?php include "includes/footer.php"; ?>
</body>

