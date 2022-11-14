<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link href="css/style.css?v=<?php echo time(); ?>" type="text/css" rel="stylesheet" media="all">
    <link href="fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="fontawesome/css/css/brands.css" rel="stylesheet">
    <link href="fontawesome/css/solid.css" rel="stylesheet">
    <link href="fancyBox/source/jquery.fancybox.css?v2.1.5" rel="stylesheet" type="text/css" media="screen">
    <title>E-Parkir</title>
</head>

<body>
    <div class="navbar col-12 bg-success">
        <div class="container-fluid">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link text-light fw-bold" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item dropdown fw-bold">
                    <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Kendaraan
                    </a>
                    <ul class="dropdown-menu text-light fw-bold" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="masuk.php">Kendaraan Masuk</a></li>
                        <li><a class="dropdown-item" href="keluar.php">Kendaraan Keluar</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light fw-bold" href="jenis_kendaraan.php">Jenis Kendaraan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light fw-bold" href="laporan.php">Laporan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light fw-bold" href="profile.php">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light fw-bold" href="logout.php">Logout</a>
                </li>

            </ul>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script type="text/javascript" src="fancyBox/lib/jquery-1.10.1.min.js"></script>
    <script type="text/javascript" src="fancyBox/source/jquery.fancybox.js?v=2.1.5"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    -->
</body>

</html>