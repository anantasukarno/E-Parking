<?php
include 'koneksi.php';
if (isset($_POST['submit'])) {
    ini_set('date.timezone', 'Asia/Tokyo');
    $waktu_masuk = date("Y-m-d H:i:s");
    $id_jenis = $_POST["jenis_kendaraan"];
    $merk = $_POST["merk"];
    $tipe = $_POST["tipe"];
    $nomor_polisi = $_POST["nomor_polisi"];
    $keterangan = 'Masuk';

    $rand = rand();
    $ekstensi =  array('png', 'jpg', 'jpeg', 'gif');
    $filename = $_FILES['gambar']['name'];
    $ukuran = $_FILES['gambar']['size'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);

    if (!in_array($ext, $ekstensi)) {
        header("location:index.php?alert=gagal_ekstensi");
    } else {
        if ($ukuran < 1044070) {
            $xx = $rand . '_' . $filename;
            move_uploaded_file($_FILES['gambar']['tmp_name'], 'img/foto_kendaraan/' . $rand . '_' . $filename);
            $sql = "INSERT INTO kendaraan
            (id_kendaraan, id_jenis, merk, tipe, nomor_polisi, waktu_masuk, waktu_keluar, harga, keterangan, gambar)
            VALUES
            ('', '$id_jenis', '$merk', '$tipe', '$nomor_polisi','$waktu_masuk', '', '', '$keterangan', '$xx')";

            mysqli_query($koneksi, $sql);
            header("location:masuk.php?alert=berhasil");
        } else {
            header("location:masuk.php?alert=gagal_ukuran");
        }
    }

    // $query = "INSERT INTO kendaraan VALUES ('','$id_jenis','$merk','$tipe','$nomor_polisi','$waktu_masuk','','','$keterangan')";
    // mysqli_query($koneksi, $query);
    // if (mysqli_affected_rows($koneksi) > 0) {
    //     echo '<script>
    //     alert("Data Berhasil Ditambahkan");
    //     </script>';
    //     header("Location: masuk.php");
    // }
}
