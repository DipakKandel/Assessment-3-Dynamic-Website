<?php
$page = 'categories';
$page_title = 'Recipe Categories - Tasty Treasures';
require 'includes/config.php';
require 'includes/header.php';

$current_category = isset($_GET['cat']) ? $_GET['cat'] : null;
?>

<main class="categories-page">
    <h1><?php echo $current_category ? htmlspecialchars($current_category) : 'Explore Recipe Categories'; ?></h1>
    
    <?php if (!$current_category): ?>
    <div class="category-grid">
        <?php
        $categories = $conn->query("SELECT DISTINCT category FROM recipes");
        while ($category = $categories->fetch_assoc()) {
            echo '<div class="category-card">
                <a href="categories.php?cat='.urlencode($category['category']).'" style="text-decoration:none;">
                    <img src="images/categories/'.strtolower($category['category']).'.jpg" alt="'.htmlspecialchars($category['category']).'">
                    <h3>'.htmlspecialchars($category['category']).'</h3>
                </a>
            </div>';

        }
        ?>
    </div>
    <?php else: ?>
    <div class="recipe-grid">
    <?php
    $stmt = $conn->prepare("SELECT * FROM recipes WHERE category = ?");
    $stmt->bind_param("s", $current_category);
    $stmt->execute();
    $recipes = $stmt->get_result();
    
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
        echo '<p class="no-recipes">No recipes found in this category</p>';
    }
    ?>
</div>
    <?php endif; ?>
</main>

<?php
$conn->close();
require 'includes/footer.php';
?>