<?php

session_start();

if (isset($_SESSION["login"]) === false) {
    header("location: login.php");
    exit;
}

// tampilkan data
require "functions.php";
$wisata = tampil("SELECT * FROM wisata ORDER BY id_wisata DESC");

// jika tombol cari ditekan
if (isset($_POST["cari"])) {
    $wisata = cari($_POST["keyword"]);
}

?>


<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8" />
    <title>Laporan Data Wisata</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    
    <link href="assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/animate.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/jquery-scrollbar/jquery.scrollbar.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/style.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/custom-icon-set.css" rel="stylesheet" type="text/css" />
   
    <link href="assets/css/cetak.css" rel="stylesheet" type="text/css" />
</head>
    <div id="header-image">
        <img  alt="" class="header-image " src="bg/cetak-logo.png">
     </div>

     <center><h1> <b> LAPORAN DATA WISATA </b></h1></center>
    <hr>

<body class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="grid simple ">
                                <div class="grid-title no-border">
                              
                                    
                                <div class="grid-body no-border">

                                    <table class="table table-hover no-more-tables">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Nama Wisata</th>
                                                <th>Kategori </th>
                                                <th>Deskripsi </th>
                                                <th>Lokasi</th>
                                                <th>Harga Tiket</th>
                                                <th>Gambar</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1; ?>
                                            <?php foreach ($wisata as $row) : ?>
                                                <tr>
                                                    <td><?= $row["id_wisata"] ?></td>
                                                    <td><?= $row["nama_wisata"] ?></td>
                                                    <td><?= $row["kategori"] ?></td>
                                                    <td><?= $row["deskripsi"] ?></td>
                                                    <td><?= $row["lokasi"] ?></td>
                                                    <td><?= $row["harga_tiket"] ?></td>
                                                    <td><img src="img/wisata/<?= $row["gambar"] ?>" alt="gambar wisata" width="110" height="70">
                                                    
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
                        
                        <!-- END CORE TEMPLATE JS -->
</body>

</html>