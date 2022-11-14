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
        <h4 class="card-header bg-success text-light">Jenis Kendaraan</h4>
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <div class="table-responsive">
                        <form method="post" id="dataTable" width="100%" cellspacing="0">
                            <table class="table table-bordered">
                                <tr>
                                    <th>No</th>
                                    <th>Jenis Kendaraan</th>
                                    <th>Harga/jam</th>
                                    <th>Action</th>
                                </tr>
                                <?php $i = 1;
                                $sql = "SELECT * FROM jenis_kendaraan";
                                $query = mysqli_query($koneksi, $sql);
                                while ($jns = mysqli_fetch_array($query)) {
                                ?>
                                    <tr>
                                        <td><?php echo $i ?></td>
                                        <td><?php echo $jns["jenis_kendaraan"] ?></td>
                                        <td><?php echo 'Rp ' . $jns["bayar"] ?></td>
                                        <td>
                                            <a href='jenis_kendaraan_edit.php?id=<?= $jns["id_jenis"] ?>' class="btn btn-success btn-sm"><i class="fas fa-edit"></i> Edit</a>
                                            <a href='jenis_kendaraan_hapus.php?id=<?= $jns["id_jenis"] ?>' class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</a>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                <?php } ?>
                            </table>
                        </form>
                    </div>
                </div>
                <div class="col">
                    <div class="container">
                        <h4>Tambah Jenis Kendaraan</h4>
                        <form method="post" action="jenis_kendaraan_action.php">
                            <input type="text" name="jenis" id="nama" placeholder="Jenis Kendaraan" class="form-control"><br>
                            <input type="text" name="biaya" id="biaya" class="form-control" placeholder="Biaya/Jam"><br>
                            <button name="tambahJenis" type="submit" class="btn btn-success btn-sm"><i class="fas fa-plus"></i> Tambah</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>