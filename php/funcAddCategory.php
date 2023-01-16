<?php 
// koneksi database
include 'database.php';
 
// menangkap data yang di kirim dari form

$CategoryName = $_POST['CategoryName'];

 
// menginput data ke database
mysqli_query($conn,"INSERT INTO kategori (KategoriID, namaKategori) VALUES ('', '$CategoryName');");
 
// mengalihkan halaman kembali ke index.php
header("location:../LaporanCategory.php");
 
?>

