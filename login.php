<?php
session_start();
if (isset($_SESSION['login'])) {
    header("Location: index.php");
}
include 'koneksi.php';
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $query = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$username' AND password='$password'");

    if (mysqli_num_rows($query) === 1) {
        $data = mysqli_fetch_assoc($query);
        $_SESSION['login'] = true;
        $_SESSION['nama'] = $data['nama_lengkap'];
        header("Location: index.php");
    }
    $error = true;
}

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>
    <div class="container col-4 outter-form-login shadow p-3 mt-5 mb-5 bg-white rounded">
        <div class="logo-login">
            <em class="glyphicon glyphicon-user"></em>
        </div>
        <form action="" class="inner-login" method="post">
            <h3 class="text-center title-login">Login</h3>
            <?php if (isset($error)) : ?>
                <p>username / password salah</p>
            <?php endif; ?>
            <div class="form-group mt-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" name="username" placeholder="Username" id="username">
            </div>

            <div class="form-group mt-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Password" id="password">
            </div>

            <input type="submit" class="btn btn-success mt-3" value="LOGIN" name="login" />
        </form>

    </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    -->
</body>

</html>