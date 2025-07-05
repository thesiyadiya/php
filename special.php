<?php
$pageTitle = "Special Collection";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?></title>
    <meta name="description" content="Explore our special collection of exquisite jewelry including gemstone, gold, rose gold, and silver pieces.">
    <meta name="keywords" content="special collection, gemstone jewelry, gold jewelry, rose gold jewelry, silver jewelry">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f8f8;
        }

        /* Navigation styles */
        .nav-container {
            background-color: #fff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            position: relative;
        }

        .nav {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 15px 20px;
        }

        .nav-item {
            position: relative;
            margin-right: 25px;
        }

        .nav-link {
            text-decoration: none;
            color: #333;
            padding: 10px 15px;
            transition: color 0.3s;
        }

        .nav-link:hover {
            color: #d4af37; /* Gold color */
        }

        .mega_menu {
            position: absolute;
            top: 100%;
            left: 0;
            width: 300px;
            background: white;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            display: none;
            z-index: 1000;
            padding: 15px;
        }

        .mega_menu li {
            margin-bottom: 10px;
        }

        .mega_menu a {
            text-decoration: none;
            color: #555;
            transition: color 0.3s;
        }

        .mega_menu a:hover {
            color: #d4af37; /* Gold color */
        }

        .nav-item:hover .mega_menu {
            display: block;
        }

        /* Main content styles */
        .category-title {
            text-align: center;
            margin: 30px 0 20px;
            font-size: 2.5em;
            color: #333;
            position: relative;
            padding-bottom: 15px;
        }

        .category-title:after {
            content: '';
            display: block;
            width: 80px;
            height: 3px;
            background: #d4af37;
            margin: 15px auto 0;
        }

        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 30px;
            padding: 20px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .product-card {
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
        }

        .product-header {
            background: #d4af37;
            color: white;
            padding: 15px;
            text-align: center;
        }

        .product-header h2 {
            margin: 0;
            font-size: 1.3rem;
        }

        .product-content {
            padding: 15px;
            text-align: center;
        }

        .product-link {
            text-decoration: none;
            color: #333;
            transition: all 0.2s;
        }

        .product-link:hover {
            color: #d4af37;
        }

        .product-link img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 4px;
            margin-bottom: 8px;
        }

        /* Responsive styles */
        @media (max-width: 768px) {
            .nav {
                flex-direction: column;
                align-items: flex-start;
            }

            .nav-item {
                margin-right: 0;
                margin-bottom: 10px;
            }
        }
    </style>
</head>
<body>

    <!-- Navigation -->
    <header class="nav-container">
        <nav>
            <ul class="nav">
                <li class="nav-item">
                    <a href="index.php" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Special Collection <i class="fas fa-chevron-down"></i></a>
                    <ul class="mega_menu">
                        <li><a href="special-collection.php">Special Collection</a></li>
                        <li><a href="#">Gemstone</a></li>
                        <li><a href="#">Gold</a></li>
                        <li><a href="#">Rose Gold</a></li>
                        <li><a href="#">Silver</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="about.php" class="nav-link">About Us</a>
                </li>
                <li class="nav-item">
                    <a href="contact.php" class="nav-link">Contact</a>
                </li>
            </ul>
        </nav>
    </header>

    <!-- Main Content -->
    <main>
        <h1 class="category-title">Special Collection</h1>
        <div class="product-grid">
            <div class="product-card">
                <div class="product-header">
                    <h2>Gemstone Jewelry</h2>
                </div>
                <div class="product-content">
                    <a href="gemstone-jewelry.php" class="product-link">
                        <img src="images/gemstone-jewelry.jpg" alt="Gemstone Jewelry">
                        <span>Exquisite gemstone pieces</span>
                    </a>
                </div>
            </div>
            <div class="product-card">
                <div class="product-header">
                    <h2>Gold Jewelry</h2>
                </div>
                <div class="product-content">
                    <a href="gold-jewelry.php" class="product-link">
                        <img src="images/gold-jewelry.jpg" alt="Gold Jewelry">
                        <span>Elegant gold designs</span>
                    </a>
                </div>
            </div>
            <div class="product-card">
                <div class="product-header">
                    <h2>Rose Gold Jewelry</h2>
                </div>
                <div class="product-content">
                    <a href="rose-gold-jewelry.php" class="product-link">
                        <img src="images/rose-gold-jewelry.jpg" alt="Rose Gold Jewelry">
                        <span>Beautiful rose gold creations</span>
                    </a>
                </div>
            </div>
            <div class="product-card">
                <div class="product-header">
                    <h2>Silver Jewelry</h2>
                </div>
                <div class="product-content">
                    <a href="silver-jewelry.php" class="product-link">
                        <img src="images/silver-jewelry.jpg" alt="Silver Jewelry">
                        <span>Stylish silver pieces</span>
                    </a>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer>
        <p>&copy; <?php echo date("Y"); ?> Jewelry Store. All rights reserved.</p>
    </footer>

</body>
</html>
