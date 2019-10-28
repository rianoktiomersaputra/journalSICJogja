<?php
require("../core/core.php");
$core = new Core();
$id_siswa = $_POST['id_siswa'];
$nama_lengkap = $_POST['nama_lengkap'];
$no_hp = $_POST['no_hp'];
$tempat_lahir = $_POST['tempat_lahir'];
$tanggal_lahir = $_POST['tanggal_lahir'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$Alamat = $_POST['Alamat'];
$nama_ortu = $_POST['nama_ortu'];
$nohp_ortu = $_POST['nohp_ortu'];
$sekolah = $_POST['sekolah'];
$nis = $_POST['nis'];
$jurusan = $_POST['jurusan'];
$username = $_POST['username'];
$password = $_POST['password'];
echo $nohp_ortu;

$core->editAkunSiswa1($id_siswa, $nama_lengkap, $no_hp, $tempat_lahir, $tanggal_lahir, $jenis_kelamin, $Alamat, $nama_ortu, $nohp_ortu, $sekolah, $nis, $jurusan, $username, $password);
