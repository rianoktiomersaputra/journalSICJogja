<?php 
    session_start();
    require("../core/core.php");
    $core = new Core();
    $tmp = $_FILES['gambar']['tmp_name'];
	$foto = $_FILES['gambar']['name'];
	$foto_baru = date('dmYHis');
	$path = "../upload/".$foto_baru;
    $id_siswa = $_SESSION['id_siswa'];
    $tanggal = date('Y-m-d');
	$jam_mulai = $_POST['jam_mulai'];
	$jam_selesai = $_POST['jam_selesai'];
	$uraian = $_POST['uraian'];
	$gambar = $_POST['gambar'];
	
	if(move_uploaded_file($tmp, $path)){
		$sql = mysqli_query($core->koneksi,"INSERT INTO tabel_isi_jurnal (id_siswa, tanggal, jam_mulai, jam_selesai, uraian, gambar, status) VALUES ('$id_siswa','$tanggal','$jam_mulai','$jam_selesai','$uraian','$foto_baru', 'Proses')");
		$id = mysqli_query($core->koneksi, "SELECT id_siswa FROM siswa WHERE id_siswa = '$id_siswa' ");
	    $hasil = mysqli_fetch_array($id_siswa);
	    $hasilid = $hasil['id_siswa'];
		if($sql){
			echo "berhasil";
			header("Location: ../siswa/tabel_siswa.php?id_siswa=$hasilid");
		}else{
			echo "Tambah data gagal";
		}
	} else {
		echo "<script> alert('Gambar harus diupload');
    	window.location.href='../siswa/form_isi_jurnal.php' </script>";
	}

    
?>