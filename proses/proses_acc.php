<?php 
	require("../core/core.php");
	$core = new Core();
	
	$id_j = $_GET['id_j'];

	mysqli_query($core->koneksi, "UPDATE tabel_isi_jurnal SET status = 'Disetujui' WHERE id = '$id_j'") or die(mysqli_error($core->koneksi));

	echo "<script> alert('Data Jurnal Berhasil Disetujui');
    window.location.href='../admin/daftar_siswa.php' </script>";
	
 ?>