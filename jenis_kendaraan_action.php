<?php
include 'koneksi.php';
$jenis = $_POST['jenis'];
$bayar = $_POST['biaya'];
$sql = "INSERT INTO jenis_kendaraan (id_jenis, jenis_kendaraan, status, bayar) VALUES ('','$jenis','on', '$bayar')";
$query = mysqli_query($koneksi, $sql);

header("Location: jenis_kendaraan.php");
