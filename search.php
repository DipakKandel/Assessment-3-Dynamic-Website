<?php
require 'includes/config.php';
require 'includes/header.php';

$query = $_GET['query'] ?? '';
$results = [];

if (!empty($query)) {
    $search = "%$query%";
    $stmt = $conn->prepare("SELECT * FROM recipes WHERE title LIKE ? OR description LIKE ? OR ingredients LIKE ?");
    $stmt->bind_param("sss", $search, $search, $search);
    $stmt->execute();
    $results = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
}
?>

<main class="search-results">
    <h2>Search Results for "<?= htmlspecialchars($query) ?>"</h2>
    
    <?php if (empty($results)): ?>
        <p>No recipes found. Try a different search term.</p>
    <?php else: ?>
        <div class="recipe-grid">
            <?php foreach ($results as $recipe): ?>
                <!-- Reuse your recipe card HTML -->
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</main>

<?php require 'includes/footer.php'; ?>