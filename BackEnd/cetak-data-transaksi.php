<?php

session_start();

if (isset($_SESSION["login"]) === false) {
    header("location: login.php");
    exit;
}

// tampilkan data
require "functions.php";


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

     <center><h1> <b> LAPORAN DATA TRANSAKSI </b></h1></center>
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
                                                <th>No</th>
                                                <th>Tanggal Transaksi</th>
                                                <th>Nama Pembeli</th>
                                                <th>Nama Wisata </th>
                                                <th>Jumlah Tiket</th>
                                                <th>Total Harga</th>
                                                <th>Status</th>
                                              

                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php
                                           $no=1;
                                           $query= "SELECT * FROM transaksi
                                                    INNER JOIN wisata ON transaksi.id_wisata=wisata.id_wisata
                                                    INNER JOIN data_user ON transaksi.id_user=data_user.id_user
                                           " ;
                                            $sql= mysqli_query($koneksi,$query) or die (mysqli_error($koneksi));
                                            while ($data=mysqli_fetch_array($sql)) {
                                           ?>

                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= $data["tgl_transaksi"] ?></td>
                                                    <td><?= $data["nama_user"] ?></td>
                                                    <td><?= $data["nama_wisata"] ?></td>
                                                    <td><?= $data["jumlah_tiket"] ?></td>
                                                    <td><?= $data["total_harga"] ?></td>
                                                    <td><?= $data["status"] ?></td>
                                                    
                                                   
                                                </tr>
                                                <?php
                                            } ?>
                                           </tbody> 
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