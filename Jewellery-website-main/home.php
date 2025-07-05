<?php
$pageTitle = "Jewelry Categories";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?></title>
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
            margin: 20px 0;
            font-size: 2em;
            color: #333;
        }

        .category-list {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 20px;
            padding: 20px;
        }

        .category-item {
            background: white;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 20px;
            text-align: center;
            width: 200px;
            transition: transform 0.3s;
        }

        .category-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
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

            .category-list {
                flex-direction: column;
                align-items: center;
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
                    <a href="home.php" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Category <i class="fas fa-chevron-down"></i></a>
                    <ul class="mega_menu">
                        <li>
                            <a href="#">Women</a>
                            <ul>
                                <li><a href="earrings.php">Earrings</a></li>
                                <li><a href="pendants.php">Pendants</a></li>
                                <li><a href="rings.php">Rings</a></li>
                                <li><a href="chains.php">Chains</a></li>
                                <li><a href="bangles.php">Bangles</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">Men</a>
                            <ul>
                                <li><a href="mens-rings.php">Rings</a></li>
                                <li><a href="mens-pendants.php">Pendants</a></li>
                                <li><a href="bracelets.php">Bracelets</a></li>
                                <li><a href="mens-chains.php">Chains</a></li>
                                <li><a href="gemstones.php">Gemstones</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">Other</a>
                            <ul>
                                <li><a href="platinum.php">Platinum</a></li>
                                <li><a href="silver.php">Silver</a></li>
                                <li><a href="coins.php">Coins</a></li>
                                <li><a href="gift-cards.php">Gift Cards</a></li>
                            </ul>
                        </li>
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
        <h1 class="category-title">Jewelry Categories</h1>
        <?php
        // Define categories data
        $categories = [
            'Women' => [
                'Earring' => 'earrings.php',
                'Pendant' => 'pendants.php',
                'Rings' => 'rings.php',
                'Chain' => 'chains.php',
                'Bangles' => 'bangles.php'
            ],
            'Men' => [
                'Ring' => 'mens-rings.php',
                'Pendant' => 'mens-pendants.php',
                'Bracelet' => 'bracelets.php',
                'Chain' => 'mens-chains.php',
                'Gemstone' => 'gemstones.php'
            ],
            'Other' => [
                'Platinum' => 'platinum.php',
                'Silver' => 'silver.php',
                'Coins' => 'coins.php',
                'Gift Card' => 'gift-cards.php'
            ]
        ];
        ?>

        <div class="category-list">
            <?php foreach($categories as $category => $items): ?>
            <div class="category-item">
                <h2><?php echo $category; ?></h2>
                <ul>
                    <?php foreach($items as $item_name => $item_link): ?>
                    <li><a href="<?php echo $item_link; ?>"><?php echo $item_name; ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <?php endforeach; ?>
        </div>
    </main>

    <!-- Footer -->
    <footer>
        <p>&copy; <?php echo date("Y"); ?> Jewelry Store. All rights reserved.</p>
    </footer>

</body>
</html>