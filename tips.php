<?php
$page = 'tips';
$page_title = 'Cooking Tips - Tasty Treasures';
require 'includes/config.php';
require 'includes/header.php';

$tips = $conn->query("SELECT * FROM tips");
?>

<main class="tips-list-page">
    <h1>Kitchen Tips & Cooking Wisdom</h1>
    <div class="blog-list">
    <?php while ($tip = $tips->fetch_assoc()): ?>
    <div class="blog-card">
        <a href="tips_detail.php?id=<?= $tip['id'] ?>">
            <img src="<?= $tip['image_path'] ?>" alt="<?= htmlspecialchars($tip['title']) ?>">
        </a>
        <div class="blog-content">
            <h3><a href="tips_detail.php?id=<?= $tip['id'] ?>"><?= htmlspecialchars($tip['title']) ?></a></h3>
            <p><?= nl2br(htmlspecialchars(substr($tip['content'], 0, 200))) ?>...</p>
            <a href="tips_detail.php?id=<?= $tip['id'] ?>" class="read-more">Read More →</a>
        </div>
    </div>
    <?php endwhile; ?>
</div>

</main>

<?php
$conn->close();
require 'includes/footer.php';
?>