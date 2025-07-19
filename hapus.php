<?php
session_start();
$conn = new mysqli("localhost", "root", "", "travel_wishlist");

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$id = $_GET['id'];
$user_id = $_SESSION['user_id'];

// Hapus hanya jika milik sendiri
$conn->query("DELETE FROM wishlist WHERE id = $id AND user_id = $user_id");
header("Location: dashboard.php");
exit;
?>
