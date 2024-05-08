<?php
include("koneksi.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Data Barang</title>
  <style>
    body {
      font-family: sans-serif;
    }

    table {
      border-collapse: collapse;
      width: 100%;
    }

    th, td {
      text-align: left;
      padding: 8px;
      border: 1px solid #ddd;
    }

    .form-group {
      margin-bottom: 15px;
    }

    .form-label {
      display: block;
      margin-bottom: 5px;
    }

    .form-input {
      width: 100%;
      padding: 8px;
      border: 1px solid #ddd;
    }

    .button {
      background-color: #4CAF50;
      color: white;
      padding: 12px 20px;
      border: none;
      cursor: pointer;
    }

    .button:hover {
      background-color: #45a049;
    }
  </style>
</head>
<body>
  <h1>Tambah Data Barang</h1>

  <form action="data_barang" method="post">
    <div class="form-group">
      <label class="form-label" for="no">No:</label>
      <input type="text" class="form-input" id="no" name="no" required>
    </div>

    <div class="form-group">
      <label class="form-label" for="nama_merek">Nama Merek:</label>
      <input type="text" class="form-input" id="nama_merek" name="nama_merek" required>
    </div>

    <div class="form-group">
      <label class="form-label" for="warna">Warna:</label>
      <input type="text" class="form-input" id="warna" name="warna" required>
    </div>

    <div class="form-group">
      <label class="form-label" for="jumlah">Jumlah:</label>
      <input type="number" class="form-input" id="jumlah" name="jumlah" required>
    </div>

    <button type="submit" class="button">Simpan</button>
  </form>

  <h2>Daftar Barang</h2>

  <table>
    <thead>
      <tr>
        <th>No</th>
        <th>Nama Merek</th>
        <th>Warna</th>
        <th>Jumlah</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $sql = "SELECT * FROM barang"; // Ensure table 'barang' exists

      $result = $connect->query($sql);

      if ($result) { // Check if query execution was successful
        if ($result->num_rows > 0) {
          while ($barang = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $barang['no'] . "</td>"; // Nomor urut
            echo "<td>" . $barang['nama_merek'] . "</td>";
            echo "<td>" . $barang['warna'] . "</td>";
            echo "<td>" . $barang['jumlah'] . "</td>";
            echo "</tr>";
          }
        } else {
          echo "<tr><td colspan='4'>Tidak ada data barang</td></tr>";
        }
      } else {
        echo "<tr><td colspan='4'>Error: " . $connect->error;
      }