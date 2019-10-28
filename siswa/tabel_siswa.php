<?php

session_start();
$id_siswa = $_SESSION['id_siswa'];
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
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="css.css">
    <!------ Include the above in your HEAD tag ---------->

    <style type="text/css">
        .sudahacc {
            cursor: not-allowed;
        }

        td {
            text-align: center;
        }
    </style>
</head>

<body style="background-image: url('../gambar/background.jpg'); background-size:cover; ">
    <div class=" container">
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            <a class="navbar-brand" href="tabel_siswa.php">SIC Siswa</a>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" href="tabel_siswa.php">Daftar Jurnal</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="siswa.php?id_siswa=<?= $id_siswa ?>">Akun</a>
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
                <li class="breadcrumb-item"><a href="tabel_siswa.php">Siswa</a></li>
                <li class="breadcrumb-item active" aria-current="page">Data Jurnal Siswa</li>
            </ol>
        </nav>
        <div class="jumbotron jumbotron-fluid" style="opacity:0.8">
            <div class="container">
                <h1>Daftar Jurnal</h1>
                <a href="form_isi_jurnal.php" class="btn btn-primary" style="float:right; margin-bottom:20px;">Input Jurnal</a>
                <table class="table table-bordered" class="display">
                    <thead>
                        <tr class="table-success text-center">
                            <th>No</th>
                            <th>Uraian</th>
                            <th>Tanggal</th>
                            <th>Jam Mulai</th>
                            <th>Jam selesai</th>
                            <th>Gambar</th>
                            <th>Status</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <?php
                    $core->tampilDaftarSiswa();
                    ?>
                    </tbody>
                </table>
                <?php
                $core->tombolPrint();
                ?>
            </div>
        </div>
    </div>
</body>