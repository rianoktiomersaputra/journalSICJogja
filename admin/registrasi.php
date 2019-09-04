<?php
session_start();
if ($_SESSION['role'] != 'admin') {
    header("Location: ../login.php");
}
require("../core/core.php");
$core = new Core();
?>

<!DOCTYPE html>
<html>

<head>
    <title></title>
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

</head>

<body>
    <div class="navbar">
        <div class="navbar-inner">
            <div class="container">
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <a class="brand" href="#">SIC Admin</a>
                <div class="nav-collapse">
                    <ul class="nav">
                        <li><a href="daftar_siswa.php">Daftar Siswa</a></li>
                        <li class="active"><a href="#">Registrasi Siswa</a></li>
                    </ul>
                    <ul class="nav pull-right">
                        <li class="divider-vertical"></li>
                        <li><a href="../proses/proses_logout.php">Log Out</a></li>
                    </ul>
                </div><!-- /.nav-collapse -->
            </div>
        </div><!-- /navbar-inner -->
    </div>
    <div style="background-image: url('../gambar/background.jpg'); background-repeat: repeat;">
        <div class="container">
            <div class="span4"></div>
            <div class="span3">
                <h2>Registrasi Akun Siswa</h2>
                <?php
                $core->formAdminDaftar();
                ?>
            </div>
        </div>
    </div>

    <div style="background-color: #F6F6F6">
        <div class="text-center" style="padding: 10px;">© SIC YOGYAKARTA</div>
    </div>


    <body>