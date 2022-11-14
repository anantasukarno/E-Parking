<?php

include 'koneksi.php';
$id = $_GET['id'];
$bayar = $_GET['bayar'];
$waktu_keluar = $_GET['waktu'];
$no_polisi = $_GET['no_polisi'];
$merk = $_GET['merk'];
$tipe = $_GET['tipe'];

$waktu = mysqli_query($koneksi, "SELECT waktu_masuk FROM kendaraan WHERE id_kendaraan ='$id'");
$waktu_masuk = mysqli_fetch_assoc($waktu);
$keterangan = 'Keluar';
$rumus = ceil((strtotime($waktu_keluar) - strtotime($waktu_masuk['waktu_masuk'])) / 3600);
$harga = $rumus * $bayar;
$query = "UPDATE kendaraan SET waktu_keluar = '$waktu_keluar', harga = '$harga', keterangan = '$keterangan' WHERE id_kendaraan = '$id'";
mysqli_query($koneksi, $query);
?>
<?php
include 'navbar.php';
?>
<div class="pembungkus">
    <div class="card">
        <h4 class="card-header">Pembayaran Parkir</h4>
        <div class="card-body">
            <a href="report.php?id=<?php echo $_GET["id"] ?>" target=" _blank" class="btn btn-primary btn-sm mt-3 mb-3">
                <i class="fa fa-print"></i>
                Cetak
            </a>
            <table class="table table-bordered ">
                <tr>
                    <th>Nomor Polisi</th>
                    <th>Merk</th>
                    <th>Tipe</th>
                    <th>Waktu Keluar</th>
                    <th>Total Waktu</th>
                    <th>Total</th>
                </tr>
                <tr>
                    <td><?= $no_polisi ?></td>
                    <td><?= $merk ?></td>
                    <td><?= $tipe ?></td>
                    <td><?= $waktu_keluar ?></td>
                    <td><?= $rumus . ' Jam' ?></td>
                    <td><?= 'Rp. ' . $harga ?></td>
                </tr>
            </table>
            <center><a href="laporan.php" class="btn btn-success btn-sm">Detail</a></center>
        </div>
    </div>
</div>