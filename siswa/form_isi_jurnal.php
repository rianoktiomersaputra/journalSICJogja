<?php
session_start();
require("../core/core.php");
$core = new Core();
$id_siswa = $_SESSION['id_siswa'];
date_default_timezone_set("Asia/Jakarta");
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

</head>

<body>

    <body style="background-image: url('../gambar/background.jpg'); background-size:cover; ">
        <div class=" container">
            <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
                <a class="navbar-brand" href="#">SIC User</a>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="daftar_siswa.php">Daftar Jurnal</a>
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
                    <li class="breadcrumb-item"><a href="tabel_siswa.php">Data Jurnal Siswa</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Input Data Jurnal Siswa</li>
                </ol>
            </nav>

            <div class="jumbotron jumbotron-fluid" style="opacity:0.8">
                <div class="container">
                    <h1>Input Data Jurnal</h1>
                </div>
                <div class="container">
                    <form action="../proses/proses_isi_jurnal.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="tanggal">Tanggal</label>
                                    <input type="text" name="id_siswa" value="<?= $id_siswa ?>" hidden>
                                    <input type="date" class="form-control" name="tanggal" id="tanggal" value="<?php echo date("Y-m-d"); ?>" disabled>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="jam_mulai">Jam Mulai</label>
                                    <input type="time" class="form-control" name="jam_mulai" id="jam_mulai">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="jam_selesai">Jam Selesai</label>
                                    <input type="time" class="form-control" name="jam_selesai" id="jam_selesai">
                                </div>
                            </div>
                            <div class="col-md-2"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-4">
                                <label for="uraian">Uraian</label>
                                <textarea class="form-control" rows="4" id="uraian" name="uraian"></textarea>
                            </div>
                            <div class="col-md-4">
                                <label for="gambar">Upload Gambar</label>
                                <input type="file" name="gambar" class="form-control" id="gambar">
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center" style="margin-top:20px">
                            <button type="submit" name="reset" value="batalkan" class="btn btn-primary pull-right" style="margin-right:3%">Reset</button>
                            <button type="submit" name="submit" value="submit" class="btn btn-primary pull-right" style="margin-right:3%">Tambahkan</button>
                        </div>

                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>

            <body>