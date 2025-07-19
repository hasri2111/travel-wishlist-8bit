<?php
include 'koneksi.php';

$id = $_GET['id'];
$query = $koneksi->query("SELECT * FROM wishlist WHERE id=$id");
$data = $query->fetch_assoc();

if (isset($_POST['update'])) {
    $nama_wisata = $_POST['nama'];
    $kota = $_POST['kota'];
    $rating = $_POST['rating'];
    $tanggal = $_POST['tanggal'];
    $deskripsi = $_POST['deskripsi'];

    // Cek apakah ada file gambar baru diunggah
    if ($_FILES['foto']['name']) {
        $foto = $_FILES['foto']['name'];
        $tmp = $_FILES['foto']['tmp_name'];
        $path = "img/wishlist/" . $foto;
        move_uploaded_file($tmp, $path);

        // Update dengan foto baru
        $koneksi->query("UPDATE wishlist SET 
            nama_wisata='$nama_wisata',
            kota='$kota',
            rating='$rating',
            tanggal='$tanggal',
            deskripsi='$deskripsi',
            foto='$foto' 
            WHERE id=$id
        ");
    } else {
        // Update tanpa mengubah foto
        $koneksi->query("UPDATE wishlist SET 
            nama_wisata='$nama_wisata',
            kota='$kota',
            rating='$rating',
            tanggal='$tanggal',
            deskripsi='$deskripsi'
            WHERE id=$id
        ");
    }

    header("Location: dashboard.php");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Wishlist</title>
    <style>
        body {
            font-family: sans-serif;
            background: linear-gradient(to right, #1d4350, #a43931);
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
            box-shadow: 0 4px 10px rgba(0,0,0,0.3);
        }
        .form-box h2 {
            margin-bottom: 20px;
            text-align: center;
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
            background: #27ae60;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            cursor: pointer;
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="form-box">
        <h2>Edit Wishlist</h2>
        <form method="POST" enctype="multipart/form-data">
            <input type="text" name="nama" value="<?= $data['nama_wisata'] ?>" required placeholder="Nama Wisata"><br>
            <input type="text" name="kota" value="<?= $data['kota'] ?>" required placeholder="Kota"><br>
            <select name="rating" required>
                <option value="">Pilih Rating</option>
                <?php
                for ($i = 1; $i <= 5; $i++) {
                    $selected = $data['rating'] == $i ? 'selected' : '';
                    echo "<option value='$i' $selected>$i</option>";
                }
                ?>
            </select><br>
            <input type="date" name="tanggal" value="<?= $data['tanggal'] ?>" required><br>
            <textarea name="deskripsi" rows="4" placeholder="Deskripsi"><?= $data['deskripsi'] ?></textarea><br>
            <label>Ganti Foto (opsional):</label>
            <input type="file" name="foto"><br><br>
            <button type="submit" name="update">Simpan Perubahan</button>
        </form>
    </div>
</body>
</html>
