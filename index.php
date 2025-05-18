<?php
$page = 'home';
$page_title = 'Tasty Treasures Cookbook';
require 'includes/config.php';
require 'includes/header.php';

// Fetch featured recipes
$featured_recipes = $conn->query("SELECT * FROM recipes WHERE featured = 1 LIMIT 10");
?>

<!-- Slider Section -->
<section class="homepage-slider">
    <div class="slides">
        <?php
        $slides = [
            ['src' => 'images/slides/slide1.jpg', 'alt' => 'Delicious food selection'],
            ['src' => 'images/slides/slide2.jpg', 'alt' => 'Fresh ingredients'],
            ['src' => 'images/slides/slide3.jpg', 'alt' => 'Cooking preparation']
        ];
        
        foreach ($slides as $index => $slide) {
            $active = $index === 0 ? 'active' : '';
            echo '<img class="slide '.$active.'" src="'.$slide['src'].'" alt="'.$slide['alt'].'">';
        }
        ?>
    </div>
    <button class="slider-button prev-btn">&lt;</button>
    <button class="slider-button next-btn">&gt;</button>
</section>

<!-- Categories Section -->
<section class="categories">
    <h2>CATEGORIES</h2>
    <div class="category-list">
        <?php
        $categories = $conn->query("SELECT DISTINCT category FROM recipes LIMIT 4");
        $icons = ['🍳', '🥗', '🍝', '🍲'];
        $i = 0;
        
        while ($row = $categories->fetch_assoc()) {
            echo '<div class="each-category">
                <a href="categories.php?cat='.urlencode($row['category']).'" class="category-circle">
                    '.$icons[$i++ % count($icons)].'
                </a>
                <p class="category-name">'.htmlspecialchars($row['category']).'</p>
            </div>';
        }
        ?>
    </div>
</section>

<!-- Featured Recipes -->
<section class="featured">
    <h2>Featured Recipes</h2>
     
    <div class="recipe-grid">
        <?php
        if ($featured_recipes->num_rows > 0) {
            while ($recipe = $featured_recipes->fetch_assoc()) {
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
    
    
</section>



<?php
$conn->close();
require 'includes/footer.php';
?>