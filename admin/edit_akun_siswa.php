<?php
session_start();
if ($_SESSION['role'] != 'admin') {
    header("Location: ../login.php");
}
require("../core/core.php");
$core = new Core();
$id_siswa = $_GET['id_siswa'];
$sql = mysqli_query($core->koneksi, "SELECT * FROM siswa WHERE id_siswa = '$id_siswa'");
$siswa = mysqli_fetch_array($sql, MYSQLI_ASSOC);
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

</head>

<body style="background-image: url('../gambar/background.jpg'); background-size:cover; ">
    <div class=" container">
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            <a class="navbar-brand" href="#">SIC Admin</a>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="daftar_seluruhjurnal.php">Daftar Seluruh Jurnal</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="registrasi.php">Registrasi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="daftar_siswa.php">Daftar Seluruh Siswa</a>
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
                <li class="breadcrumb-item"><a href="daftar_siswa.php">Data Seluruh Siswa</a></li>
                <li class="breadcrumb-item"><a href="siswa.php?id_siswa=<?= $id_siswa; ?>">Data Siswa</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Data Siswa</li>
            </ol>
        </nav>

        <div class="jumbotron jumbotron-fluid" style="opacity:0.8">
            <div class="container">
                <div style="padding:20px;">
                    <h2>Edit Akun Siswa</h2>
                    <form action="../proses/proses_edit_akun_siswa.php" method="POST">
                        <div class="row">
                            <div class="col-md-7">
                                <div class="form-group">
                                    <label for="nama">Nama Lengkap</label>
                                    <input type="text" name="id_siswa" hidden value="<?= $siswa['id_siswa'] ?>">
                                    <input type="text" class="form-control" id="nama" name="nama_lengkap" value="<?= $siswa['nama_lengkap'] ?>">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="nohp">Nomor HP</label>
                                    <input type="number" class="form-control" id="nohp" name="no_hp" value="<?= $siswa['no_hp'] ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="tel">Tempat Lahir</label>
                                    <input type="text" class="form-control" id="tel" name="tempat_lahir" value="<?= $siswa['tempat_lahir'] ?>">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="tgl">Tanggal Lahir</label>
                                    <input type="date" class="form-control" id="tgl" name="tanggal_lahir" value="<?= $siswa['tanggal_lahir'] ?>">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="sel1">Jenis Kelamin</label>
                                    <select class="form-control" id="sel1" name="jenis_kelamin">
                                        <option value="laki-laki">Laki-laki</option>
                                        <option value="perempuan">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <textarea class="form-control" rows="3" id="alamat" name="Alamat"><?= $siswa['Alamat'] ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-7">
                                <div class="form-group">
                                    <label for="namaot">Nama Orang Tua</label>
                                    <input type="text" class="form-control" id="namaot" name="nama_ortu" value="<?= $siswa['nama_ortu'] ?>">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="nohpot">Nomor HP Orang Tua</label>
                                    <input type="number" class="form-control" id="nohpot" name="nohp_ortu" value="<?= $siswa['nohp_ortu'] ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="sekolah">Sekolah</label>
                                    <input type="text" class="form-control" id="sekolah" name="sekolah" value="<?= $siswa['sekolah'] ?>">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="nis">NIS</label>
                                    <input type="number" class="form-control" id="nis" name="nis" value="<?= $siswa['nis'] ?>">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="jurusan">Jurusan</label>
                                    <input type="text" class="form-control" id="jurusan" name="jurusan" value="<?= $siswa['jurusan'] ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control" id="username" name="username" value="<?= $siswa['username'] ?>">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="text" class="form-control" id="password" name="password" value="<?= $siswa['password'] ?>">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="ss">Status Siswa</label>
                                    <select class="form-control" id="ss" name="status_siswa">
                                        <option value="Aktif">Aktif</option>
                                        <option value="Tidak Aktif">Tidak Aktif</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button type="submit" name="reset" class="btn btn-primary pull-right" style="margin-right:3%">Reset</button>
                            <button type="submit" name="submit" class="btn btn-primary pull-right" style="margin-right:3%">Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <body>