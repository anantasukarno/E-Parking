<?php
include 'koneksi.php';
$id = $_GET['id'];
$sql = "DELETE FROM jenis_kendaraan WHERE id_jenis='$id'";
$query = mysqli_query($koneksi, $sql);

header("Location: jenis_kendaraan.php");
