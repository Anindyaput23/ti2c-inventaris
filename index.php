<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome! | Selamat Datang!</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f3f3f3;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            padding: 40px;
            text-align: center;
            border-radius: 10px;
            background-color: #fff;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        h2 {
            margin-bottom: 20px;
            color: #333;
        }

        p {
            margin-bottom: 30px;
            color: #666;
        }

        .button {
            display: inline-block;
            padding: 12px 24px;
            font-size: 16px;
            text-align: center;
            text-decoration: none;
            color: #fff;
            background-color: #4caf50;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Welcome! | Selamat Datang!</h2>
        <p>Please choose an option below:</p>
        <a href="register.php" class="button">Add Data | Tambah Data</a>
        <a href="tampilkan.php" class="button">View Data | Lihat Data</a>
    </div>
</body>
</html>