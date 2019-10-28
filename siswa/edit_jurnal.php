<?php
session_start();
require("../core/core.php");
$core = new Core();
$id_j = $_GET['id_j'];
$sql = mysqli_query($core->koneksi, "SELECT * FROM tabel_isi_jurnal WHERE id = '$id_j'");
$jurnal = mysqli_fetch_array($sql, MYSQLI_ASSOC);
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
            <a class="navbar-brand" href="#">SIC User</a>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" href="daftar_siswa.php">Daftar Jurnal</a>
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
                <li class="breadcrumb-item active" aria-current="page">Edit Data Jurnal Siswa</li>
            </ol>
        </nav>
        <div class="jumbotron jumbotron-fluid" style="opacity:0.8">
            <div class="container">
                <h1>Edit Jurnal</h1>
                <form action="../proses/proses_edit_jurnal.php" enctype="multipart/form-data" method="POST">
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="tanggal">Tanggal</label>
                                <input type="text" name="id_j" value="<?= $id_j ?>" hidden>
                                <input type="date" class="form-control" name="tanggal" id="tanggal" value="<?= $jurnal['tanggal'] ?>">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="jam_mulai">Jam Mulai</label>
                                <input type="time" class="form-control" name="jam_mulai" id="jam_mulai" value="<?= $jurnal['jam_mulai'] ?>">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="jam_selesai">Jam Selesai</label>
                                <input type="time" class="form-control" name="jam_selesai" id="jam_selesai" value="<?= $jurnal['jam_selesai'] ?>">
                            </div>
                        </div>
                        <div class="col-md-2"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-4">
                            <label for="uraian">Uraian</label>
                            <textarea class="form-control" rows="6" id="uraian" name="uraian"><?= $jurnal['uraian'] ?></textarea>
                        </div>
                        <div class="col-md-4">
                            <label for="gambar">Upload Gambar</label>
                            <div class="row">
                                <img src="../upload/<?= $jurnal['gambar'] ?>"" style=" width: 200px; height:110px; margin-bottom:18px;">
                                <input type="file" name="gambar" id="gambar">
                            </div>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center" style="margin-top:40px">
                        <button type="submit" name="submit" value="submit" class="btn btn-primary pull-right" style="margin-right:3%">Edit</button>
                        <button type="submit" name="reset" value="batalkan" class="btn btn-primary pull-right">Reset</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="container">
            <hr>
            <div class="row-fluid">
                <div class="span12">
                    <div class="span8">
                    </div>
                    <div class="span4">
                        <p class="muted pull-right">SIC YOGYAKARTA</p>
                    </div>
                </div>
            </div>
        </div>


        <body>