<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
}
include 'navbar.php';
include 'koneksi.php';
?>

<div class="pembungkus">
    <div class="card">
        <form action="masuk_action.php" method="post" enctype="multipart/form-data">
            <h3 class="card-header bg-success text-light">Kendaraan Masuk</h3>
            <div class="container">
                <div class="form-group mt-3">
                    <label for="jenis_kendaraan" class="form-label">Jenis Kendaraan</label>
                    <select name="jenis_kendaraan" id="jenis_kendaraan" class="form-control">
                        <?php $query = mysqli_query($koneksi, "SELECT id_jenis, jenis_kendaraan FROM jenis_kendaraan ORDER BY jenis_kendaraan ASC"); ?>
                        <?php while ($row = mysqli_fetch_assoc($query)) : ?>
                            <?php if ($jenis_id == $row["id_jenis"]) : ?>
                                <option value="<?= $row['id_jenis']; ?>" selected="true"><?= $row["jenis_kendaraan"]; ?></option>
                            <?php else : ?>
                                <option value="<?= $row['id_jenis']; ?>"><?= $row["jenis_kendaraan"]; ?></option>
                            <?php endif; ?>
                        <?php endwhile; ?>
                    </select>
                </div>
                <div class="form-group mt-3">
                    <label for="merk" class="form-label">Merk Kendaraan</label>
                    <input type="text" class="form-control" name="merk" placeholder="Merk Kendaraan" id="merk">
                </div>
                <div class="form-group mt-3">
                    <label for="tipe" class="form-label">Tipe Kendaraan</label>
                    <input type="text" class="form-control" name="tipe" placeholder="Tipe Kendaraan" id="tipe">
                </div>

                <div class="form-group mt-3">
                    <label for="nomor_polisi" class="form-label">Nomor Polisi</label>
                    <input type="text" class="form-control" name="nomor_polisi" placeholder="Nomor Polisi" id="nomor_polisi">
                </div>

                <div class="form-group">
                    <label for="gambar">Upload Foto</label>
                    <input type="file" class="form-control col-10" id="gambar" aria-describedby="gambar" name="gambar">
                </div>

                <button type="submit" name="submit" class="btn btn-success mt-3 mb-3"><i class="fa fa-plus"></i> Tambah</button>
            </div>
        </form>
    </div>
</div>

<div class="pembungkus">
    <div class="card">
        <h3 class="card-header bg-success text-light">Kendaraan Keluar</h3>
        <?php
        $no = 1;
        $masuk = "SELECT * FROM `kendaraan` INNER JOIN  jenis_kendaraan ON kendaraan.id_jenis = jenis_kendaraan.id_jenis WHERE keterangan = 'Masuk' ORDER BY keterangan ASC";
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
                                    <?php ini_set('date.timezone', 'Asia/Tokyo'); ?>
                                    <script type="text/javascript">
                                        $(document).ready(function() {
                                            $(".perbesar").fancybox();
                                        });
                                    </script>

                                    <a href="img/foto_kendaraan/<?php echo $data['gambar']; ?>" class="btn btn-primary btn-sm perbesar">Foto</a>
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