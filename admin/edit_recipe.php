<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}
require '../includes/config.php';

// Fetch existing recipe
$id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM recipes WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$recipe = $stmt->get_result()->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Update recipe (similar to add_recipe.php but with UPDATE query)
    // ...
}
?>
<!-- Similar form to add_recipe.php but pre-populated -->