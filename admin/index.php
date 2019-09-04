<?php
    session_start();
    if($_SESSION['role']!='admin'){
    header("Location: ../login.php");
    }else{
        header("Location: daftar_siswa.php");
    }
?>