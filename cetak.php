<?php
// Require composer autoload
require_once __DIR__ . '/vendor/autoload.php';
// Create an instance of the class:
$mpdf = new \Mpdf\Mpdf();
$html = '<table border="1" cellspacing="0">
    <thead>
    <tr>
        <th>Nomor Polisi</th>
        <th>Jenis Kendaraan</th>
        <th>Merk</th>
        <th>Tipe</th>
        <th>Waktu Keluar</th>
        <th>Lama Parkir</th>
        <th>Bayar</th>
    </tr>
    </thead>        
</table>';
include 'koneksi.php';
$id = $_GET["id"];
$sql = "SELECT * FROM kendaraan";
$query = mysqli_query($koneksi, $sql);
while ($data = mysqli_fetch_array($query)) {
    $html .= '<tr>
    <td>' . $data["nomor_polisi"] . '</td>
    </tr>';
}
// Write some HTML code:
$mpdf->WriteHTML($html);

// Output a PDF file directly to the browser
$mpdf->Output();
