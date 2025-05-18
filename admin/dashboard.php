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
    <link rel="stylesheet" href="../stylesheet.css">
    <style>
        .dashboard {
            padding: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }
        .action-links a {
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <div class="dashboard">
        <h2>Recipe Management</h2>
        <a href="add_recipe.php" class="btn">Add New Recipe</a>
        <a href="add_tips.php" class="btn">Add New Tips</a>

        
        <h3>Recipes</h3>
        <table>
            <tr>
                <!-- <th>ID</th> -->
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
                <!-- <td><?= $row['id'] ?></td> -->
                <td><?= htmlspecialchars($row['title']) ?></td>
                <td><?= htmlspecialchars($row['category']) ?></td>
                <td><?= $row['featured'] ? 'Yes' : 'No' ?></td>
                <td class="action-links">
                    <!-- <a href="edit_recipe.php?id=<?= $row['id'] ?>">Edit</a> -->
                    <a href="delete_recipe.php?id=<?= $row['id'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>
        <h3>Tips</h3>
        <table>
            <tr>
                <!-- <th>ID</th> -->
                <th>Title</th>
                <th>Content</th>
                <th>Actions</th>
            </tr>
            <?php
            $result = $conn->query("SELECT * FROM tips");
            while ($row = $result->fetch_assoc()):
            ?>
            <tr>
                <!-- <td><?= $row['id'] ?></td> -->
                <td><?= htmlspecialchars($row['title']) ?></td>
                <td><?= htmlspecialchars($row['content']) ?></td>
                <td class="action-links">
                    <!-- <a href="edit_recipe.php?id=<?= $row['id'] ?>">Edit</a> -->
                    <a href="delete_tips.php?id=<?= $row['id'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>
</body>
</html>