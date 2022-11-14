<?php
include 'navbar.php';
include 'koneksi.php';
include 'keluar_action.php';
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
}
?>

<div class="pembungkus">
    <div class="card">
        <h4 class="card-header">Pembayaran Parkir</h4>
        <div class="card-body">
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
            <center><a href="laporan.php" class="btn btn-success">Detail</a></center>
        </div>
    </div>
</div>