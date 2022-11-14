<?php
include 'koneksi.php';
if (isset($_POST['edit_jenis'])) {
    $id = $_POST['id'];
    $jenis = $_POST['jenis'];
    $bayar = $_POST['biaya'];

    $sql = "UPDATE jenis_kendaraan SET jenis_kendaraan='$jenis', bayar='$bayar' WHERE id_jenis = '$id'";
    $query = mysqli_query($koneksi, $sql);

    header("Location: jenis_kendaraan.php");
}
