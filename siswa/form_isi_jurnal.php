<?php
session_start();
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
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="../proses/proses_logout.php"><span class="fa fa-sign-out"></span>Log Out</a>
                    </li>
                </ul>
            </nav>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="tabel_siswa.php">Data Jurnal User</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Input Data Jurnal User</li>
                </ol>
            </nav>

            <div class="jumbotron jumbotron-fluid" style="opacity:0.8">
                <div class="container">
                    <h1>Daftar Jurnal</h1>

                </div>
                <div class="navbar">
                    <div class="navbar-inner">
                        <div class="container">
                            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </a>
                            <a class="brand" href="#">SIC Yogyakarta</a>
                            <div class="nav-collapse">
                                <ul class="nav">
                                    <li class="active"><a href="form_isi_jurnal.php">Isi Jurnal</a></li>
                                    <?php
                                    $a = $_SESSION['username'];
                                    $id_siswa = mysqli_query($core->koneksi, "SELECT id_siswa FROM siswa WHERE username = '$a' ");
                                    $hasil = mysqli_fetch_array($id_siswa);
                                    $hasilid = $hasil['id_siswa'];
                                    ?>
                                    <li><a href="tabel_siswa.php?id=<?= $hasilid ?>">Tabel Jurnal</a></li>
                                </ul>
                                <ul class="nav pull-right">
                                    <li class="divider-vertical"></li>
                                    <li><a href="../proses/proses_logout.php">Log Out</a></li>
                                </ul>
                            </div><!-- /.nav-collapse -->
                        </div>
                    </div><!-- /navbar-inner -->
                </div>
                <div class="container">
                    <div class="span4"></div>
                    <div class="span3">
                        <h2>Isi Jurnal</h2>
                        <form action="../proses/proses_isi_jurnal.php" method="POST" enctype="multipart/form-data">

                            <input type="text" name="id_siswa" value="<?php echo $hasil['id_siswa']; ?>" readonly>
                            <input type="hidden" id="username" name="username" value="<?php echo $user; ?>">
                            <label>Tanggal</label>
                            <input type="date" name="tanggal" value="<?php echo date('Y-m-d'); ?>" class="span3" disabled>
                            <label>Jam Mulai</label>
                            <input type="time" name="jam_mulai" value="00:00" class="span3">
                            <label>Jam Selesai</label>
                            <input type="time" name="jam_selesai" value="00:00" class="span3">
                            <label>Uraian</label>
                            <textarea cols="100" rows="5" name="uraian" class="span3"></textarea>
                            <label>Upload Gambar</label>
                            <input type="file" name="gambar" class="span3">
                            <button type="submit" name="reset" value="batalkan" class="btn btn-primary pull-right">Reset</button>
                            <button type="submit" name="submit" value="submit" class="btn btn-primary pull-right" style="margin-right:3%">Tambahkan</button>

                            <div class="clearfix"></div>
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