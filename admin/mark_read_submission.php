<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}
require '../includes/config.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $conn->query("UPDATE contact_submissions SET is_read = 1 WHERE id = $id");
}
header('Location: dashboard.php');
exit;
?>
