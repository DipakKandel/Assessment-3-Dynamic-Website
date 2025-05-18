<?php
require 'includes/config.php';
require 'includes/header.php';

// Get tip ID from URL
$tip_id = $_GET['id'] ?? 0;

// Fetch full tip details
$stmt = $conn->prepare("SELECT * FROM tips WHERE id = ?");
$stmt->bind_param("i", $tip_id);
$stmt->execute();
$tip = $stmt->get_result()->fetch_assoc();

if (!$tip) {
    header("Location: tips.php");
    exit;
}
?>

<main class="tip-detail">
    <article>
        <h1><?= htmlspecialchars($tip['title']) ?></h1>
        
        <div class="tip-meta">
            <span class="tip-date">Posted on <?= date('F j, Y', strtotime($tip['created_at'])) ?></span>
        </div>
        
        <img src="<?= $tip['image_path'] ?>" alt="<?= htmlspecialchars($tip['title']) ?>" class="tip-featured-image">
        
        <div class="tip-content">
            <?= nl2br(htmlspecialchars($tip['content'])) ?>
        </div>
        
        <div class="tip-actions">
            <a href="tips.php" class="btn-back">← Back to Tips</a>
            <button class="btn-print" onclick="window.print()">Print Tip</button>
        </div>
    </article>
</main>

<?php require 'includes/footer.php'; ?>