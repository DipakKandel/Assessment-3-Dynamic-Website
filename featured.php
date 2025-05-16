<?php
$page = 'featured';
$page_title = 'Featured Recipes - Tasty Treasures';
require 'includes/config.php';
require 'includes/header.php';

$recipes = $conn->query("SELECT * FROM recipes WHERE featured = 1");
?>

<main class="featured">
    <h2>Featured Recipes</h2>
    <!-- <div class="recipe-grid">
        <?php
        if ($recipes->num_rows > 0) {
            while ($recipe = $recipes->fetch_assoc()) {
                echo '<div class="recipe-each">
                    <img src="'.$recipe['image_path'].'" alt="'.htmlspecialchars($recipe['title']).'">
                    <div class="recipe-info">
                        <h3>'.htmlspecialchars($recipe['title']).'</h3>
                        <p>'.htmlspecialchars($recipe['description']).'</p>
                    </div>
                </div>';
            }
        } else {
            echo '<p class="no-recipes">No featured recipes found</p>';
        }
        ?>
    </div>  -->
    <!-- Replace the recipe display section with this -->
    <div class="recipe-grid">
    <?php while ($recipe = $featured_recipes->fetch_assoc()): ?>
    <div class="recipe-each">
        <a href="recipe_detail.php?id=<?= $recipe['id'] ?>">
            <img src="<?= $recipe['image_path'] ?>" alt="<?= htmlspecialchars($recipe['title']) ?>">
        </a>
        <div class="recipe-info">
            <h3><a href="recipe_detail.php?id=<?= $recipe['id'] ?>"><?= htmlspecialchars($recipe['title']) ?></a></h3>
            <p><?= nl2br(htmlspecialchars(substr($recipe['description'], 0, 100))) ?>...</p>
            <a href="recipe_detail.php?id=<?= $recipe['id'] ?>" class="view-recipe">View Recipe →</a>
        </div>
    </div>
    <?php endwhile; ?>
</div>
    
</main>

<?php
$conn->close();
require 'includes/footer.php';
?>