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

                <div class="form-group mt-3">
                    <label for="gambar">Upload Foto</label>
                    <input type="file" class="form-control col-10 mt-3" id="gambar" aria-describedby="gambar" name="gambar">
                </div>

                <button type="submit" name="submit" class="btn btn-success mt-3 mb-3"><i class="fa fa-plus"></i> Tambah</button>
            </div>
        </form>
    </div>
</div>