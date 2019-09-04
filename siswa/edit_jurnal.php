<?php 
     session_start();
     require("../core/core.php");
     $core = new Core();
    $id_j = $_GET['id_j'];
    $sql = mysqli_query($core->koneksi,"SELECT * FROM tabel_isi_jurnal WHERE id = '$id_j'");
    $jurnal = mysqli_fetch_array($sql, MYSQLI_ASSOC);
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
        <a class="brand" href="#">SIC</a>
        <div class="nav-collapse">
            <ul class="nav"> 
              <li><a href="form_isi_jurnal.php">Isi Jurnal</a></li>
              <li><a href="tabel_siswa.php">Tabel Jurnal</a></li>                   
          </ul>    
          <ul class="nav pull-right">
              <li class="divider-vertical"></li>
              <li><a href="../proses/proses_logout_siswa.php">Log Out</a></li>  
          </ul>
      </div><!-- /.nav-collapse -->
  </div>
</div><!-- /navbar-inner -->
</div>
<div class="container">
    <div class="span4"></div>
    <div class="span3">
        <h2>Edit Jurnal</h2>
        <form action="../proses/proses_edit_jurnal.php" method="POST">
            <input type="hidden" id="id_jurnal" name="id_j" value="<?php echo $id_j ?>">
            <input type="hidden" id="username" name="username" value="<?php echo $user; ?>">
            <label>Tanggal</label>
            <input type="text" name="tanggal" value="<?php echo $jurnal['tanggal'];?>" class="span3" disabled>
            <label>Jam Mulai</label>
            <input type="time" name="jam_mulai" value="<?php echo $jurnal['jam_mulai'];?>" class="span3">
            <label>Jam Selesai</label>
            <input type="time" name="jam_selesai" value="<?php echo $jurnal['jam_selesai'];?>" class="span3">
            <label>Uraian</label>
            <textarea cols="100" rows="5" name="uraian" class="span3">
              <?php echo $jurnal['uraian'];?>
            </textarea>
             <label>Upload Gambar</label>
             <img src="../upload/<?=$jurnal['gambar']?>" style="height: 200px; width: 200px">
            <input type="file" name="gambar" class="span3">
            <button type="submit" name="reset" value="batalkan" class="btn btn-primary pull-right">Reset</button>
            <button type="submit" name="submit" value="submit" class="btn btn-primary pull-right" style="margin-right:3%">Edit</button>
           
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
