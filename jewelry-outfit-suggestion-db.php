<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Jewelry Outfit Suggestions with Database</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter&family=Material+Icons" rel="stylesheet" />
  <style>
    /* Reset and base */
    * {
      box-sizing: border-box;
    }
    body {
      margin: 0;
      font-family: 'Inter', sans-serif;
      background: linear-gradient(135deg, #1f2937, #111827);
      color: #e0e7ff;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      align-items: center;
      padding: 24px 16px;
    }
    h1 {
      font-weight: 900;
      font-size: 2.5rem;
      margin-bottom: 24px;
      text-align: center;
      background: linear-gradient(135deg, #8b5cf6, #06b6d4);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      user-select: none;
    }
    form {
      background: rgba(31, 41, 55, 0.85);
      padding: 24px;
      border-radius: 16px;
      max-width: 720px;
      width: 100%;
      margin-bottom: 48px;
      box-shadow: 0 4px 30px rgba(14, 30, 57, 0.7);
    }
    label {
      display: block;
      color: #cbd5e1;
      font-weight: 600;
      margin-bottom: 8px;
      margin-top: 16px;
    }
    select, input[type="color"], input[type="text"] {
      width: 100%;
      padding: 10px 14px;
      background: #111827;
      border: 1.5px solid #374151;
      border-radius: 8px;
      color: #e0e7ff;
      font-size: 1rem;
      transition: border-color 0.3s ease;
    }
    select:focus, input[type="color"]:focus, input[type="text"]:focus {
      outline: none;
      border-color: #8b5cf6;
      box-shadow: 0 0 8px #8b5cf6cc;
      background: #1f2937;
      color: #e0e7ff;
    }
    button {
      margin-top: 24px;
      background: linear-gradient(135deg, #8b5cf6, #06b6d4);
      border: none;
      color: white;
      font-weight: 700;
      font-size: 1.1rem;
      padding: 14px 0;
      width: 100%;
      border-radius: 12px;
      cursor: pointer;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    button:hover, button:focus {
      transform: scale(1.05);
      box-shadow: 0 0 24px #8b5cf6cc;
      outline: none;
    }
    .suggestions {
      max-width: 960px;
      width: 100%;
      display: grid;
      grid-template-columns: repeat(auto-fit,minmax(280px,1fr));
      gap: 24px;
    }
    .card {
      background: rgba(31, 41, 55, 0.85);
      border-radius: 16px;
      padding: 16px;
      box-shadow: 0 6px 20px rgba(14, 30, 57, 0.7);
      display: flex;
      flex-direction: column;
      align-items: center;
      transition: transform 0.3s ease;
    }
    .card:hover {
      transform: translateY(-8px);
      box-shadow: 0 12px 36px rgba(139, 92, 246, 0.5);
    }
    .card img {
      width: 100%;
      max-width: 180px;
      border-radius: 14px;
      margin-bottom: 16px;
      object-fit: cover;
    }
    .card-title {
      font-weight: 800;
      font-size: 1.25rem;
      margin-bottom: 8px;
      text-align: center;
      color: #8b5cf6;
    }
    .card-desc {
      font-size: 0.9rem;
      text-align: center;
      margin-bottom: 12px;
      color: #cbd5e1;
    }
    .tag {
      display: inline-block;
      font-size: 0.75rem;
      font-weight: 600;
      padding: 4px 10px;
      border-radius: 12px;
      background: #06b6d4cc;
      color: #030712;
      margin: 2px 4px;
      user-select: none;
    }
    .material-icons {
      vertical-align: middle;
      font-size: 20px;
      color: #8b5cf6;
      margin-right: 6px;
    }
    @media (max-width: 480px) {
      body {
        padding: 16px 8px;
      }
      h1 {
        font-size: 2rem;
      }
      form {
        padding: 16px;
      }
    }
  </style>
</head>
<body>
  <h1>Jewelry Outfit Suggestions</h1>
  <?php
  /* Database connection settings - adjust as per your setup */
  $dbHost = 'localhost';
  $dbName = 'jewelry_db';
  $dbUser = 'root';
  $dbPass = '';

  try {
    $pdo = new PDO("mysql:host=$dbHost;dbname=$dbName;charset=utf8mb4", $dbUser, $dbPass, [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
  } catch (PDOException $e) {
    echo '<p style="color:#f87171; font-weight:bold; text-align:center;">Database connection failed: ' . htmlspecialchars($e->getMessage()) . '</p>';
    exit;
  }

  // Fetch available options for styles, occasions, colors from jewelry table distinct values for selects
  function fetchDistinct($pdo, $column) {
    $stmt = $pdo->prepare("SELECT DISTINCT TRIM(BOTH '\"' FROM JSON_UNQUOTE(JSON_EXTRACT($column, '$[*]'))) AS val FROM jewelry");
    $stmt->execute();
    $results = [];
    while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
      $results[] = $row[0];
    }
    // Remove empty and duplicates
    $results = array_filter(array_unique($results), fn($v) => !empty($v));
    sort($results, SORT_STRING | SORT_FLAG_CASE);
    return $results;
  }

  // For simplicity, hardcoded options (can be replaced with dynamic fetching if database is complex)
  $availableStyles = ['classic', 'bohemian', 'minimalist', 'vintage', 'casual', 'modern', 'bold', 'party', 'formal'];
  $availableOccasions = ['wedding', 'party', 'formal', 'work', 'casual', 'festival', 'vacation'];
  $availableColors = ['white', 'silver', 'turquoise', 'blue', 'gold', 'black', 'brown', 'clear'];

  // Retrieve user input or default
  $selectedStyle = $_POST['style'] ?? 'any';
  $selectedOccasion = $_POST['occasion'] ?? 'any';
  $selectedColor = $_POST['color'] ?? 'any';

  // Security: convert color hex to closest known color or 'any'
  // The color input will be a hex color, but our DB colors are names
  // So we map approximately or treat 'any' if black (#000000) selected
  function mapHexToColorName($hex) {
    $hex = strtolower($hex);
    $colorMap = [
      'white' => ['#ffffff', '#f8f8f8', '#fafafa'],
      'silver' => ['#c0c0c0', '#d3d3d3', '#bfbfbf'],
      'turquoise' => ['#40e0d0', '#48d1cc', '#00ced1'],
      'blue' => ['#0000ff', '#1e90ff', '#4169e1'],
      'gold' => ['#ffd700', '#ffc700', '#ffb700'],
      'black' => ['#000000', '#0a0a0a'],
      'brown' => ['#a52a2a', '#8b4513'],
      'clear' => [],
    ];
    foreach ($colorMap as $name => $hexList) {
      if (in_array($hex, $hexList)) {
        return $name;
      }
    }
    return 'any';
  }

  if ($selectedColor !== 'any') {
    $safeColorName = mapHexToColorName($selectedColor);
    if ($safeColorName !== 'any') {
      $selectedColor = $safeColorName;
    } else {
      $selectedColor = 'any';
    }
  }

  // Build SQL Query with parameters for filtering
  // Jewelry data structure: fields 'styles', 'occasions', 'colors' stored as JSON arrays in DB

  $query = "SELECT id, name, description, image_url, styles, occasions, colors, tags FROM jewelry WHERE 1=1";
  $params = [];

  if ($selectedStyle !== 'any') {
    $query .= " AND JSON_CONTAINS(styles, :style)";
    $params[':style'] = json_encode($selectedStyle);
  }
  if ($selectedOccasion !== 'any') {
    $query .= " AND JSON_CONTAINS(occasions, :occasion)";
    $params[':occasion'] = json_encode($selectedOccasion);
  }
  if ($selectedColor !== 'any') {
    $query .= " AND JSON_CONTAINS(colors, :color)";
    $params[':color'] = json_encode($selectedColor);
  }

  $query .= " ORDER BY name ASC";

  try {
    $stmt = $pdo->prepare($query);
    $stmt->execute($params);
    $suggestions = $stmt->fetchAll();
  } catch (PDOException $e) {
    echo '<p style="color:#f87171; font-weight:bold; text-align:center;">Query failed: ' . htmlspecialchars($e->getMessage()) . '</p>';
    $suggestions = [];
  }
  ?>

  <form method="POST" action="#suggestions" aria-label="Jewelry outfit suggestion form" novalidate>
    <label for="style">
      <span class="material-icons" aria-hidden="true">style</span>
      Select Outfit Style
    </label>
    <select id="style" name="style" aria-required="true">
      <option value="any" <?= $selectedStyle === 'any' ? 'selected' : '' ?>>Any style</option>
      <?php foreach ($availableStyles as $style): ?>
        <option value="<?= htmlspecialchars($style, ENT_QUOTES) ?>" <?= $selectedStyle === $style ? 'selected' : '' ?>>
          <?= ucfirst($style) ?>
        </option>
      <?php endforeach; ?>
    </select>

    <label for="occasion">
      <span class="material-icons" aria-hidden="true">event</span>
      Select Occasion
    </label>
    <select id="occasion" name="occasion" aria-required="true">
      <option value="any" <?= $selectedOccasion === 'any' ? 'selected' : '' ?>>Any occasion</option>
      <?php foreach ($availableOccasions as $occasion): ?>
        <option value="<?= htmlspecialchars($occasion, ENT_QUOTES) ?>" <?= $selectedOccasion === $occasion ? 'selected' : '' ?>>
          <?= ucfirst($occasion) ?>
        </option>
      <?php endforeach; ?>
    </select>

    <label for="color">
      <span class="material-icons" aria-hidden="true">palette</span>
      Outfit Color (Choose the main outfit color)
    </label>
    <input type="color" id="color" name="color" value="<?= ($selectedColor !== 'any' ? htmlspecialchars($selectedColor, ENT_QUOTES) : '#000000') ?>" aria-required="true" />
    <small style="color:#94a3b8; font-size:0.75rem; margin-top:4px;">Tip: Choose approximate color or leave black to select any.</small>

    <button type="submit" aria-label="Get jewelry suggestions for selected outfit">Get Jewelry Suggestions</button>
  </form>

  <section id="suggestions" class="suggestions" aria-live="polite" aria-atomic="true" aria-label="Jewelry suggestions based on outfit selections">
    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
      <?php if (count($suggestions) === 0): ?>
        <p style="text-align:center; font-size:1.2rem; color:#d1d5db;">No jewelry matches found for your selection. Try adjusting the filters.</p>
      <?php else: ?>
        <?php foreach ($suggestions as $item): ?>
          <article class="card" tabindex="0" role="region" aria-label="<?= htmlspecialchars($item['name'], ENT_QUOTES) ?>">
            <img src="<?= htmlspecialchars($item['image_url'], ENT_QUOTES) ?>" 
                 alt="<?= htmlspecialchars($item['description'], ENT_QUOTES) ?>" 
                 loading="lazy" 
                 onerror="this.onerror=null;this.src='https://placehold.co/300x300/gray/ffffff?text=Image+Unavailable';" />
            <h2 class="card-title"><?= htmlspecialchars($item['name'], ENT_QUOTES) ?></h2>
            <p class="card-desc"><?= htmlspecialchars($item['description'], ENT_QUOTES) ?></p>
            <div aria-label="Tags" role="list" style="text-align:center;">
              <?php 
                $tags = json_decode($item['tags'], true);
                if (is_array($tags)):
                  foreach($tags as $tag): ?>
                    <span role="listitem" class="tag"><?= htmlspecialchars($tag, ENT_QUOTES) ?></span>
              <?php endforeach; endif; ?>
            </div>
          </article>
        <?php endforeach; ?>
      <?php endif; ?>
    <?php else: ?>
      <p style="text-align:center; font-size:1.1rem; color:#94a3b8;">Select your outfit style, occasion, and color to get personalized jewelry suggestions.</p>
    <?php endif; ?>
  </section>

  <!-- Instructions for SQL database and table -->
  <details style="max-width:960px; margin: 48px auto; color:#94a3b8;">
    <summary><strong>Database Setup Instructions (Click to expand)</strong></summary>
    <pre style="background:#111827; color:#d1d5db; padding: 12px; overflow:auto;">
CREATE DATABASE jewelry_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE jewelry_db;

CREATE TABLE jewelry (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  description TEXT NOT NULL,
  image_url VARCHAR(511) NOT NULL,
  styles JSON NOT NULL,
  occasions JSON NOT NULL,
  colors JSON NOT NULL,
  tags JSON NOT NULL
);

INSERT INTO jewelry (name, description, image_url, styles, occasions, colors, tags) VALUES
('Elegant Pearl Necklace', 'A timeless pearl necklace to complement formal and classic outfits.', 'https://placehold.co/300x300/8b5cf6/ffffff?text=Elegant+Pearl+Necklace', '["classic","formal"]', '["wedding","party","formal"]', '["white","silver"]', '["necklace","pearls","classic"]'),
('Boho Turquoise Earrings', 'Vibrant turquoise earrings perfect for a free-spirited boho look.', 'https://placehold.co/300x300/06b6d4/ffffff?text=Boho+Turquoise+Earrings', '["bohemian","casual"]', '["casual","festival","vacation"]', '["turquoise","silver","blue"]', '["earrings","turquoise","boho"]'),
('Minimalist Gold Ring', 'A sleek gold ring for modern, minimalist outfits.', 'https://placehold.co/300x300/fbbf24/000000?text=Minimalist+Gold+Ring', '["minimalist","modern","formal"]', '["work","formal","casual"]', '["gold"]', '["ring","gold","minimalist"]'),
('Vintage Sapphire Bracelet', 'A striking sapphire bracelet with vintage charm.', 'https://placehold.co/300x300/2563eb/ffffff?text=Vintage+Sapphire+Bracelet', '["vintage","classic"]', '["party","formal","wedding"]', '["blue","silver"]', '["bracelet","sapphire","vintage"]'),
('Casual Leather Choker', 'A trendy leather choker for everyday casual wear.', 'https://placehold.co/300x300/000000/ffffff?text=Casual+Leather+Choker', '["casual","modern"]', '["casual","work","vacation"]', '["black","brown"]', '["necklace","leather","casual"]'),
('Statement Crystal Earrings', 'Dazzling crystal earrings that draw attention at every event.', 'https://placehold.co/300x300/ebe534/000000?text=Statement+Crystal+Earrings', '["bold","party","glam"]', '["party","wedding","formal"]', '["clear","silver"]', '["earrings","crystal","statement"]');
    </pre>
  </details>
</body>
</html>

