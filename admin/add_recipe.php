<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}
require '../includes/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $conn->real_escape_string($_POST['title']);
    $category = $conn->real_escape_string($_POST['category']);
    $description = $conn->real_escape_string($_POST['description']);
    $ingredients = $conn->real_escape_string($_POST['ingredients']);
    $instructions = $conn->real_escape_string($_POST['instructions']);
    $featured = isset($_POST['featured']) ? 1 : 0;

    // Default image path
    $image_path = 'images/recipe/default.jpg';

    // Handle image upload
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $upload_dir = '../images/recipe/';
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true); // create folder if not exists
        }

        $filename = basename($_FILES['image']['name']);
        $target_file = $upload_dir . $filename;

        // Move uploaded file
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
            // Save correct relative path for DB
            $image_path = 'images/recipe/' . $filename;
        } else {
            // Optional: log error
            error_log("Failed to move uploaded file.");
        }
    } else if ($_FILES['image']['error'] !== UPLOAD_ERR_NO_FILE) {
        // Optional: handle other errors
        error_log("Upload error: " . $_FILES['image']['error']);
    }

    // Insert into database
    $stmt = $conn->prepare("INSERT INTO recipes (title, category, description, ingredients, instructions, image_path, featured) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssi", $title, $category, $description, $ingredients, $instructions, $image_path, $featured);
    $stmt->execute();

    header('Location: dashboard.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Recipe</title>
    <link rel="stylesheet" href="../stylesheet.css">
</head>
<body>
    <div class="recipe-form">
        <h2>Add New Recipe</h2>
        <form method="POST" enctype="multipart/form-data">
            <label>Title: <input type="text" name="title" required></label>
            <label>Category:
                <select name="category" required>
                    <option value="Breakfast">Breakfast</option>
                    <option value="Lunch">Lunch</option>
                    <option value="Dinner">Dinner</option>
                    <option value="Dessert">Dessert</option>
                </select>
            </label>
            <label>Description: <textarea name="description" required></textarea></label>
            <label>Ingredients: <textarea name="ingredients" required></textarea></label>
            <label>Instructions: <textarea name="instructions" required></textarea></label>
            <label>Featured: <input type="checkbox" name="featured"></label>
            <label>Image: <input type="file" name="image" accept="image/*"></label>
            <button type="submit">Save Recipe</button>
            <a href="dashboard.php" class="btn-cancel">Cancel</a>
        </form>
    </div>
</body>
</html>
