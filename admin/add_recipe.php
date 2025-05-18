<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}
require '../includes/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Process form data
    $title = $conn->real_escape_string($_POST['title']);
    $category = $conn->real_escape_string($_POST['category']);
    $description = $conn->real_escape_string($_POST['description']);
    $ingredients = $conn->real_escape_string($_POST['ingredients']);
    $instructions = $conn->real_escape_string($_POST['instructions']);
    $featured = isset($_POST['featured']) ? 1 : 0;
    
    // Handle file upload
    $image_path = 'images/recipe/default.jpg';
    if ($_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $target_dir = "../images/recipe/";
        $target_file = $target_dir . basename($_FILES['image']['name']);
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
            $image_path = 'images/recipe/' . basename($_FILES['image']['name']);
        }
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
            <label>Image: <input type="file" name="image"></label>
            <button type="submit">Save Recipe</button>
            <a href="dashboard.php" class="btn-cancel">Cancel</a>
        </form>
    </div>
</body>
</html>