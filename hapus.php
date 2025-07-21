<?php
session_start();
$koneksi = new mysqli("localhost", "root", "", "travel_8bit");

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

$id = $_GET['id'];
$user_id = $_SESSION['user']['id'];

// Pastikan hanya data wishlist milik user yang sedang login yang bisa dihapus
$koneksi->query("DELETE FROM wishlist WHERE id = $id AND user_id = $user_id");

header("Location: dashboard.php");
exit;
?>
