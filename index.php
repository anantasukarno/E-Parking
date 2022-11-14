<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
}
include 'navbar.php';
include 'koneksi.php';
$sql = "SELECT * FROM  jenis_kendaraan";
$query_jenis = mysqli_query($koneksi, $sql);
$rows = mysqli_num_rows($query_jenis);
$jumlahDataPerHalaman = 3;
$sql = "SELECT * FROM kendaraan WHERE keterangan='Masuk'";
$query = mysqli_query($koneksi, $sql);
$jumlahData = mysqli_num_rows($query);
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
$halamanAktif = (isset($_GET['halaman'])) ? $_GET['halaman'] : 1;
$awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;
$sql = "SELECT * FROM kendaraan INNER JOIN jenis_kendaraan ON kendaraan.id_jenis = jenis_kendaraan.id_jenis WHERE kendaraan.keterangan = 'Masuk' LIMIT $awalData, $jumlahDataPerHalaman";

?>


<div class="pembungkus">
    <div class="container p-3 mt-4 shadow">
        <h5>Hi, <?php echo $_SESSION['nama'] ?></h5>
        <div class="row mt-4">
            <div class="col-lg-3 col-sm-12 mt-3">
                <div class="card text-center ">
                    <h5 class="card-header bg-success text-light">Total Kendaraan</h5>
                    <?php
                    $total = "SELECT * FROM kendaraan WHERE keterangan='Masuk'";
                    $total_kendaraan = mysqli_query($koneksi, $total);
                    $result = mysqli_num_rows($total_kendaraan);
                    ?>
                    <h3 class=""><?php echo $result; ?></h3>
                </div>
            </div>
            <?php
            while ($data = mysqli_fetch_array($query_jenis)) {
                $jenis_kendaraan = $data['jenis_kendaraan'];
            ?>

                <div class="col-lg-<?php echo 9 / $rows ?> col-sm-12 mt-3">
                    <div class="card text-center ">
                        <h5 class="card-header bg-success text-light">Jumlah <?php echo $data['jenis_kendaraan'] ?></h5>
                        <?php
                        $kendaraan = "SELECT * FROM kendaraan INNER JOIN jenis_kendaraan ON kendaraan.id_jenis = jenis_kendaraan.id_jenis WHERE kendaraan.keterangan='Masuk' AND jenis_kendaraan.jenis_kendaraan= '$jenis_kendaraan'";
                        $hitung = mysqli_query($koneksi, $kendaraan);
                        $jumlah_kendaraan = mysqli_num_rows($hitung);
                        ?>
                        <h3 class=""><?php echo $jumlah_kendaraan; ?></h3>
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="row mt-3">
            <div class="col">
                <div class="card">
                    <h6 class="card-header bg-success text-light">Data Kendaraan Dalam Parkiran</h6>
                    <?php
                    $no = (($halamanAktif - 1) * $jumlahDataPerHalaman) + 1;
                    // $sql = "SELECT * FROM kendaraan INNER JOIN jenis_kendaraan ON kendaraan.id_jenis = jenis_kendaraan.id_jenis WHERE kendaraan.keterangan = 'Masuk'";
                    $query = mysqli_query($koneksi, $sql);
                    if (mysqli_num_rows($query) > 0) {
                    ?>
                        <div class="container p-3">
                            <table class="table table-responsive table-striped table-bordered">
                                <thead>
                                    <th class="text-center">NO</th>
                                    <th class="text-center">JENIS KENDARAAN</th>
                                    <th class="text-center">MERK KENDARAAN</th>
                                    <th class="text-center">TIPE KENDARAAN</th>
                                    <th class="text-center">NOMOR POLISI</th>
                                    <th class="text-center">WAKTU MASUK</th>
                                    <th class="text-center">KETERANGAN</th>
                                    <th class="text-center">FOTO</th>
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
                                            <script type="text/javascript">
                                                $(document).ready(function() {
                                                    $(".perbesar").fancybox();
                                                });
                                            </script>

                                            <td><a href="img/foto_kendaraan/<?php echo $data['gambar']; ?>" class="btn btn-primary btn-sm perbesar">Foto</a></td>

                                        </tr>
                                <?php $no++;
                                    }
                                }    ?>
                                </tbody>
                            </table>
                        </div>
                        <?php if (mysqli_num_rows($query) == 0) { ?>
                            <div class="col text-center mt-5 mb-5">
                                <i class="fa fa-sad-tear fa-3x mt-3"></i>
                                <h2 class="mt-3">Tidak ada kendaraan dalam parkiran</h2>
                            </div>
                        <?php
                        } ?>

                </div>
            </div>
        </div>
        <nav aria-label="Page navigation example">
            <ul class="pagination mt-3">
                <?php if ($halamanAktif > 1) { ?>
                    <li class="page-item"><a class="page-link" href="?halaman=<?php echo $halamanAktif - 1; ?>">Previous</a></li>
                <?php } ?>
                <?php for ($i = 1; $i <= $jumlahHalaman; $i++) { ?>
                    <li class="page-item"><a class="page-link" href="?halaman=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                <?php } ?>
                <?php if ($halamanAktif < $jumlahHalaman) { ?>
                    <li class="page-item"><a class="page-link" href="?halaman=<?php echo $halamanAktif + 1; ?>">Next</a></li>
                <?php } ?>
            </ul>
        </nav>
    </div>
</div>