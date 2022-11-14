<?php
include 'koneksi.php';
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $login = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' AND password='$password'");
    $cek = mysqli_num_rows($login);

    if ($cek > 0) {
        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['status'] = "login";
        header("location:index.php");
    } else {
        $_SESSION['status'] = "belum login";
        header("location:login.php");
    }
}
