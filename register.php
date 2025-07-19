<?php
include 'koneksi.php';
session_start();

$error = '';

if (isset($_POST['register'])) {
    $username = trim($_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $check = $koneksi->query("SELECT * FROM users WHERE username='$username'");
    if ($check->num_rows > 0) {
        $error = "Username sudah terdaftar!";
    } else {
        $simpan = $koneksi->query("INSERT INTO users (username, password) VALUES ('$username', '$password')");
        if ($simpan) {
            header("Location: login.php");
            exit;
        } else {
            $error = "Gagal mendaftar. Silakan coba lagi.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar - Travel Wishlist 8 BIT</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(to right, #f9d423, #ff4e50);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .register-box {
            background: white;
            padding: 30px;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            width: 360px;
            text-align: center;
        }
        .register-box h2 {
            margin-bottom: 20px;
            color: #333;
        }
        .register-box input {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 8px;
        }
        .register-box button {
            background: #e67e22;
            color: white;
            border: none;
            padding: 12px;
            width: 100%;
            border-radius: 10px;
            font-weight: bold;
            cursor: pointer;
        }
        .register-box .error {
            color: red;
            margin-bottom: 10px;
        }
        .register-box a {
            display: block;
            margin-top: 10px;
            color: #e67e22;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="register-box">
        <h2>Daftar Akun 8 BIT</h2>
        <?php if ($error): ?>
            <div class="error"><?= $error ?></div>
        <?php endif; ?>
        <form method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" name="register">Daftar</button>
        </form>
        <a href="login.php">Sudah punya akun? Login</a>
    </div>
</body>
</html>
