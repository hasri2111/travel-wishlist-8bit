<!-- Ini adalah index.php sebagai tampilan awal -->
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Travel Wishlist 8 BIT</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        body {
            background: linear-gradient(to right, #fbc2eb, #a6c1ee);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 20px;
        }
        h1 {
            font-size: 2.5rem;
            margin-bottom: 20px;
            color: #2d3142;
        }
        .photo-container {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 15px;
            max-width: 600px;
            margin-bottom: 30px;
        }
        .photo-container img {
            width: 100%;
            border-radius: 16px;
            object-fit: cover;
            height: 120px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .login-button {
            background-color: #4ecca3;
            color: white;
            padding: 12px 24px;
            border: none;
            border-radius: 12px;
            font-size: 16px;
            cursor: pointer;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }
        .login-button:hover {
            background-color: #3bb894;
        }
    </style>
</head>
<body>
    <h1>Welcome to 8 BIT's Travel Memories</h1>
    <div class="photo-container">
        <img src="img/users/Hasri.jpg" alt="Hasri">
        <img src="img/users/hasni.jpg" alt="Hasni">
        <img src="img/users/Sukmayani.jpg" alt="Sukmayani">
        <img src="img/users/Rifqa.jpg" alt="Rifqa"> 
        <img src="img/users/zul.jpg" alt="Zul">
        <img src="img/users/Hairan.jpg" alt="Hairan">
        <img src="img/users/Ade.jpg" alt="Ade">
        <img src="img/users/Riswan.jpg" alt="Riswan">
        
    </div>
    <a class="login-button" href="login.php">Login</a>
</body>
</html>
