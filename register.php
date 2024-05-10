<?php
include "koneksi.php";
session_start();

$register_message = " ";

if (isset($_POST["register"])) {
    $no = $_POST["no"];
    $nama = $_POST["nama"];
    $warna = $_POST["warna"];
    $jumlah = $_POST["jumlah"];

    try {
        $sql = "INSERT INTO data_barang (no, nama,warna,jumlah) VALUES (?, ?, ?, ?)";
        $stmt = $connect->prepare($sql);
        $stmt->bind_param("ssss", $no, $nama, $warna, $jumlah);

        if ($stmt->execute()) {
            $register_message = "Barang Telah Ditambahkan.";
        } else {
            $register_message = "Barang Gagal Ditambahkan.";
        }
    } catch (mysqli_sql_exception $e) {
        $register_message = "Proses Gagal! Coba Ulangi Lagi!: " . $e->getMessage();
    }

    $connect->close();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Barang</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-image: url('background1.jpg'); 
            background-size: cover;
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 550px;
            margin: 30px auto;
            padding: 20px;
            background-color: rgb(195,192,192, 0.7);
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        h3 {
            text-align: center;
            font-size: 1.5em;
            color: rgb (0, 0, 0, 0.1);
            margin: 15px;
        }

        label {
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
            text-align: center; 
        }

        form {
            display: flex;
            flex-direction: column;
        }

        .form-group {
         margin-bottom: 15px;
         text-align: center;
        }

        input, select {
            width: 470px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            
        }

        .register-message {
            text-align: center;
            margin-top: 15px;
            font-size: 1em;
            color:rgb(2,0,108);
        }

        .button {
            font-size: 15px;
            padding: 10px;
            text-decoration: none;
            background-color: #6a0dad;
            color: #ececec;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        
        .button:hover {
            background-color: #496989; 
        }
        
        .button2 {
            font-size: 13px;
            padding: 5px;
            text-decoration: none;
            background-color: #4e0887;
            color: black;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .button2:hover {
            background-color: #58A399;
        }

        .button-row {
            display: flex;
            justify-content: space-between; 
            margin-top: 5px;
        }

        .button-row .button {
            max-width: 200px;
            padding: 10px;
        }
    </style>
</head>
<body>
    <?php include "header.html"; ?>

    <div class="container">
        <h3>Masukkan Data Barang</h3>

        <div class="register-message">
            <?= $register_message ?>
            <?php if ($register_message === "Barang Berhasil Ditambahkan.") : ?> <!-- Konsistensi string -->
                <a href="tampilkan.php" class="button">Lihat Data</a>
            <?php endif; ?>
        </div>

        <!-- Form Registrasi -->
        <form action="register.php" method="POST">
            <div class="form-group">
                <label for="no">Nomor</label>
                <input type="text" id="no" name="no" placeholder="Masukkan Nomor Barang" required>
            </div>
        
            <div class="form-group">
                <label for="nama">Nama Barang</label>
                <input type="text" id="nama" name="nama" placeholder="Masukkan Nama Barang" required>
            </div>

            <div class="form-group">
                <label for="warna">Warna Barang</label>
                <input type="text" id="warna" name="warna" placeholder="Masukkan Warna Barang" required>
            </div>

            <div class="form-group">
                <label for="jumlah">Jumlah Barang </label>
                <input type="text" id="jumlah" name="jumlah" placeholder="Masukkan Jumlah Barang" required>
            </div>
        <!-- Button -->
        <div class="button-row"> 
                <a href="index.php" class="button">Kembali ke Beranda</a> 
                <button type="submit" name="register" class="button" style="font-size: 15px; border-radius: 5px; border:1px solid white; border-color:none; text-decoration: none; transition: background-color 0.3s;">Simpan Data</button>

            </div>
        </form>

    </div>

    <?php include "footer.html"; ?>
</body>
</html>