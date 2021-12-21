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
                <li><a href="#" class="active">Data User</a>

                </li>
            </ul>
            <div class="page-title"> <i class="icon-custom-left"></i>
                <h3>Data User </h3>
                
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="grid simple ">
                                <div class="grid-title no-border">
                                <form class="form-inline" action="" method="post">
                                        <div class="form-group">
                                            <input type="text" name="cari" placeholder="cari">
                                        </div>  
                                        <div class="form-group">
                                            <button type="submit" name="search" class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                                        </div> 
                                    </form>

                                   
                                
                                <div class="grid-body no-border">

                                    <table class="table table-hover no-more-tables">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Nama </th>
                                                <th>Email </th>
                                                <th>No.HP</th>
                                                <th>User Image</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                                $wisata = mysqli_query($koneksi,"SELECT * FROM data_user ")or die (mysqli_error($koneksi));
                                            
                                                if (isset($_POST['search'])){
                                                    $cari= $_POST["cari"];
                                                    $wisata = mysqli_query($koneksi,"SELECT * FROM data_user
                                                             WHERE nama_user LIKE '%$cari%'") or die (mysqli_error($koneksi));

                                                }else{
                                                    $wisata = mysqli_query($koneksi,"SELECT * FROM data_user ")or die (mysqli_error($koneksi));
                                                }
                                            
                                            
                                                while ($row=mysqli_fetch_array($wisata)){ 
                                            ?>
                                                <tr>
                                                    <td><?= $row["id_user"] ?></td>
                                                    <td><?= $row["nama_user"] ?></td>
                                                    <td><?= $row["email"] ?></td>
                                                    <td><?= $row["no_hp"] ?></td>
                                                    <td><img src="img/user/<?= $row["gambar"] ?>" width="110" height="70">
                                                    <td>
                                                        <form name="abc" action="" method="post">
                                                            <a class="btn btn-primary btn-xs btn-mini" href="ubah-user.php?id=<?= $row['id_user'] ?>" role="button">Edit</a>
                                                            <a class="btn btn-danger btn-xs btn-mini" href="hapus-user.php?id=<?= $row['id_user'] ?>" role="button" onclick="
                                                            return confirm ('Anda yakin ingin menghapus?\nData akan dihapus secara permanen');">Hapus</a>
                                                        </form>
                                                    </td>
                                                    </form>
                                                </tr>
                                                <?php
                                            } ?>
                                    </table>
                                </div>
                                <div class="grid-title no-border">
                                <a href="cetak-data-user.php" class="btn btn-danger btn-xs ">
                                cetak <i class="glyphicon glyphicon-print"></i>
                                </a>

                                   
                                </div>
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