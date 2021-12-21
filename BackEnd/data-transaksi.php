<?php

session_start();

if (isset($_SESSION["login"]) === false) {
    header("location: login.php");
    exit;
}

// tampilkan data
require "functions.php";




                    


?>


<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8" />
    <title>Admin | Data Wisata</title>
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
    <?php include("header.php"); ?>
    <div class="page-container row">

        <?php include("leftbar.php"); ?>

        <div class="clearfix"></div>
        <!-- END SIDEBAR MENU -->
    </div>
    </div>
    <div class="page-content">
        <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
        <div id="portlet-config" class="modal hide">
            <div class="modal-header">
                <button data-dismiss="modal" class="close" type="button"></button>
                <h3>Widget Settings</h3>

            </div>
            <div class="modal-body">Widget settings form goes here</div>
        </div>
        <div class="clearfix"></div>
        <div class="content">
            <ul class="breadcrumb">
                <li>
                    <p>YOU ARE HERE</p>
                </li>
                <li><a href="#" class="active">Riwayat Transaksi</a>
                </li>
            </ul>

            <div class="page-title">
                <i class="icon-custom-left"></i>
                <h3>Riwayat Transaksi  </h3>
               
                <div class="row ">
                    <div class="col-md-12">
                        <form method="post" class="form-inline" >
                            <input type="date" name="tgl_awal" class="form-control" >
                            <input type="date" name="tgl_akhir" class="form-control " >   
                            <button type= "submit" name="filter_tgl" class="btn btn-primary btn-xs "> Filter </button>     
                        </form>   
                     </div>
                </div>
            </div>

                 

            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="grid simple ">
                                <div class="grid-title no-border">
                                <?php    
                                if (isset($_POST['filter_tgl'])){
                                                $tgl_awal=mysqli_real_escape_string($koneksi,$_POST['tgl_awal']);
                                                $tgl_akhir=mysqli_real_escape_string($koneksi,$_POST['tgl_akhir']);
                                        echo "Periode Tanggal " .$tgl_awal. " s/d " .$tgl_akhir ;
                                }
                                ?>                
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
                                                <th>Aksi</th>

                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php
                                           $no=1;
                                           
                                           if (isset($_POST['filter_tgl'])){
                                                $tgl_awal=mysqli_real_escape_string($koneksi,$_POST['tgl_awal']);
                                                $tgl_akhir=mysqli_real_escape_string($koneksi,$_POST['tgl_akhir']);
                                                $query=mysqli_query($koneksi, "SELECT * FROM transaksi
                                                INNER JOIN wisata ON transaksi.id_wisata=wisata.id_wisata
                                                INNER JOIN data_user ON transaksi.id_user=data_user.id_user WHERE tgl_transaksi BETWEEN '$tgl_awal' AND '$tgl_akhir'
                                                ") or die (mysqli_error($koneksi));
                                           }else{
                                            $query=mysqli_query($koneksi, "SELECT * FROM transaksi
                                            INNER JOIN wisata ON transaksi.id_wisata=wisata.id_wisata
                                            INNER JOIN data_user ON transaksi.id_user=data_user.id_user 
                                            ") or die (mysqli_error($koneksi));
                                           }
                                         
                                            while ($data=mysqli_fetch_array($query)) {
                                           ?>

                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= $data["tgl_transaksi"] ?></td>
                                                    <td><?= $data["nama_user"] ?></td>
                                                    <td><?= $data["nama_wisata"] ?></td>
                                                    <td><?= $data["jumlah_tiket"] ?></td>
                                                    <td><?= $data["total_harga"] ?></td>
                                                    <td><?= $data["status"] ?></td>
                                                    <td>
                                                        <form name="abc" action="" method="post">
                                                           
                                                            <a class="btn btn-danger btn-xs btn-mini" href="hapus-transaksi.php?id=<?= $data['id_transaksi'] ?>" role="button" onclick="
                                                            return confirm ('Anda yakin ingin menghapus?\nData akan dihapus secara permanen');">Hapus</a>
                                                        </form>
                                                    </td>
                                                   
                                                </tr>
                                                <?php
                                            } ?>
                                           </tbody>    
                                    </table>
                                </div>
                                <a href="cetak-data-transaksi.php" class="btn btn-danger btn-xs ">
                                cetak <i class="glyphicon glyphicon-print"></i>
                                </a>
                            </div>
                        </div>
                        <!-- akhir tabel -->
                        <script src="assets/plugins/jquery-1.8.3.min.js" type="text/javascript"></script>
                        <script src="assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
                        <script src="assets/plugins/boostrapv3/js/bootstrap.min.js" type="text/javascript"></script>
                        <script src="assets/plugins/breakpoints.js" type="text/javascript"></script>
                        <script src="assets/plugins/jquery-unveil/jquery.unveil.min.js" type="text/javascript"></script>
                        <!-- END CORE JS FRAMEWORK -->
                        <!-- BEGIN PAGE LEVEL JS -->
                        <script src="assets/plugins/pace/pace.min.js" type="text/javascript"></script>
                        <script src="assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js" type="text/javascript"></script>
                        <script src="assets/plugins/jquery-block-ui/jqueryblockui.js" type="text/javascript"></script>
                        <script src="assets/plugins/jquery-sparkline/jquery-sparkline.js"></script>
                        <script src="assets/plugins/jquery-numberAnimate/jquery.animateNumbers.js" type="text/javascript"></script>
                        <!-- END PAGE LEVEL PLUGINS -->
                        <script>
                            //Too Small for new file - Helps the to tick all options in the table 
                            $('table .checkbox input').click(function() {
                                if ($(this).is(':checked')) {
                                    $(this).parent().parent().parent().toggleClass('row_selected');
                                } else {
                                    $(this).parent().parent().parent().toggleClass('row_selected');
                                }
                            });
                            // Demo charts - not required 
                            $('.customer-sparkline').each(function() {
                                $(this).sparkline('html', {
                                    type: $(this).attr("data-sparkline-type"),
                                    barColor: $(this).attr("data-sparkline-color"),
                                    enableTagOptions: true
                                });
                            });
                        </script>
                        <!-- BEGIN CORE TEMPLATE JS -->
                        <script src="assets/js/core.js" type="text/javascript"></script>
                        <script src="assets/js/chat.js" type="text/javascript"></script>
                        <script src="assets/js/demo.js" type="text/javascript"></script>

                        <!-- END CORE TEMPLATE JS -->
</body>

</html>
