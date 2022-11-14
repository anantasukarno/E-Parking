<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
}
include 'navbar.php';
include 'koneksi.php';
$id = $_GET['id'];
$sql = "SELECT * FROM jenis_kendaraan WHERE id_jenis='$id'";
$query = mysqli_query($koneksi, $sql);
$jns = mysqli_fetch_array($query);


?>


<div class="pembungkus">
    <div class="card">
        <h5 class="card-header bg-success text-light">Edit Jenis Kendaraan</h5>
        <div class="container mt-4">
            <form method="post" action="jenis_kendaraan_edit_action.php">
                <input type="hidden" name="id" value="<?php echo $jns['id_jenis']; ?>">
                <label for="nama" class="form-label">Jenis Kendaraan</label>
                <input type="text" name="jenis" id="nama" placeholder="Jenis Kendaraan" class="form-control" value="<?php echo $jns['jenis_kendaraan']; ?>"><br>
                <label for="nama" class="form-label">Biaya</label>
                <input type="text" name="biaya" id="biaya" class="form-control" placeholder="Biaya/Jam" value="<?php echo $jns['bayar']; ?>"><br>
                <button name="edit_jenis" type="submit" class="btn btn-success btn-sm mb-3">Edit</button>

            </form>
        </div>
    </div>
</div>