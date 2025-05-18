<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}
require '../includes/config.php';

$id = $_GET['id'];
$conn->query("DELETE FROM tips WHERE id = $id");
header('Location: dashboard.php');
?>