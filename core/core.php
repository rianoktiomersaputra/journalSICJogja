<?php
class Core
{

  private $id;
  private $username;
  private $password;
  private $role;
  private $id_siswa;
  private $nama_lengkap;
  private $no_hp;
  private $tempat_lahir;
  private $tanggal_lahir;
  private $jenis_kelamin;
  private $Alamat;
  private $nama_ortu;
  private $nohp_ortu;
  private $sekolah;
  private $nis;
  private $jurusan;
  private $id_j;
  private $tanggal;
  private $jam_mulai;
  private $jam_selesai;
  private $uraian;
  private $gambar;
  private $status;
  private $tmp;
  private $path;

  function __construct()
  {
    $this->koneksi = mysqli_connect("localhost", "root", "") or die("gagal terkoneksi dengan database");
    mysqli_select_db($this->koneksi, "sicjurnal");
  }

  public function login($username, $password)
  {
    $query2 = mysqli_query($this->koneksi, "SELECT * FROM admin WHERE username = '$username' AND password='$password'");
    $query = mysqli_query($this->koneksi, "SELECT * FROM siswa WHERE username = '$username' AND password='$password'");
    $row = mysqli_fetch_array($query);
    $row2 = mysqli_fetch_array($query2);

    if ($row['username'] == $username and $row['password'] == $password) {
      session_start();
      $_SESSION['id_siswa'] = $row['id_siswa'];
      $_SESSION['username'] = $row['username'];
      $_SESSION['password'] = $row['password'];
      header('location:../siswa/tabel_siswa.php');
    } else {
      echo "<script type='text/javascript'>window.location='../login.php';alert('Username atau password Salah !!!')</script>";
    }

    if ($row2['username'] == $username and $row2['password'] == $password) {
      if ($row2['role'] == 'admin') {
        session_start();
        $_SESSION['id'] = $row2['id'];
        $_SESSION['username'] = $row2['username'];
        $_SESSION['password'] = $row2['password'];
        $_SESSION['role'] = $row2['role'];
        header('location:../admin/daftar_siswa.php');
      }
    } else {
      echo "<script type='text/javascript'>window.location='../login.php';alert('Username atau password Salah !!!')</script>";
    }
  }


  public function tampilAdminDaftarJurnalSiswa()
  {
    $id_siswa = $_GET['id_siswa'];
    $query = mysqli_query($this->koneksi, "SELECT * FROM tabel_isi_jurnal WHERE id_siswa = $id_siswa ORDER BY status");

    while ($result = mysqli_fetch_array($query)) {
      $this->id_j = $result['id'];
      $this->tanggal = $result['tanggal'];
      $this->jam_mulai = $result['jam_mulai'];
      $this->jam_selesai = $result['jam_selesai'];
      $this->uraian = $result['uraian'];
      $this->gambar = $result['gambar'];
      $this->status = $result['status'];

      echo "<tbody>";
      echo "<tr class='table-primary'>";
      ?>
      <td><?= $this->id_j ?></td>
      <td><?= $this->tanggal ?></td>
      <td><?= $this->jam_mulai ?></td>
      <td><?= $this->jam_selesai ?></td>
      <td><?= $this->uraian ?></td>
      <td><img src="../upload/<?= $this->gambar ?>" style="width: 200px; height: 100px;"></td>
      <?php
            if ($result['status'] == "Proses") {
              ?>
        <td><a class="btn btn-danger"><img src="../gambar/seru.png" width="30px" height="30px"></a></td>

      <?php
            } else { ?>
        <td><a class="btn btn-success"><img src="../gambar/benar.png" width="30px" height="30px"></a></td>
      <?php }

            if ($result['status'] == "Proses") {
              ?>
        <td><a class="btn btn-success" href="../proses/proses_acc.php?id_j=<?= $this->id_j ?>" style="margin-right:2%">Setujui</a></td>
      <?php
            } else {
              ?>
        <td><a class="btn btn-success disabled">Disetujui</a></td>
      <?php
            }
            ?>

      </tr>
    <?php
        }
      }
      public function tampilAdminDaftarJurnal()
      {
        $query = mysqli_query($this->koneksi, "SELECT * FROM tabel_isi_jurnal JOIN siswa ON tabel_isi_jurnal.id_siswa = siswa.id_siswa ORDER BY status");

        while ($result = mysqli_fetch_array($query)) {
          $this->id_j = $result['id'];
          $this->nama = $result['nama_lengkap'];
          $this->tanggal = $result['tanggal'];
          $this->jam_mulai = $result['jam_mulai'];
          $this->jam_selesai = $result['jam_selesai'];
          $this->uraian = $result['uraian'];
          $this->gambar = $result['gambar'];
          $this->status = $result['status'];

          echo "<tbody>";
          echo "<tr class='table-primary'>";
          ?>
      <td><?= $this->id_j ?></td>
      <td class="text-left"><?= $this->nama ?></td>
      <td><?= $this->tanggal ?></td>
      <td><?= $this->jam_mulai ?></td>
      <td><?= $this->jam_selesai ?></td>
      <td class="text-left"><?= $this->uraian ?></td>
      </td>
      <td><img src="../upload/<?= $this->gambar ?>" style="width: 200px; height: 100px;"></td>
      <?php
            if ($result['status'] == "Proses") {
              ?>
        <td><a class="btn btn-danger"><img src="../gambar/seru.png" width="30px" height="30px"></a></td>

      <?php
            } else { ?>
        <td><a class="btn btn-success"><img src="../gambar/benar.png" width="30px" height="30px"></a></td>
      <?php }

            if ($result['status'] == "Proses") {
              ?>
        <td><a class="btn btn-success" href="../proses/proses_acc.php?id_j=<?= $this->id_j ?>" style="margin-right:2%">Setujui</a></td>
      <?php
            } else {
              ?>
        <td><a class="btn btn-success disabled">Disetujui</a></td>
      <?php
            }
            ?>

      </tr>
    <?php
        }
      }

      public function tampilAdminDaftarSiswa()
      {
        $query = mysqli_query($this->koneksi, "SELECT * FROM siswa ORDER BY nama_lengkap");

        while ($result = mysqli_fetch_array($query)) {
          $this->id_siswa = $result['id_siswa'];
          $this->nama_lengkap = $result['nama_lengkap'];

          echo "<tr class='table-primary'>";
          ?>
      <td class="text-center"><?= $this->id_siswa; ?></td>
      <td class="text-left"><a href="siswa.php?id_siswa=<?= $this->id_siswa; ?>"" style=" text-decoration: none; color:black"><b><?= $this->nama_lengkap; ?></b></a></td>
      <td class="justify-content-center">
        <a class="btn btn-success" href="daftar_jurnal.php?id_siswa=<?= $this->id_siswa; ?>">Jurnal </a>
      </td>
      </tr>
    <?php
        }
      }

      public function tampilDataSiswa()
      {
        $id_siswa = $_GET['id_siswa'];
        $query = mysqli_query($this->koneksi, "SELECT * FROM siswa WHERE id_siswa = '$id_siswa' ");
        while ($result = mysqli_fetch_array($query)) {
          $this->nama_lengkap = $result['nama_lengkap'];
          $this->no_hp = $result['no_hp'];
          $this->tempat_lahir = $result['tempat_lahir'];
          $this->tanggal_lahir = $result['tanggal_lahir'];
          $this->jenis_kelamin = $result['jenis_kelamin'];
          $this->Alamat = $result['Alamat'];
          $this->nama_ortu = $result['nama_ortu'];
          $this->nohp_ortu = $result['nohp_ortu'];
          $this->sekolah = $result['sekolah'];
          $this->nis = $result['nis'];
          $this->jurusan = $result['jurusan'];
          $this->username = $result['username'];
          $this->password = $result['password'];
          ?>
      <div class="row">
        <div class="col-5">
          <div class="list-group" id="list-tab" role="tablist">
            <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Data Diri</a>
            <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">Data Orang Tua</a>
            <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="messages">Data Sekolah</a>
          </div>
        </div>
        <div class="col-7">
          <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list"><b><?= $this->nama_lengkap ?></b>, lahir di <b><?= $this->tempat_lahir ?></b> pada tanggal <b><?= $this->tanggal_lahir ?></b> dengan jenis kelamin <b><?= $this->jenis_kelamin ?></b>. Tinggal di <b><?= $this->Alamat ?></b>. No. HP <b><?= $this->no_hp ?>.</b></div>
            <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">Nama orang tua <b><?= $this->nama_lengkap ?></b> adalah <b><?= $this->nama_ortu ?></b>. No HP Bapak <b><?= $this->nama_ortu ?></b> : <b><?= $this->nohp_ortu ?>.</b></div>
            <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list"><b><?= $this->nama_lengkap ?></b> berasal dari Sekolah/Universitas <b><?= $this->sekolah ?></b> dengan jurusan <b><?= $this->jurusan ?></b> memiliki nomor induk mahasiswa/siswa : <b><?= $this->nis ?></b>. </div>
          </div>
        </div>
      </div>
      <div class="d-flex justify-content-center" style="margin-top:30px;">
        <a class="btn btn-success" href="../admin/daftar_siswa.php" style="margin-right:20px;">Kembali</a>
        <a class="btn btn-success" href="edit_akun_siswa.php?id_siswa=<?= $id_siswa; ?>">Edit</a>
      </div>
      </div>
    <?php

        }
      }

      public function formDaftar()
      {
        ?>
    <form action="proses/daftar.php" method="POST">
      <div class="row">
        <div class="col-md-7">
          <div class="form-group">
            <label for="nama">Nama Lengkap</label>
            <input type="text" class="form-control" id="nama" name="nama_lengkap">
          </div>
        </div>
        <div class="col-md-5">
          <div class="form-group">
            <label for="nohp">Nomor HP</label>
            <input type="number" class="form-control" id="nohp" name="no_hp">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-3">
          <div class="form-group">
            <label for="tel">Tempat Lahir</label>
            <input type="text" class="form-control" id="tel" name="tempat_lahir">
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="tgl">Tanggal Lahir</label>
            <input type="date" class="form-control" id="tgl" name="tanggal_lahir">
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
            <textarea class="form-control" rows="3" id="alamat" name="Alamat"></textarea>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-7">
          <div class="form-group">
            <label for="namaot">Nama Orang Tua</label>
            <input type="text" class="form-control" id="namaot" name="nama_ortu">
          </div>
        </div>
        <div class="col-md-5">
          <div class="form-group">
            <label for="nohpot">Nomor HP Orang Tua</label>
            <input type="number" class="form-control" id="nohpot" name="nohp_ortu">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <label for="sekolah">Sekolah</label>
            <input type="text" class="form-control" id="sekolah" name="sekolah">
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="nis">NIS</label>
            <input type="number" class="form-control" id="nis" name="nis">
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="jurusan">Jurusan</label>
            <input type="text" class="form-control" id="jurusan" name="jurusan">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-7">
          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username">
          </div>
        </div>
        <div class="col-md-5">
          <div class="form-group">
            <label for="password">Password</label>
            <input type="text" class="form-control" id="password" name="password">
          </div>
        </div>
      </div>
      <div class="d-flex justify-content-center">
        <button type="submit" name="submit" class="btn btn-primary pull-right" style="margin-right:3%">Tambahkan</button>
        <a href="login.php" class="btn btn-primary pull-right">Login</a>
      </div>
      <div class="clearfix"></div>
    </form>
  <?php
    }

    public function formAdminDaftar()
    {
      ?>
    <form action="../proses/daftar.php" method="POST">
      <label>Nama Lengkap</label>
      <input type="text" name="nama_lengkap" class="span3">
      <label>No Hp</label>
      <input type="text" name="no_hp" class="span3">
      <label>Tempat Lahir</label>
      <input type="text" name="tempat_lahir" class="span3">
      <label>Tanggal Lahir</label>
      <input type="date" name="tanggal_lahir" class="span3">
      <label>Jenis Kelamin</label>
      <select name="jenis_kelamin">
        <option value="laki-laki">Laki-laki</option>
        <option value="perempuan">Perempuan</option>
      </select>
      <label>Alamat</label>
      <textarea cols="100" rows="5" name="alamat" class="span3"></textarea>
      <label>Nama Orang Tua</label>
      <input type="text" name="nama_ortu" class="span3">
      <label>No Hp Orang Tua</label>
      <input type="text" name="no_ortu" class="span3">
      <label>Sekolah</label>
      <input type="text" name="sekolah" class="span3">
      <label>NIS</label>
      <input type="number" name="nis" class="span3">
      <label>Jurusan</label>
      <input type="text" name="jurusan" class="span3">
      <label>Username</label>
      <input type="text" name="username" class="span3">
      <label>Password</label>
      <input type="text" name="password" class="span3">

      <button type="submit" name="submit" class="btn btn-primary pull-right" style="margin-right:3%">Tambahkan
      </button>
      <div class="clearfix"></div>
    </form>
    <?php
      }

      public function daftar($nama_lengkap, $no_hp, $tempat_lahir, $tanggal_lahir, $jenis_kelamin, $Alamat, $nama_ortu, $nohp_ortu, $sekolah, $nis, $jurusan, $username, $password)
      {
        $this->nama_lengkap = $nama_lengkap;
        $this->no_hp = $no_hp;
        $this->tempat_lahir = $tempat_lahir;
        $this->tanggal_lahir = $tanggal_lahir;
        $this->jenis_kelamin = $jenis_kelamin;
        $this->Alamat = $Alamat;
        $this->nama_ortu = $nama_ortu;
        $this->no_ortu = $nohp_ortu;
        $this->sekolah = $sekolah;
        $this->nis = $nis;
        $this->jurusan = $jurusan;
        $this->username = $username;
        $this->password = $password;

        $sql = mysqli_query($this->koneksi, "INSERT INTO siswa (nama_lengkap,no_hp,tempat_lahir,tanggal_lahir,jenis_kelamin,Alamat,nama_ortu,nohp_ortu,sekolah,nis,jurusan,username,password) VALUES ('$this->nama_lengkap','$this->no_hp','$this->tempat_lahir','$this->tanggal_lahir','$this->jenis_kelamin','$this->Alamat','$this->nama_ortu','$this->no_ortu','$this->sekolah','$this->nis','$this->jurusan','$this->username','$this->password')") or die(mysqli_error($this->koneksi));
        echo "<script>window.location='../admin/daftar_siswa.php';alert('Data Siswa Berhasil Disimpan')</script>";
      }

      public function editAkunSiswa($id_siswa, $nama_lengkap, $no_hp, $tempat_lahir, $tanggal_lahir, $jenis_kelamin, $Alamat, $nama_ortu, $nohp_ortu, $sekolah, $nis, $jurusan, $username, $password)
      {
        $this->id_siswa = $id_siswa;
        $this->nama_lengkap = $nama_lengkap;
        $this->no_hp = $no_hp;
        $this->tempat_lahir = $tempat_lahir;
        $this->tanggal_lahir = $tanggal_lahir;
        $this->jenis_kelamin = $jenis_kelamin;
        $this->Alamat = $Alamat;
        $this->nama_ortu = $nama_ortu;
        $this->no_ortu = $nohp_ortu;
        $this->sekolah = $sekolah;
        $this->nis = $nis;
        $this->jurusan = $jurusan;
        $this->username = $username;
        $this->password = $password;

        $sql = " UPDATE siswa SET nama_lengkap = '$this->nama_lengkap', no_hp = '$this->no_hp', tempat_lahir = '$this->tempat_lahir', tanggal_lahir = '$this->tanggal_lahir', jenis_kelamin = '$this->jenis_kelamin', Alamat = '$this->Alamat',nama_ortu = '$this->nama_ortu', nohp_ortu = '$this->nohp_ortu', sekolah = '$this->sekolah', nis = '$this->nis', jurusan = '$this->jurusan', username = '$this->username', password = '$this->password' WHERE id_siswa = '$this->id_siswa'";
        mysqli_query($this->koneksi, $sql) or die(mysqli_error($this->koneksi));
        header("Location: ../admin/daftar_siswa.php");
      }
      public function tampilDAftarSiswa()
      {
        session_start();
        $id_siswa = $_SESSION['id_siswa'];
        $no = 1;
        $query = mysqli_query($this->koneksi, "SELECT * FROM tabel_isi_jurnal WHERE id_siswa = $id_siswa");
        while ($result = mysqli_fetch_array($query)) {
          $this->id_j = $result['id'];
          $this->tanggal = $result['tanggal'];
          $this->jam_mulai = $result['jam_mulai'];
          $this->jam_selesai = $result['jam_selesai'];
          $this->uraian = $result['uraian'];
          $this->gambar = $result['gambar'];
          $this->status = $result['status'];
          echo "<tbody>";
          echo "<tr class='table-primary'>";
          ?>
      <td><?= $no++ ?></td>
      <td><?= $this->uraian ?></td>
      <td><?= $this->tanggal ?></td>
      <td><?= $this->jam_mulai ?></td>
      <td><?= $this->jam_selesai ?></td>
      <td><img src="../upload/<?= $this->gambar ?>" style="width: 100px; height: 100px;"></td>
      <td>
        <a class="btn btn-success" href='<?php echo "edit_jurnal.php?id_j=$this->id_j"; ?>' style="margin-right: 2%">Edit</a>
        <a class="btn btn-warning" href='<?php echo "../proses/proses_hapus_jurnal.php?id_j=$this->id_j"; ?>' style="margin-right: 2%">Hapus</a>
      </td>

      <td><a href="#" style="margin-right:2%"><?= $this->status ?></a></td>
      </tr>
    <?php
        }
      }
      public function hapusJurnal($id_j)
      {
        $this->id_j = $id_j;
        mysqli_query($this->koneksi, "DELETE FROM tabel_isi_jurnal WHERE id_j = '$this->id_j'");
        header("Location: ../siswa/tabel_siswa.php");
      }

      public function editJurnalSiswa($id_j, $tanggal, $jam_mulai, $jam_selesai, $gambar, $uraian)
      {
        $this->id_j = $id_j;
        $this->tanggal = $tanggal;
        $this->jam_mulai = $jam_mulai;
        $this->jam_selesai = $jam_selesai;
        $this->gambar = $gambar;
        $this->uraian = $uraian;

        if (move_uploaded_file($this->tmp, $this->path)) {
          $sql = " UPDATE tabel_isi_jurnal SET  tanggal = '$this->tanggal', jam_mulai = '$this->jam_mulai', jam_selesai = '$this->jam_selesai', gambar = '$this->gambar', uraian = '$this->uraian' WHERE id_j = '$this->id_j'";
          mysqli_query($this->koneksi, $sql) or die(mysqli_error($this->koneksi));
          if ($sql) {
            echo "berhasil";
            header("Location: ../siswa/tabel_siswa.php");
          } else {
            echo "Tambah data gagal";
          }
        } else { }
      }

      function tombolPrint()
      {
        $id_siswa = $_SESSION['id_siswa'];
        $cek = mysqli_query($this->koneksi, "SELECT * FROM tabel_isi_jurnal WHERE id_siswa = '$id_siswa' AND status = 'Proses' ");
        if (mysqli_num_rows($cek) > 0) {
          ?>
      <a class="btn btn-primary d-flex justify-content-center" href="">Print</a> <?php
                                                                                      } else { ?>
      <a href=" ../siswa/cetak.php" class="btn btn-primary d-flex justify-content-center">Print</a>
    <?php
        }
      }
      public function cetakHalaman()
      {
        session_start();
        $id_siswa = $_SESSION['id_siswa'];
        $no = 1;
        $query = mysqli_query($this->koneksi, "SELECT * FROM tabel_isi_jurnal WHERE id_siswa = $id_siswa");
        while ($result = mysqli_fetch_array($query)) {
          $this->id_j = $result['id'];
          $this->tanggal = $result['tanggal'];
          $this->jam_mulai = $result['jam_mulai'];
          $this->jam_selesai = $result['jam_selesai'];
          $this->uraian = $result['uraian'];
          $this->gambar = $result['gambar'];
          $this->status = $result['status'];
          echo "<tbody>";
          echo "<tr>";
          ?>
      <td><a href="#"><?= $no++ ?></a></td>
      <td><a href="#"><?= $this->uraian ?></a></td>
      <td><a href="#"><?= $this->tanggal ?></a></td>
      <td><a href="#"><?= $this->jam_mulai ?></a></td>
      <td><a href="#"><?= $this->jam_selesai ?></a></td>
      <td><img src="../upload/<?= $this->gambar ?>" style="width: 100px; height: 100px;"></td>
      <td><a href="#" style="margin-right:2%"><?= $this->status ?></a></td>
      </tr>
<?php
    }
  }
}

?>