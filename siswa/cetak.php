<?php

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
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script type="text/javascript">
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );
    </script>
    <style type="text/css">
    td{
        text-align: center;
    }
</style>
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
        <a class="brand" href="#">SIC Yogyakarta</a>
        <div class="nav-collapse">
            <ul class="nav">
              <li><a href="form_isi_jurnal.php">Isi Jurnal</a></li> 
              <li class="active"><a href="tabel_siswa.php">Tabel Jurnal</a></li>                   
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
    <div class="span12">
        <table id="myTable" class="display">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Uraian</th>
                    <th>Tanggal</th>
                    <th>Jam Mulai</th>
                    <th>Jam selesai</th>
                    <th>Gambar</th>
                    <th>Status</th>
                    
                    
                </tr>
            </thead>
            <?php
            $core->cetakHalaman();

                ?>
            </tbody>
        </table>

    </div>
</div>
<div class="container">    
    <hr>
    <div class="row-fluid">
        <div class="span12">
            <div class="span8">
            </div>
            <div class="span4">
                <p class="muted pull-right">© SIC YOGYAKARTA</p>
            </div>
        </div>
    </div>
</div>


<body>
