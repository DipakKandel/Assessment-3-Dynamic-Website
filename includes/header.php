<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title ?? $site_name; ?></title>
    <link rel="stylesheet" href="stylesheet.css">
</head>
<body>
    <header>
        <nav class="navigation">
            <div class="logo">
                <img src="images/logo.png" alt="Website Logo">
            </div>
            <ul class="menu-items">
                <li><a href="./index.php" <?php echo $page == 'home' ? 'class="active"' : ''; ?>>Home</a></li>
                <li><a href="./categories.php" <?php echo $page == 'categories' ? 'class="active"' : ''; ?>>Categories</a></li>
                <li><a href="./featured.php" <?php echo $page == 'featured' ? 'class="active"' : ''; ?>>Featured Recipes</a></li>
                <li><a href="./tips.php" <?php echo $page == 'tips' ? 'class="active"' : ''; ?>>Tips</a></li>
                <li><a href="./contact.php" <?php echo $page == 'contact' ? 'class="active"' : ''; ?>>Contact Us</a></li>
            </ul>
        </nav>
    </header>