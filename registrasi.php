<?php
require("core/core.php");
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
    <link rel="stylesheet" href="css.css">
    <!------ Include the above in your HEAD tag ---------->

</head>

<body>
    <div class="container halamanregis">
        <h1 class="display-4 text-center" style="color:black; text-weight:bolder;">Registrasi Akun SIC Jurnal</h1>
        <div class="row">
            <div class="col-sm-2">
            </div>
            <div class="col-sm-8">
                <?php
                $core->formDaftar();
                ?>
            </div>
            <div class="col-sm-2">
            </div>
        </div>
    </div>

    <body>