<?php

session_start();

if (isset($_SESSION["login"]) === false) {
    header("location: login.php");
    exit;
}

// tampilkan data
require "functions.php";
$data_user = tampil("SELECT * FROM data_user ORDER BY id_user DESC");

// jika tombol cari ditekan
if (isset($_POST["cari"])) {
    $data_user = cari($_POST["keyword"]);
}

?>


<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8" />
    <title>Laporan Data User</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <link href="assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="assets/plugins/boostrapv3/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/boostrapv3/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/animate.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/jquery-scrollbar/jquery.scrollbar.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/style.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/custom-icon-set.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/leftbar.css" rel="stylesheet" type="text/css" />
</head>

<body class="">
    
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="grid simple ">
                                <div class="grid-title no-border">

                                   
                                </div>
                                <div class="grid-body no-border">

                                    <table class="table table-hover no-more-tables">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Nama </th>
                                                <th>NIK </th>
                                                <th>Email </th>
                                                <th>No.HP</th>
                                                <th>Password</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Tgl Lahir</th>
                                                <th>Alamat</th>
                                                <th>User Image</th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1; ?>
                                            <?php foreach ($data_user as $row) : ?>
                                                <tr>
                                                    <td><?= $row["id_user"] ?></td>
                                                    <td><?= $row["nama_user"] ?></td>
                                                    <td><?= $row["nik"] ?></td>
                                                    <td><?= $row["email"] ?></td>
                                                    <td><?= $row["no_hp"] ?></td>
                                                    <td><?= $row["password"] ?></td>
                                                    <td><?= $row["jenis_kelamin"] ?></td>
                                                    <td><?= $row["tgl_lahir"] ?></td>
                                                    <td><?= $row["alamat"] ?></td>
                                                    <td><img src="img/user/<?= $row["gambar"] ?>" width="110" height="70">
                                                   
                                                    
                                                </tr>
                                                <?php $i++; ?>
                                            <?php endforeach; ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- akhir tabel -->
                        
                         <script>
                        window.print();
                        </script>
                        <!-- BEGIN CORE TEMPLATE JS -->
                        

                        <!-- END CORE TEMPLATE JS -->
</body>

</html>