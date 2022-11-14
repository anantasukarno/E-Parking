<?php
// Require composer autoload
require_once __DIR__ . '/vendor/autoload.php';
// Create an instance of the class:
$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => [128, 48]]);
include 'koneksi.php';
$id = $_GET['id'];
ob_start(); ?>
<html>

<head>
    <title>Cetak PDF</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <style>
        @page {
            margin: 0;
        }
    </style>
</head>

<body>
    <?php
    // Load file koneksi.php
    include "koneksi.php";
    $waktu = mysqli_query($koneksi, "SELECT waktu_masuk, waktu_keluar FROM kendaraan WHERE id_kendaraan ='$id'");
    $waktu_masuk = mysqli_fetch_assoc($waktu);
    $rumus = ceil((strtotime($waktu_masuk['waktu_keluar']) - strtotime($waktu_masuk['waktu_masuk'])) / 3600);
    $query = "SELECT * FROM kendaraan INNER JOIN jenis_kendaraan ON kendaraan.id_jenis = jenis_kendaraan.id_jenis WHERE id_kendaraan = '$id'"; // Tampilkan semua data gambar
    $sql = mysqli_query($koneksi, $query); // Eksekusi/Jalankan query dari variabel $query
    $row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql
    $data = mysqli_fetch_array($sql);
    $bayar = $data['bayar'];
    $harga = $rumus * $bayar;
    ?>
    <div class="pembungkus">
        <div class="card">
            <h4 class="card-header">Pembayaran Parkir</h4>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <td rowspan="5"><img src="img/foto_kendaraan/<?php echo $data['gambar']; ?>" width="150px" alt=""></td>
                        <th>Nomor Polisi</th>
                        <td><?php echo $data['nomor_polisi']; ?></td>

                    </tr>
                    <tr>
                        <th>Jenis Kendaraan</th>
                        <td><?php echo $data['jenis_kendaraan']; ?></td>
                    </tr>
                    <tr>
                        <th>Waktu Keluar</th>
                        <td><?php echo $data['waktu_keluar']; ?></td>
                    </tr>
                    <tr>
                        <th>Lama Parkir</th>
                        <td><?php echo $rumus . " Jam"; ?></td>
                    </tr>
                    <tr>
                        <th>Total Bayar</th>
                        <td><?php echo "Rp " . $harga ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

</body>

</html>
<?php
$html = ob_get_contents();
ob_end_clean();

$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output();
$db1->close();
?>