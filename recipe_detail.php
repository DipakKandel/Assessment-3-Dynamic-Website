<?php
require 'includes/config.php';
require 'includes/header.php';

$recipe_id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if (!$recipe_id) {
    header("Location: index.php");
    exit;
}

$stmt = $conn->prepare("SELECT * FROM recipes WHERE id = ?");
$stmt->bind_param("i", $recipe_id);
$stmt->execute();
$recipe = $stmt->get_result()->fetch_assoc();

if (!$recipe) {
    header("Location: index.php");
    exit;
}
?>

<main class="tip-detail">
    <article>
        <h1><?= htmlspecialchars($recipe['title']) ?></h1>
        
        <div class="tip-meta">
            <span class="recipe-category"><?= htmlspecialchars($recipe['category']) ?></span>
            <span class="tip-date">Posted on <?= date('F j, Y', strtotime($recipe['created_at'])) ?></span>
            <?php if ($recipe['featured']): ?>
                <span class="featured-badge">Featured</span>
            <?php endif; ?>
        </div>
        
        <img src="<?= $recipe['image_path'] ?>" alt="<?= htmlspecialchars($recipe['title']) ?>" class="tip-featured-image">
        
        <div class="tip-content">
            <p><?= nl2br(htmlspecialchars($recipe['description'])) ?></p>
            
            <h3>Ingredients</h3>
            <ul class="recipe-ingredients">
                <?php foreach (explode("\n", $recipe['ingredients']) as $ingredient): ?>
                    <?php if (trim($ingredient)): ?>
                        <li><?= htmlspecialchars(trim($ingredient)) ?></li>
                    <?php endif; ?>
                <?php endforeach; ?>
            </ul>
            
            <h3>Instructions</h3>
            <ul class="recipe-instructions"> <!-- Changed from ol to ul -->
                <?php foreach (explode("\n", $recipe['instructions']) as $step): ?>
                    <?php if (trim($step)): ?>
                        <li><?= htmlspecialchars(trim($step)) ?></li>
                    <?php endif; ?>
                <?php endforeach; ?>
            </ul>
        </div>
        
        <div class="tip-actions">
            <a href="javascript:history.back()" class="btn-back">← Back to Recipes</a>
            <button class="btn-print" onclick="window.print()">Print Recipe</button>
        </div>
    </article>
</main>

<?php require 'includes/footer.php'; ?>