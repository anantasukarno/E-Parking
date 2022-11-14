<?php
include 'koneksi.php';
$sql = "SELECT waktu_masuk FROM kendaraan WHERE id_kendaraan=10";
$query = mysqli_query($koneksi, $sql);
$data = mysqli_fetch_array($query);

echo $data['waktu_masuk'];

$result = explode(' ', $data['waktu_masuk']);
$tanggal = $result[0];
$waktu = $result[1];
echo $tanggal;
echo $waktu;

$hasil = explode('-', $tanggal);
