<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


<style>
        /* Sidebar container */
        #sidebarMenu {
            position: fixed;
            top: 15px; /* Adjust based on your navbar height */
            bottom: 0;
            left: 0;
            z-index: 100;
            padding: 48px 0 0;
            box-shadow: inset -1px 0 0 rgba(0, 0, 0, 0.1);
            width: 200px;
            background-color: #f8f9fa; /* Light background for the sidebar */
            transition: all 0.3s;
        }

        /* Responsive styling for smaller screens */
        @media (max-width: 767.98px) {
            #sidebarMenu {
                width: 100%;
                height: auto;
                position: relative;
                padding-top: 0;
            }
        }

        /* Sidebar sticky section */
        .sidebar-sticky {
            position: relative;
            top: 0;
            height: calc(100vh - 48px);
            padding-top: 0.5rem;
            overflow-x: hidden;
            overflow-y: auto;
        }

        /* Navigation items styling */
        .nav {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .nav-item {
            width: 100%;
        }

        .nav-link {
            font-weight: 500;
            color: #333;
            padding: 0.5rem 1rem;
            background: transparent;
            border: none;
            display: flex;
            align-items: center;
            text-decoration: none;
            transition: all 0.3s;
        }

        .nav-link:hover,
        .nav-link.active {
            color: #198754; /* Active and hover color */
            background: rgba(0, 123, 255, 0.1); /* Background color on hover/active */
        }

        .nav-link .icon {
            margin-right: 10px;
            font-size: 16px; /* Adjust based on icon size */
        }
    </style>
</head>
<body>
    <nav id="sidebarMenu">
        <div class="sidebar-sticky">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">
                        <span class="icon fas fa-home"></span>
                        Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="orders.php">
                        <span class="icon fas fa-shopping-cart"></span> 
                        Orders
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="products.php">
                        <span class="icon fas fa-box"></span> 
                        Products
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="customers.php">
                        <span class="icon fas fa-users"></span> 
                        Customers
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="admin.php">
                        <span class="icon fas fa-user"></span> 
                        Pharmacist
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="report.php">
                        <span class="icon fas fa-chart-line"></span> 
                        Daily Report
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../index.php">
                        <span class="icon fas fa-store"></span> 
                        Go to store
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</body>
</html>