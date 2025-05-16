<?php
require 'includes/config.php';
require 'includes/header.php';

// Get recipe ID safely
$recipe_id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if (!$recipe_id) {
    header("Location: index.php");
    exit;
}

// Fetch recipe details
$stmt = $conn->prepare("SELECT * FROM recipes WHERE id = ?");
$stmt->bind_param("i", $recipe_id);
$stmt->execute();
$recipe = $stmt->get_result()->fetch_assoc();

if (!$recipe) {
    header("Location: index.php");
    exit;
}
?>

<main class="recipe-detail">
    <article>
        <h1><?= htmlspecialchars($recipe['title']) ?></h1>
        
        <div class="recipe-meta">
            <span class="recipe-category"><?= htmlspecialchars($recipe['category']) ?></span>
            <?php if ($recipe['featured']): ?>
                <span class="featured-badge">Featured</span>
            <?php endif; ?>
        </div>
        
        <img src="<?= $recipe['image_path'] ?>" alt="<?= htmlspecialchars($recipe['title']) ?>" class="recipe-hero-image">
        
        <div class="recipe-description">
            <p><?= nl2br(htmlspecialchars($recipe['description'])) ?></p>
        </div>
        
        <div class="recipe-sections">
            <section class="ingredients">
                <h2>Ingredients</h2>
                <ul>
                    <?php foreach (explode("\n", $recipe['ingredients']) as $ingredient): ?>
                        <?php if (trim($ingredient)): ?>
                            <li><?= htmlspecialchars(trim($ingredient)) ?></li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </ul>
            </section>
            
            <section class="instructions">
                <h2>Instructions</h2>
                <ol>
                    <?php foreach (explode("\n", $recipe['instructions']) as $step): ?>
                        <?php if (trim($step)): ?>
                            <li><?= htmlspecialchars(trim($step)) ?></li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </ol>
            </section>
        </div>
        
        <div class="recipe-actions">
            <a href="javascript:history.back()" class="btn-back">← Back to Recipes</a>
            <button class="btn-print" onclick="window.print()">Print Recipe</button>
        </div>
    </article>
</main>

<?php require 'includes/footer.php'; ?>