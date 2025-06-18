<?php
// Initialize variables
$catalog = [
    [
        "name" => "Modern Gold Ring",
        "type" => "ring",
        "style" => "modern",
        "occasion" => "wedding",
        "colors" => ["gold", "yellow"],
        "price" => 500,
        "image" => "https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/2ed77b89-76dc-4458-95f7-6097cd64f3ab.png",
        "description" => "Elegant modern gold wedding ring with smooth finish."
    ],
    [
        "name" => "Vintage Silver Necklace",
        "type" => "necklace",
        "style" => "vintage",
        "occasion" => "birthday",
        "colors" => ["silver", "grey"],
        "price" => 150,
        "image" => "https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/519aaeda-ea55-4650-aac4-a656bb331886.png",
        "description" => "Classic vintage-style silver necklace perfect for birthdays."
    ],
    [
        "name" => "Classic Diamond Earrings",
        "type" => "earrings",
        "style" => "classic",
        "occasion" => "anniversary",
        "colors" => ["white", "silver"],
        "price" => 1000,
        "image" => "https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/ae39f2da-71e4-4ac1-8aaf-85a1b427b94f.png",
        "description" => "Timeless classic diamond earrings suitable for anniversaries."
    ],
    [
        "name" => "Modern Silver Bracelet",
        "type" => "bracelet",
        "style" => "modern",
        "occasion" => "birthday",
        "colors" => ["silver", "grey"],
        "price" => 200,
        "image" => "https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/0be5ceab-b380-4e1e-a2f4-beb7400cc5cc.png",
        "description" => "Sleek modern silver bracelet for stylish occasions."
    ],
    [
        "name" => "Vintage Pearl Ring",
        "type" => "ring",
        "style" => "vintage",
        "occasion" => "anniversary",
        "colors" => ["white", "cream"],
        "price" => 450,
        "image" => "https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/67cc0027-2b4e-4407-aff4-ed5192def926.png",
        "description" => "Vintage pearl ring with intricate artistry."
    ],
    [
        "name" => "Classic Gold Necklace",
        "type" => "necklace",
        "style" => "classic",
        "occasion" => "wedding",
        "colors" => ["gold", "yellow"],
        "price" => 800,
        "image" => "https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/abbeccfe-84a2-40b7-8062-0bf487789472.png",
        "description" => "Classic gold necklace ideal for wedding occasions."
    ],
    [
        "name" => "Modern Hoop Earrings",
        "type" => "earrings",
        "style" => "modern",
        "occasion" => "birthday",
        "colors" => ["silver", "grey"],
        "price" => 120,
        "image" => "https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/7eb8f230-c39e-456b-a90f-6fdb1a4c12cb.png",
        "description" => "Trendy modern hoop earrings for casual or party wear."
    ],
    [
        "name" => "Vintage Charm Bracelet",
        "type" => "bracelet",
        "style" => "vintage",
        "occasion" => "anniversary",
        "colors" => ["gold", "yellow"],
        "price" => 350,
        "image" => "https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/93d52eb8-f243-4791-967b-10d8a1e48d1e.png",
        "description" => "Vintage charm bracelet full of nostalgic elegance."
    ],
];

// Initialize variables for form and processing
$suggestions = [];
$showResults = false;
$uploadedImagePath = "";
$errorMessage = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle file upload
    if (isset($_FILES['outfit_photo']) && $_FILES['outfit_photo']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['outfit_photo']['tmp_name'];
        $fileName = basename($_FILES['outfit_photo']['name']);
        $fileSize = $_FILES['outfit_photo']['size'];
        $fileType = $_FILES['outfit_photo']['type'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];

        if (in_array($fileExtension, $allowedExtensions)) {
            if ($fileSize <= 5 * 1024 * 1024) { // 5MB max size
                $uploadFileDir = __DIR__ . '/uploads/';
                if (!is_dir($uploadFileDir)) {
                    mkdir($uploadFileDir, 0755, true);
                }
                $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
                $destPath = $uploadFileDir . $newFileName;
                if (move_uploaded_file($fileTmpPath, $destPath)) {
                    $uploadedImagePath = 'uploads/' . $newFileName;
                } else {
                    $errorMessage = "Error moving the uploaded file.";
                }
            } else {
                $errorMessage = "File size exceeds 5MB limit.";
            }
        } else {
            $errorMessage = "Upload failed. Allowed file types: jpg, jpeg, png, gif.";
        }
    } elseif (isset($_FILES['outfit_photo']) && $_FILES['outfit_photo']['error'] !== UPLOAD_ERR_NO_FILE) {
        $errorMessage = "Error uploading file. Please try again.";
    }

    // Get form inputs
    $type = $_POST['type'] ?? '';
    $style = $_POST['style'] ?? '';
    $occasion = $_POST['occasion'] ?? '';
    $budget = $_POST['budget'] ?? 0;
    $budget = is_numeric($budget) ? floatval($budget) : 0;
    $outfit_color = $_POST['outfit_color'] ?? '';

    // Filter suggestions based on inputs and outfit color matching
    $suggestions = array_filter($catalog, function($item) use ($type, $style, $occasion, $budget, $outfit_color){
        $matchType = $type === "" || $item['type'] === $type;
        $matchStyle = $style === "" || $item['style'] === $style;
        $matchOccasion = $occasion === "" || $item['occasion'] === $occasion;
        $matchBudget = $budget <= 0 || $item['price'] <= $budget;
        $matchColor = $outfit_color === "" || in_array(strtolower($outfit_color), $item['colors']);
        return $matchType && $matchStyle && $matchOccasion && $matchBudget && $matchColor;
    });

    $showResults = true;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Jewelry Matcher with Outfit Upload</title>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
<style>
    * {
        box-sizing: border-box;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    body {
        margin: 0;
        background: #f3f4f6;
        color: #111827;
        padding: 24px;
        min-height: 100vh;
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    h1 {
        font-weight: 700;
        font-size: 2.5rem;
        margin-bottom: 24px;
        color: #6366f1;
    }
    form {
        background: #fff;
        padding: 24px;
        border-radius: 16px;
        box-shadow: 0 8px 16px rgb(99 102 241 / 0.2);
        max-width: 520px;
        width: 100%;
        display: grid;
        grid-gap: 20px;
        margin-bottom: 48px;
    }
    label {
        font-weight: 600;
        margin-bottom: 6px;
        display: block;
        color: #374151;
    }
    select, input[type="number"], input[type="file"] {
        width: 100%;
        padding: 12px;
        border: 2px solid #e0e7ff;
        border-radius: 12px;
        font-size: 1rem;
        transition: border-color 0.3s ease;
        background: #f9fafb;
        color: #111827;
    }
    select:focus, input[type="number"]:focus, input[type="file"]:focus {
        outline: none;
        border-color: #6366f1;
        background: #fff;
        box-shadow: 0 0 8px rgb(99 102 241 / 0.5);
    }
    button {
        display: flex;
        align-items: center;
        justify-content: center;
        background: #6366f1;
        color: white;
        font-weight: 700;
        border: none;
        padding: 14px 0;
        border-radius: 16px;
        font-size: 1.2rem;
        cursor: pointer;
        user-select: none;
        transition: background-color 0.3s ease;
    }
    button:hover {
        background: #4f46e5;
    }
    button .material-icons {
        margin-left: 8px;
        font-size: 20px;
    }
    .suggestions {
        max-width: 980px;
        width: 100%;
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 32px;
    }
    .card {
        background: white;
        border-radius: 24px;
        box-shadow: 0 0 24px rgb(99 102 241 / 0.1);
        overflow: hidden;
        display: flex;
        flex-direction: column;
        transition: transform 0.3s ease;
    }
    .card:hover {
        transform: translateY(-8px);
        box-shadow: 0 0 32px rgb(99 102 241 / 0.25);
    }
    .card img {
        width: 100%;
        aspect-ratio: 3 / 2;
        object-fit: cover;
    }
    .card-content {
        padding: 16px 20px 24px;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }
    .card-title {
        font-weight: 700;
        font-size: 1.25rem;
        margin-bottom: 8px;
        color: #4338ca;
    }
    .card-description {
        flex-grow: 1;
        font-size: 0.95rem;
        color: #6b7280;
        margin-bottom: 12px;
    }
    .card-info {
        font-size: 1rem;
        font-weight: 600;
        color: #111827;
    }
    .no-results {
        text-align: center;
        font-size: 1.3rem;
        color: #6b7280;
        margin-top: 32px;
    }
    .uploaded-image-preview {
        max-width: 320px;
        max-height: 320px;
        border-radius: 16px;
        box-shadow: 0 4px 12px rgb(0 0 0 / 0.1);
        margin: 0 auto 32px;
        object-fit: contain;
    }
    /* Responsive */
    @media (max-width: 520px) {
        body {
            padding: 16px;
        }
        form {
            padding: 16px;
            grid-gap: 16px;
        }
    }
</style>
</head>
<body>
<h1>Jewelry Matcher with Outfit Upload</h1>

<form method="POST" action="" enctype="multipart/form-data" aria-label="Jewelry matching form">
    <label for="outfit_photo">Upload Outfit Photo (Max 5MB)</label>
    <input type="file" name="outfit_photo" id="outfit_photo" accept="image/*" aria-describedby="fileHelp" />
    <div id="fileHelp" style="font-size:0.85rem;color:#6b7280;margin-top:-16px;margin-bottom:12px;">Choose an image to help match jewelry</div>

    <label for="type">Type of Jewelry</label>
    <select name="type" id="type" required>
        <option value="" disabled <?= !isset($type) ? 'selected' : '' ?>>Select type</option>
        <option value="ring" <?= (isset($type) && $type == 'ring') ? 'selected' : '' ?>>Ring</option>
        <option value="necklace" <?= (isset($type) && $type == 'necklace') ? 'selected' : '' ?>>Necklace</option>
        <option value="bracelet" <?= (isset($type) && $type == 'bracelet') ? 'selected' : '' ?>>Bracelet</option>
        <option value="earrings" <?= (isset($type) && $type == 'earrings') ? 'selected' : '' ?>>Earrings</option>
    </select>

    <label for="style">Style</label>
    <select name="style" id="style" required>
        <option value="" disabled <?= !isset($style) ? 'selected' : '' ?>>Select style</option>
        <option value="modern" <?= (isset($style) && $style == 'modern') ? 'selected' : '' ?>>Modern</option>
        <option value="vintage" <?= (isset($style) && $style == 'vintage') ? 'selected' : '' ?>>Vintage</option>
        <option value="classic" <?= (isset($style) && $style == 'classic') ? 'selected' : '' ?>>Classic</option>
    </select>

    <label for="occasion">Occasion</label>
    <select name="occasion" id="occasion" required>
        <option value="" disabled <?= !isset($occasion) ? 'selected' : '' ?>>Select occasion</option>
        <option value="wedding" <?= (isset($occasion) && $occasion == 'wedding') ? 'selected' : '' ?>>Wedding</option>
        <option value="birthday" <?= (isset($occasion) && $occasion == 'birthday') ? 'selected' : '' ?>>Birthday</option>
        <option value="anniversary" <?= (isset($occasion) && $occasion == 'anniversary') ? 'selected' : '' ?>>Anniversary</option>
    </select>

    <label for="budget">Maximum Budget (USD)</label>
    <input type="number" name="budget" id="budget" min="0" placeholder="Enter your budget" value="<?= isset($budget) && $budget > 0 ? htmlspecialchars($budget) : '' ?>" required />

    <label for="outfit_color">Select Main Outfit Color</label>
    <select name="outfit_color" id="outfit_color" aria-describedby="colorHelp">
        <option value="" <?= !isset($outfit_color) ? 'selected' : '' ?>>Not sure / skip</option>
        <option value="gold" <?= (isset($outfit_color) && $outfit_color == 'gold') ? 'selected' : '' ?>>Gold / Yellow</option>
        <option value="silver" <?= (isset($outfit_color) && $outfit_color == 'silver') ? 'selected' : '' ?>>Silver / Grey</option>
        <option value="white" <?= (isset($outfit_color) && $outfit_color == 'white') ? 'selected' : '' ?>>White / Cream</option>
        <option value="black" <?= (isset($outfit_color) && $outfit_color == 'black') ? 'selected' : '' ?>>Black</option>
        <option value="blue" <?= (isset($outfit_color) && $outfit_color == 'blue') ? 'selected' : '' ?>>Blue</option>
        <option value="red" <?= (isset($outfit_color) && $outfit_color == 'red') ? 'selected' : '' ?>>Red</option>
        <option value="green" <?= (isset($outfit_color) && $outfit_color == 'green') ? 'selected' : '' ?>>Green</option>
        <option value="pink" <?= (isset($outfit_color) && $outfit_color == 'pink') ? 'selected' : '' ?>>Pink</option>
    </select>
    <div id="colorHelp" style="font-size:0.85rem;color:#6b7280;margin-top:-16px;">Select main color of your outfit photo for better matching</div>

    <button type="submit">Get Matching Jewelry
        <span class="material-icons">search</span>
    </button>

    <?php if ($errorMessage): ?>
        <p style="color:#dc2626; font-weight:700; margin-top:10px;" role="alert"><?= htmlspecialchars($errorMessage) ?></p>
    <?php endif; ?>
</form>

<?php if ($uploadedImagePath): ?>
    <figure aria-label="Uploaded outfit photo">
        <img src="<?= htmlspecialchars($uploadedImagePath) ?>" alt="Uploaded outfit photo preview" class="uploaded-image-preview" loading="lazy" />
        <figcaption style="text-align:center; margin-bottom:40px; color:#374151;">Your uploaded outfit photo</figcaption>
    </figure>
<?php endif; ?>

<?php if ($showResults): ?>
    <?php if(count($suggestions) > 0): ?>
        <section class="suggestions" aria-label="Matching jewelry suggestions">
            <?php foreach($suggestions as $item): ?>
                <article class="card" tabindex="0" aria-describedby="desc-<?= htmlspecialchars($item['name']) ?>">
                    <img src="<?= htmlspecialchars($item['image']) ?>" alt="<?= htmlspecialchars($item['description']) ?>" loading="lazy" />
                    <div class="card-content">
                        <h2 class="card-title"><?= htmlspecialchars($item['name']) ?></h2>
                        <p id="desc-<?= htmlspecialchars($item['name']) ?>" class="card-description"><?= htmlspecialchars($item['description']) ?></p>
                        <div class="card-info">
                            <span><i class="material-icons" aria-hidden="true" style="vertical-align:bottom;">category</i> <?= ucfirst($item['type']) ?></span><br />
                            <span><i class="material-icons" aria-hidden="true" style="vertical-align:bottom;">style</i> <?= ucfirst($item['style']) ?></span><br />
                            <span><i class="material-icons" aria-hidden="true" style="vertical-align:bottom;">event</i> <?= ucfirst($item['occasion']) ?></span><br />
                            <strong>Price:</strong> $<?= number_format($item['price'], 2) ?>
                        </div>
                    </div>
                </article>
            <?php endforeach; ?>
        </section>
    <?php else: ?>
        <p class="no-results" role="alert">No suggestions found for your criteria. Please try different options.</p>
    <?php endif; ?>
<?php endif; ?>

</body>
</html>

