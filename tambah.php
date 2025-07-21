<?php
session_start();
$koneksi = new mysqli("localhost", "root", "", "travel_8bit");

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['user']['id'];
    $nama = $_POST['nama_wisata'];
    $kota = $_POST['kota'];
    $rating = $_POST['rating'];
    $tanggal = $_POST['tanggal'];
    $deskripsi = $_POST['deskripsi'];

    // Upload foto
    $foto = $_FILES['foto']['name'];
    $tmp = $_FILES['foto']['tmp_name'];
    move_uploaded_file($tmp, "uploads/" . $foto);

    // Simpan ke database
    $koneksi->query("INSERT INTO wishlist (user_id, nama_wisata, kota, rating, tanggal, foto, deskripsi) VALUES (
        '$user_id', '$nama', '$kota', '$rating', '$tanggal', '$foto', '$deskripsi'
    )");

    header("Location: dashboard.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Wishlist - Travel 8 BIT</title>
    <style>
        body {
            font-family: sans-serif;
            background: linear-gradient(to right, #6dd5fa, #2980b9);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .form-box {
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.3);
            width: 400px;
        }
        input, textarea, select {
            display: block;
            width: 100%;
            margin-bottom: 15px;
            padding: 10px;
            border-radius: 8px;
            border: 1px solid #ccc;
        }
        button {
            padding: 10px;
            background-color: #2980b9;
            color: white;
            border: none;
            border-radius: 8px;
            width: 100%;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="form-box">
        <h2>Tambah Wishlist</h2>
        <form method="POST" enctype="multipart/form-data">
            <input type="text" name="nama_wisata" placeholder="Nama Wisata" required />
            <input type="text" name="kota" placeholder="Kota" required />
            <select name="rating" required>
                <option value="">Pilih Rating</option>
                <option value="1">★☆☆☆☆</option>
                <option value="2">★★☆☆☆</option>
                <option value="3">★★★☆☆</option>
                <option value="4">★★★★☆</option>
                <option value="5">★★★★★</option>
            </select>
            <input type="date" name="tanggal" required />
            <input type="file" name="foto" accept="image/*" required />
            <textarea name="deskripsi" placeholder="Deskripsi wisata..." rows="4" required></textarea>
            <button type="submit">Simpan Wishlist</button>
        </form>
    </div>
</body>
</html>
