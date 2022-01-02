<?php

session_start();

if (isset($_SESSION["login"]) === false) {
  header("location: login.php");
  exit;
}

require "functions.php";

// cek apakah tombol submit sudah ditekan
if (isset($_POST["submit"])) {

  // cek apakah data berhasil ditambah
  if (tambah_pengelola($_POST) > 0) {
    echo "
        <script>
        alert('Data berhasil ditambahkan');
        document.location.href = 'data-pengelola.php';
        </script>
        ";
  } else {
    echo "
        <script>
        alert('Data gagal ditambahkan');
        document.location.href = 'data-pengelola.php';
        </script>
        ";
  }
}

?>

<!DOCTYPE html>
<html>

<head>
  <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
  <meta charset="utf-8" />
  <title>Admin | Tambah Pengelola </title>
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
  <div class="page-container row-fluid">
    <?php include("leftbar.php"); ?>
    <div class="clearfix"></div>
  </div>
  </div>
  <a href="#" class="scrollup">Scroll</a>
  <div class="footer-widget">
    <div class="progress transparent progress-small no-radius no-margin">
      <div data-percentage="79%" class="progress-bar progress-bar-success animate-progress-bar"></div>
    </div>
    <div class="pull-right">
    </div>
  </div>
  <div class="page-content">
    <div id="portlet-config" class="modal hide">
      <div class="modal-header">
        <button data-dismiss="modal" class="close" type="button"></button>
        <h3>Widget Settings</h3>
      </div>
      <div class="modal-body"> Widget settings form goes here </div>
    </div>
    <div class="clearfix"></div>
    <div class="content">
      <div class="page-title">


        <form name="muser" method="post" action="" enctype="multipart/form-data">
          <h3>Tambahkan Pengelola</h3>
          <table width="100%" border="0">
            <tr>
              <td height="42">Nama Pengelola</td>
              <td><input type="text" name="nama_pengelola" id="nama_pengelola" class="form-control" required></td>
            </tr>
            
            <tr>
              <td height="42">NIK</td>
              <td><input type="text" name="nik_pengelola" id="nik_pengelola" class="form-control" required></td>
            </tr>
            <tr>
              <td height="42">Email</td>
              <td><input type="text" name="email" id="email" class="form-control" required></td>
            </tr>
            <tr>
              <td height="42">Password</td>
              <td> <input type="text" name="password" id="password" required></td>
            </tr>
            <tr>
              <td height="42">No.Hp</td>
              <td><input type="text" name="no_hp" id="no_hp" class="form-control" required></td>
            </tr>

            <tr>
              <td height="42">Wisata yang dikelola</td>
              <td><select type="text" name="nama_wisata" id="nama_wisata" class="form-control" required>
                    <option value=""></option>
                    <?php
                    $sql_wisata = mysqli_query($koneksi,"SELECT * FROM wisata ") ;
                     while($data_wisata=mysqli_fetch_array($sql_wisata)) {
                        echo '<option value="'.$data_wisata['id_wisata']. '">'.
                        $data_wisata['nama_wisata'].'</option>';

                    }

                    ?>
                </sselect>
            
            </td>
            </tr>

            <tr>
              <td>&nbsp;</td>
              <td height="42">
                <button type="submit" name="submit" class="btn btn-primary">Tambah Pengelola</button>
              </td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
          </table>

        </form>
      </div>
    </div>
  </div>
  </div>
  </div>
  <script src="assets/plugins/jquery-1.8.3.min.js" type="text/javascript"></script>
  <script src="assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
  <script src="assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
  <script src="assets/plugins/breakpoints.js" type="text/javascript"></script>
  <script src="assets/plugins/jquery-unveil/jquery.unveil.min.js" type="text/javascript"></script>
  <script src="assets/plugins/jquery-block-ui/jqueryblockui.js" type="text/javascript"></script>
  <script src="assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js" type="text/javascript"></script>
  <script src="assets/plugins/pace/pace.min.js" type="text/javascript"></script>
  <script src="assets/plugins/jquery-numberAnimate/jquery.animateNumbers.js" type="text/javascript"></script>
  <script src="assets/js/core.js" type="text/javascript"></script>
  <script src="assets/js/chat.js" type="text/javascript"></script>
  <script src="assets/js/demo.js" type="text/javascript"></script>

</body>

</html>