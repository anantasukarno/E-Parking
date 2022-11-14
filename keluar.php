<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
}
include 'koneksi.php';
include 'navbar.php';
?>

<div class="pembungkus">
    <div class="card">
        <h3 class="card-header bg-success text-light">Kendaraan Keluar</h3>
        <?php
        $no = 1;
        $masuk = "SELECT * FROM `kendaraan` INNER JOIN  jenis_kendaraan ON kendaraan.id_jenis = jenis_kendaraan.id_jenis WHERE keterangan = 'Masuk' ORDER BY waktu_masuk DESC, keterangan ASC";
        $query = mysqli_query($koneksi, $masuk);
        if (mysqli_num_rows($query) > 0) {

        ?>
            <div class="container p-3">
                <table class="table table-responsive table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class="text-center">NO</th>
                            <th class="text-center">JENIS KENDARAAN</th>
                            <th class="text-center">MERK KENDARAAN</th>
                            <th class="text-center">TIPE KENDARAAN</th>
                            <th class="text-center">NOMOR POLISI</th>
                            <th class="text-center">WAKTU MASUK</th>
                            <th class="text-center">KETERANGAN</th>
                            <th class="text-center">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        while ($data = mysqli_fetch_array($query)) {
                        ?>
                            <tr>
                                <td class="text-center"><?php echo $no ?></td>
                                <td><?php echo $data['jenis_kendaraan']; ?></td>
                                <td><?php echo $data['merk']; ?></td>
                                <td><?php echo $data['tipe']; ?></td>
                                <td><?php echo $data['nomor_polisi']; ?></td>
                                <td><?php echo $data['waktu_masuk']; ?></td>
                                <td class="text-center"><?php echo $data['keterangan']; ?></td>
                                <td class="text-center">
                                    <script type="text/javascript">
                                        $(document).ready(function() {
                                            $(".perbesar").fancybox();
                                        });
                                    </script>

                                    <a href="img/foto_kendaraan/<?php echo $data['gambar']; ?>" class="btn btn-primary btn-sm perbesar">Foto</a>
                                    <?php ini_set('date.timezone', 'Asia/Tokyo'); ?>
                                    <a href='keluar_action.php?id=<?= $data["id_kendaraan"] ?>&bayar=<?= $data["bayar"] ?>&waktu=<?= date("Y-m-d H:i:s") ?>&no_polisi=<?= $data["nomor_polisi"] ?>&merk=<?= $data["merk"] ?>&tipe=<?= $data["tipe"] ?>' class="btn btn-sm btn-success">Keluar</a>
                                </td>
                            </tr>

                    <?php $no++;
                        }
                    } ?>
                    </tbody>
                </table>
                <?php
                if (mysqli_num_rows($query) == 0) {
                ?>
                    <div class="col text-center mt-5 mb-5">
                        <i class="fa fa-sad-tear fa-3x mt-3"></i>
                        <h2 class="mt-3">Tidak ada kendaraan dalam parkiran</h2>
                    </div>
                <?php } ?>
            </div>
    </div>
</div>