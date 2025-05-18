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
    $image_path = 'images/tips/default.jpg';
    if ($_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $target_dir = "../images/tips/";
        $target_file = $target_dir . basename($_FILES['image']['name']);
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
            $image_path = 'images/tips/' . basename($_FILES['image']['name']);
        }
    }

    // Insert into database
    $stmt = $conn->prepare("INSERT INTO tips (title, content, image_path) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssssssi", $title, $content, $image_path, );
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
        <h2>Add New Tips</h2>
        <form method="POST" enctype="multipart/form-data">
            <label>Title: <input type="text" name="title" required></label>
            <label>Content: <textarea name="Content" required></textarea></label>
            <label>Image: <input type="file" name="image"></label>
            <button type="submit">Save Tips</button>
            <a href="dashboard.php" class="btn-cancel">Cancel</a>
        </form>
    </div>
</body>
</html>