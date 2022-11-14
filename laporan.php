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
        <h3 class="card-header bg-success text-light">Riwayat Parkir</h3>

        <div class="container-fluid p-3">
            <form class="d-flex col-3" action="" method="post">
                <input class="form-control me-2 mb-3" type="search" placeholder="Search" aria-label="Search" name="keyword">
                <button class="btn btn-outline-success mb-3" type="submit" name="cari">Search</button>
            </form>
            <a href="laporan.php"><button type="button" class="btn btn-outline-success mb-3 <?php if (!isset($_GET['bulan'])) {
                                                                                                echo 'active';
                                                                                            } ?>">Semua</button></a>
            <a href="?bulan=01"><button type="button" class="btn btn-outline-success mb-3 <?php if ($_GET['bulan'] == '01') {
                                                                                                echo 'active';
                                                                                            } ?>">Januari</button></a>
            <a href="?bulan=02"><button type="button" class="btn btn-outline-success mb-3 <?php if ($_GET['bulan'] == '02') {
                                                                                                echo 'active';
                                                                                            } ?>">Februari</button></a>
            <a href="?bulan=03"><button type="button" class="btn btn-outline-success mb-3 <?php if ($_GET['bulan'] == '03') {
                                                                                                echo 'active';
                                                                                            } ?>">Maret</button></a>
            <a href="?bulan=04"><button type="button" class="btn btn-outline-success mb-3 <?php if ($_GET['bulan'] == '04') {
                                                                                                echo 'active';
                                                                                            } ?>">April</button></a>
            <a href="?bulan=05"><button type="button" class="btn btn-outline-success mb-3 <?php if ($_GET['bulan'] == '05') {
                                                                                                echo 'active';
                                                                                            } ?>">Mei</button></a>
            <a href="?bulan=06"><button type="button" class="btn btn-outline-success mb-3 <?php if ($_GET['bulan'] == '06') {
                                                                                                echo 'active';
                                                                                            } ?>">Juni</button></a>
            <a href="?bulan=07"><button type="button" class="btn btn-outline-success mb-3 <?php if ($_GET['bulan'] == '07') {
                                                                                                echo 'active';
                                                                                            } ?>">Juli</button></a>
            <a href="?bulan=08"><button type="button" class="btn btn-outline-success mb-3 <?php if ($_GET['bulan'] == '08') {
                                                                                                echo 'active';
                                                                                            } ?>">Agustus</button></a>
            <a href="?bulan=09"><button type="button" class="btn btn-outline-success mb-3 <?php if ($_GET['bulan'] == '09') {
                                                                                                echo 'active';
                                                                                            } ?>">September</button></a>
            <a href="?bulan=10"><button type="button" class="btn btn-outline-success mb-3 <?php if ($_GET['bulan'] == '10') {
                                                                                                echo 'active';
                                                                                            } ?>">Oktober</button></a>
            <a href="?bulan=11"><button type="button" class="btn btn-outline-success mb-3 <?php if ($_GET['bulan'] == '11') {
                                                                                                echo 'active';
                                                                                            } ?>">November</button></a>
            <a href="?bulan=12"><button type="button" class="btn btn-outline-success mb-3 <?php if ($_GET['bulan'] == '12') {
                                                                                                echo 'active';
                                                                                            } ?>">Desember</button></a>
            <?php

            $no = 1;
            $sql = "SELECT * FROM kendaraan INNER JOIN jenis_kendaraan ON kendaraan.id_jenis = jenis_kendaraan.id_jenis ORDER BY keterangan ASC";
            if (isset($_GET['bulan'])) {
                $bulan = $_GET['bulan'];
                $sql = "SELECT * FROM kendaraan INNER JOIN jenis_kendaraan ON kendaraan.id_jenis = jenis_kendaraan.id_jenis WHERE MONTH(kendaraan.waktu_masuk)='$bulan' ORDER BY keterangan ASC";
            }

            if (isset($_POST['cari'])) {
                $keyword = $_POST['keyword'];
                $sql = "SELECT * FROM kendaraan INNER JOIN jenis_kendaraan ON kendaraan.id_jenis = jenis_kendaraan.id_jenis WHERE
    jenis_kendaraan.jenis_kendaraan LIKE '%$keyword%' OR
    kendaraan.merk LIKE '%$keyword%' OR 
    kendaraan.tipe LIKE '%$keyword%' OR 
    kendaraan.nomor_polisi LIKE '%$keyword%' OR 
    kendaraan.waktu_masuk LIKE '%$keyword%' OR 
    kendaraan.waktu_keluar LIKE '%$keyword%' OR 
    kendaraan.keterangan LIKE '%$keyword%' 
    ORDER BY keterangan ASC";
            }
            $query = mysqli_query($koneksi, $sql);
            if (mysqli_num_rows($query) > 0) :
            ?>
                <h5>Jumlah kendaraan: <?php echo mysqli_num_rows($query); ?></h5>
                <table class="table table-bordered table-responsive table-hover table-striped">
                    <thead>
                        <th class="text-center">NO</th>
                        <th class="text-center">JENIS KENDARAAN</th>
                        <th class="text-center">MERK KENDARAAN</th>
                        <th class="text-center">TIPE KENDARAAN</th>
                        <th class="text-center">NOMOR POLISI</th>
                        <th class="text-center">WAKTU MASUK</th>
                        <th class="text-center">WAKTU KELUAR</th>
                        <th class="text-center">HARGA</th>
                        <th class="text-center">KETERANGAN</th>
                        <th class="text-center">FOTO</th>
                    </thead>
                    <tbody>
                        <?php
                        while ($data = mysqli_fetch_assoc($query)) {
                        ?>
                            <tr>
                                <td class="text-center"><?php echo $no ?></td>
                                <td><?php echo $data['jenis_kendaraan'] ?></td>
                                <td><?php echo $data['merk'] ?></td>
                                <td><?php echo $data['tipe'] ?></td>
                                <td><?php echo $data['nomor_polisi'] ?></td>
                                <td class="text-center"><?php echo $data['waktu_masuk'] ?></td>
                                <td class="text-center">
                                    <?php if ($data['waktu_keluar'] != '0000-00-00 00:00:00') {
                                        echo $data['waktu_keluar'];
                                    } else {
                                        echo '-';
                                    } ?>
                                </td>

                                <?php if ($data['harga'] != '0') {
                                    echo "<td> Rp " . $data['harga'] . "</td>";
                                } else {
                                    echo "<td class='text-center'>-</td>";
                                } ?>

                                <td class="text-center"><?php echo $data['keterangan'] ?></td>
                                <script type="text/javascript">
                                    $(document).ready(function() {
                                        $(".perbesar").fancybox();
                                    });
                                </script>

                                <td><a href="img/foto_kendaraan/<?php echo $data['gambar']; ?>" class="btn btn-primary btn-sm perbesar">Foto</a></td>
                            </tr>
                    <?php $no++;
                        }
                    endif;
                    ?>
                    </tbody>
                </table>
                <?php
                if (mysqli_num_rows($query) == 0) { ?>
                    <div class="col text-center mt-5 mb-5">
                        <i class="fa fa-sad-tear fa-3x mt-3"></i>
                        <h2 class="mt-3">Data tidak tersedia</h2>
                    </div>

                <?php } ?>
        </div>
    </div>
</div>