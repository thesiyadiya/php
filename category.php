<?php
$pageTitle = "Jewelry Categories";
?>
<!DOCTYPE html>
<html lang="en">
<head>
   
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?></title>
    <meta name="description" content="Browse our exquisite jewelry categories including rings, necklaces, earrings and more. Find the perfect piece for any occasion.">
    <meta name="keywords" content="jewelry, rings, necklaces, earrings, pendants, bracelets, gold, silver, diamond">
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

        .category-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 30px;
            padding: 20px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .category-card {
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
        }

        .category-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
        }

        .category-header {
            background: #d4af37;
            color: white;
            padding: 15px;
        }

        .category-header h2 {
            margin: 0;
            font-size: 1.3rem;
        }

        .category-content {
            padding: 15px;
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 10px;
        }

        .category-link {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-decoration: none;
            color: #333;
            transition: all 0.2s;
        }

        .category-link:hover {
            color: #d4af37;
            transform: scale(1.05);
        }

        .category-link img {
            width: 100%;
            height: 120px;
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
<a href="index.php">Home <i class="ion-chevron-down"></i></a>
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

        <div class="category-grid">
            <?php foreach($categories as $category => $items): ?>
            <div class="category-card">
                <div class="category-header">
                    <h2><?php echo $category; ?></h2>
                </div>
                <div class="category-content">
                    <?php foreach($items as $item_name => $item_link): ?>
                    <a href="<?php echo $item_link; ?>" class="category-link">
                        <img src="images/<?php echo strtolower(str_replace(' ', '-', $item_name)); ?>.jpg" alt="<?php echo $item_name; ?>">
                        <span><?php echo $item_name; ?></span>
                    </a>
                    <?php endforeach; ?>
                </div>
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