<?php
$pageTitle = "About Our Jewelry Store";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?></title>
    <meta name="description" content="Learn about our jewelry store's history, craftsmanship, and commitment to quality. Discover what makes our jewelry unique.">
    <meta name="keywords" content="about us, jewelry history, craftsmanship, quality jewelry, jewelry artisans">
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
        
        .nav-item.active .nav-link {
            color: #d4af37;
            font-weight: bold;
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
                    <a href="index.php" class="nav-link">Home</a>
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
                <li class="nav-item active">
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
        <h1 class="category-title">Our Story</h1>
        
        <div class="about-content" style="max-width: 1200px; margin: 0 auto; padding: 20px;">
            <div class="about-section" style="display: flex; flex-wrap: wrap; gap: 40px; margin-bottom: 50px; align-items: center;">
                <div style="flex: 1; min-width: 300px;">
                    <h2 style="color: #d4af37; margin-bottom: 20px;">Craftsmanship Since 1985</h2>
                    <p style="line-height: 1.6; margin-bottom: 15px;">Founded in 1985, our jewelry store has been dedicated to creating exquisite pieces that combine traditional craftsmanship with contemporary design. Each piece is meticulously handcrafted by our skilled artisans.</p>
                    <p style="line-height: 1.6;">We source only the finest materials, including ethically-sourced diamonds and precious metals, ensuring that our jewelry not only looks beautiful but is made with integrity.</p>
                </div>
                <div style="flex: 1; min-width: 300px;">
                    <img src="images/jewelry-workshop.jpg" alt="Jewelry artisans at work" style="width: 100%; border-radius: 8px; box-shadow: 0 4px 12px rgba(0,0,0,0.1);">
                </div>
            </div>

            <div class="about-section" style="display: flex; flex-wrap: wrap-reverse; gap: 40px; margin-bottom: 50px; align-items: center;">
                <div style="flex: 1; min-width: 300px;">
                    <img src="images/jewelry-showcase.jpg" alt="Jewelry showcase" style="width: 100%; border-radius: 8px; box-shadow: 0 4px 12px rgba(0,0,0,0.1);">
                </div>
                <div style="flex: 1; min-width: 300px;">
                    <h2 style="color: #d4af37; margin-bottom: 20px;">Our Philosophy</h2>
                    <p style="line-height: 1.6; margin-bottom: 15px;">We believe jewelry should tell a story - your story. That's why we offer both timeless classics and custom designs to perfectly capture your personal style and special moments.</p>
                    <p style="line-height: 1.6;">Our team of designers works closely with clients to create one-of-a-kind pieces that will be treasured for generations.</p>
                </div>
            </div>

            <div class="team-section" style="text-align: center; margin-top: 50px;">
                <h2 style="color: #d4af37; margin-bottom: 30px;">Meet Our Master Jewelers</h2>
                <div style="display: flex; flex-wrap: wrap; justify-content: center; gap: 30px;">
                    <div style="max-width: 250px;">
                        <img src="images/jeweler-1.jpg" alt="Master Jeweler" style="width: 100%; border-radius: 50%; margin-bottom: 15px;">
                        <h3>Sarah Johnson</h3>
                        <p>Head Designer<br>25 years experience</p>
                    </div>
                    <div style="max-width: 250px;">
                        <img src="images/jeweler-2.jpg" alt="Master Jeweler" style="width: 100%; border-radius: 50%; margin-bottom: 15px;">
                        <h3>Michael Chen</h3>
                        <p>Goldsmith<br>30 years experience</p>
                    </div>
                    <div style="max-width: 250px;">
                        <img src="images/jeweler-3.jpg" alt="Master Jeweler" style="width: 100%; border-radius: 50%; margin-bottom: 15px;">
                        <h3>Emma Rodriguez</h3>
                        <p>Gemologist<br>15 years experience</p>
                    </div>
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