<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}
require '../includes/config.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../admin/admin-stylesheet.css">
</head>
<body>
    <div class="header">
        <h2>Recipe Dashboard</h2>
        <a href="logout.php" class="logout-btn">Logout</a>
    </div>

    <div class="dashboard">
        <a href="add_recipe.php" class="btn">+ Add New Recipe</a>
        <a href="add_tips.php" class="btn">+ Add New Tips</a>

        <h3>Recipes</h3>
        <table>
            <tr>
                <th>Title</th>
                <th>Category</th>
                <th>Featured</th>
                <th>Actions</th>
            </tr>
            <?php
            $result = $conn->query("SELECT * FROM recipes");
            while ($row = $result->fetch_assoc()):
            ?>
            <tr>
                <td><?= htmlspecialchars($row['title']) ?></td>
                <td><?= htmlspecialchars($row['category']) ?></td>
                <td><?= $row['featured'] ? 'Yes' : 'No' ?></td>
                <td class="action-links">
                    <a href="delete_recipe.php?id=<?= $row['id'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>

        <h3>Tips</h3>
        <table>
            <tr>
                <th>Title</th>
                <th>Content</th>
                <th>Actions</th>
            </tr>
            <?php
            $result = $conn->query("SELECT * FROM tips");
            while ($row = $result->fetch_assoc()):
            ?>
            <tr>
                <td><?= htmlspecialchars($row['title']) ?></td>
                <td><?= htmlspecialchars(substr($row['content'], 0, 80)) ?>...</td>
                <td class="action-links">
                    <a href="delete_tips.php?id=<?= $row['id'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>
         <h2>Contact Submissions</h2>
        <table>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Message</th>
                <th>Submitted At</th>
                <th>Actions</th>
            </tr>
            <?php
            $result = $conn->query("SELECT * FROM contact_submissions WHERE is_read = 0 ORDER BY submitted_at DESC");
            while ($row = $result->fetch_assoc()):
            ?>
            <tr>
                <td><?= htmlspecialchars($row['name']) ?></td>
                <td><?= htmlspecialchars($row['email']) ?></td>
                <td><?= htmlspecialchars($row['message']) ?></td>
                <td><?= htmlspecialchars($row['submitted_at']) ?></td>
                <td class="action-links">
                    <a href="mark_read_submission.php?id=<?= $row['id'] ?>" onclick="return confirm('Mark this as read?')">Mark as Read</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>
</body>
</html>
