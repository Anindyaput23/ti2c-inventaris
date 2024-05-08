<?php
include 'koneksi.php';

// Pastikan data telah dikirimkan melalui metode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Ambil nilai dari form
  $no = $_POST['no'];
  $nama_merek = $_POST['nama_merek'];
  $warna = $_POST['warna'];
  $jumlah = $_POST['jumlah'];

  // Query untuk menyimpan data ke database
  $query = "INSERT INTO barang (no, nama_merek, warna, jumlah) VALUES ('$no', '$nama_merek', '$warna', '$jumlah')";

  if ($connect->query($query) === TRUE) {
    echo "Data berhasil disimpan.";
  } else {
    echo "Terjadi kesalahan: " . $query . "<br>" . $connect->error;
  }

  $connect->close();
} else {
  // Jika tidak menggunakan metode POST, maka kembali ke halaman sebelumnya
  header("Location: data_barang.php");
  exit();
}
?>
