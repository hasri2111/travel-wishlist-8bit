<?php
include 'koneksi.php';

if (isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $kota = $_POST['kota'];
    $rating = $_POST['rating'];
    $tanggal = $_POST['tanggal'];
    $deskripsi = $_POST['deskripsi'];

    $foto = $_FILES['foto']['name'];
    $tmp = $_FILES['foto']['tmp_name'];
    $path = "img/wishlist/" . $foto;
    move_uploaded_file($tmp, $path);

    $koneksi->query("INSERT INTO wishlist (nama_wisata, kota, rating, tanggal, deskripsi, foto) VALUES (
        '$nama', '$kota', '$rating', '$tanggal', '$deskripsi', '$foto')");

    header("Location: dashboard.php");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Wishlist</title>
    <style>
        body {
            font-family: sans-serif;
            background: linear-gradient(to right, #6dd5ed, #2193b0);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .form-box {
            background: #fff;
            padding: 30px;
            border-radius: 15px;
            width: 400px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.3);
        }
        .form-box h2 {
            text-align: center;
            margin-bottom: 25px;
            color: #333;
        }
        .form-box input,
        .form-box textarea,
        .form-box select {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 8px;
        }
        .form-box button {
            background: #2980b9;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            cursor: pointer;
            width: 100%;
        }
        .form-box button:hover {
            background: #1c5980;
        }
    </style>
</head>
<body>
    <div class="form-box">
        <h2>Add Destination </h2>
        <form method="POST" enctype="multipart/form-data">
            <input type="text" name="nama" placeholder="Nama Wisata" required><br>
            <input type="text" name="kota" placeholder="Kota" required><br>
            <select name="rating" required>
                <option value="">Pilih Rating</option>
                <option value="1">1 Bintang</option>
                <option value="2">2 Bintang</option>
                <option value="3">3 Bintang</option>
                <option value="4">4 Bintang</option>
                <option value="5">5 Bintang</option>
            </select><br>
            <input type="date" name="tanggal" required><br>
            <textarea name="deskripsi" rows="4" placeholder="Deskripsi" required></textarea><br>
            <input type="file" name="foto" required><br><br>
            <button type="submit" name="simpan">Simpan</button>
        </form>
    </div>
</body>
</html>
