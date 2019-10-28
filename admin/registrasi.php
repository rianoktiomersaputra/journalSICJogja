<?php
require("../core/core.php");
$core = new Core();
?>

<!DOCTYPE html>
<html>

<head>
    <title>SIC Jurnal</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css.css">
    <!------ Include the above in your HEAD tag ---------->

</head>

<body style="background-image: url('../gambar/background.jpg'); background-size:cover; ">
    <div class=" container">
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            <a class="navbar-brand" href="daftar_siswa_aktif.php">SIC Admin</a>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="daftar_seluruhjurnal.php">Daftar Seluruh Jurnal</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="registrasi.php">Registrasi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="daftar_siswa.php">Daftar Seluruh Siswa</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="../proses/proses_logout.php"><span class="fa fa-sign-out"></span>Log Out</a>
                </li>
            </ul>
        </nav>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Admin</a></li>
                <li class="breadcrumb-item active" aria-current="page">Registrasi</li>
            </ol>
        </nav>
        <div class="jumbotron jumbotron-fluid" style="opacity:0.8">
            <div class="container">
                <h1>Daftar User</h1>
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <?php
                        $core->formDaftar();
                        ?>
                    </div>
                    <div class="col-md-1"></div>
                </div>
            </div>
        </div>

        <body>