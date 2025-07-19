<?php
session_start();
include 'koneksi.php';

// Cek apakah sudah login
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

// Ambil data wishlist dari database
$query = $koneksi->query("SELECT * FROM wishlist ORDER BY tanggal DESC");
$wishlists = $query->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - Travel Wishlist 8 BIT</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f0f4f8;
            margin: 0;
            padding: 0;
        }
        .header {
            background: linear-gradient(to right, #0f2027, #203a43, #2c5364);
            color: white;
            text-align: center;
            padding: 30px 0;
        }
        .header h1 {
            margin: 0;
        }
        .top-buttons {
            margin: 20px auto;
            text-align: center;
        }
        .top-buttons a {
            background: #3498db;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            margin: 0 5px;
            border-radius: 8px;
            transition: 0.3s;
        }
        .top-buttons a.logout {
            background: #e74c3c;
        }
        .top-buttons a:hover {
            opacity: 0.9;
        }
        .container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
            padding: 30px;
        }
        .card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            overflow: hidden;
            transition: transform 0.3s;
        }
        .card:hover {
            transform: translateY(-5px);
        }
        .card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        .card-body {
            padding: 15px;
        }
        .card-body h3 {
            margin: 0 0 10px;
            font-size: 20px;
            color: #333;
        }
        .card-body p {
            margin: 5px 0;
            color: #666;
        }
        .stars {
            color: gold;
            font-size: 18px;
        }
        .card-actions {
            display: flex;
            justify-content: space-between;
            padding: 10px 15px 15px;
        }
        .card-actions a {
            text-decoration: none;
            padding: 8px 15px;
            border-radius: 6px;
            color: white;
        }
        .card-actions .edit {
            background: #f39c12;
        }
        .card-actions .hapus {
            background: #c0392b;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Welcome to 8 BIT's Travel Memories</h1>
    </div>

    <div class="top-buttons">
        <a href="tambah.php">+ Add Destination </a>
        <a href="logout.php" class="logout">Logout</a>
    </div>

    <div class="container">
        <?php foreach ($wishlists as $row): ?>
        <div class="card">
            <img src="img/wishlist/<?= htmlspecialchars($row['foto']) ?>" alt="Foto Wisata" style="width:100%; height:180px; object-fit:cover; border-top-left-radius:10px; border-top-right-radius:10px;">
            <div class="card-body">
                <h3><?= htmlspecialchars($row['nama_wisata']) ?></h3>
                <p><strong>Kota:</strong> <?= htmlspecialchars($row['kota']) ?></p>
                <p><strong>Tanggal:</strong> <?= htmlspecialchars($row['tanggal']) ?></p>
                <p class="stars">
                    <?php for ($i = 1; $i <= 5; $i++): ?>
                        <?= $i <= $row['rating'] ? '★' : '☆' ?>
                    <?php endfor; ?>
                </p>
                <p><?= htmlspecialchars($row['deskripsi']) ?></p>
            </div>
            <div class="card-actions">
                <a href="edit.php?id=<?= $row['id'] ?>" class="edit">Edit</a>
                <a href="hapus.php?id=<?= $row['id'] ?>" class="hapus" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
