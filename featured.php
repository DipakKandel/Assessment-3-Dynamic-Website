<?php
$page = 'featured';
$page_title = 'Recipes - Tasty Treasures';
require 'includes/config.php';
require 'includes/header.php';

$recipes = $conn->query("SELECT * FROM recipes");
?>

<main class="featured">
    <h2>Featured Recipes</h2>
   
     <div class="recipe-grid">
        <?php
        if ($recipes->num_rows > 0) {
            while ($recipe = $recipes->fetch_assoc()) {
                echo '<div class="recipe-each" onclick="window.location=\'recipe_detail.php?id='.$recipe['id'].'\'" style="cursor: pointer;">
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
    </div>
    
</main>

<?php
$conn->close();
require 'includes/footer.php';
?>