<?php

require("../core/core.php");
$core = new Core();

$id_j = $_POST['id_j'];
$tanggal = date('Y-m-d');
$jam_mulai = $_POST['jam_mulai'];
$jam_selesai = $_POST['jam_selesai'];
$gambar = $_POST['gambar'];
$uraian = $_POST['uraian'];

$core->editJurnalSiswa($id_j, $tanggal, $jam_mulai, $jam_selesai, $gambar, $uraian);
