<?php

session_start();

if (isset($_SESSION["login"]) === false) {
  header("location: login.php");
  exit;
}

require "functions.php";

// ambil data di URL
$id = $_GET["id"];

// query data wisata berdasarkan id
$data_user = tampil("SELECT * FROM data_user WHERE id_user = $id")[0];

// cek apakah tombol submit sudah ditekan
if (isset($_POST["submit"])) {

  // cek apakah data berhasil diubah
  if (ubah_wisatawan($_POST) > 0) {
    echo "
        <script>
        alert('Data berhasil diubah');
        document.location.href = 'data-user.php';
        </script>
        ";
  } else {
    echo "
        <script>
        alert('Data gagal diubah');
        document.location.href = 'data-user.php';
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
  <title>CRM | Dashboard </title>
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

        <h3> <?= $data_user['nama_user'] ?>'s Profile</h3>

        <form action="" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="gambarLama" value="<?= $data_user['gambar'] ?>">

          <table width="100%" border="0">

            <tr>
              <td height="42">ID </td>
              <td><input type="text" name="id" value="<?= $data_user['id_user'] ?>" class="form-control" readonly></td>

            </tr>
            <tr>
              <td height="42"> Nama </td>
              <td> <input type="text" name="nama_user" id="nama_user" required value="<?= $data_user['nama_user'] ?>" class="form-control" readonly> </td>
            </tr>
           
            <tr>
              <td height="42"> Email </td>
              <td> <input type="text" name="email" id="email" required value="<?= $data_user['email'] ?>" class="form-control" readonly> </td>
            </tr>
            <tr>
              <td height="42"> Password </td>
              <td> <input type="text" name="password" id="password" required value="<?= $data_user['password'] ?>" class="form-control" readonly> </td>
            </tr>
            <tr>
              <td height="42"> No.HP </td>
              <td> <input type="text" name="no_hp" id="no_hp" required value="<?= $data_user['no_hp'] ?>" class="form-control" readonly> </td>
            </tr>
            <tr>
            <td height="42"> Jenis Kelamin </td>
              <td> <input type="text" name="jenis_kelamin" id="jenis_kelamin" required value="<?= $data_user['jenis_kelamin'] ?>" class="form-control" readonly> </td>
           

            <tr>
            <tr>
              <td height="42"> Tanggal Lahir </td>
              <td> <input type="text" name="tgl_lahir" id="tgl_lahir" required value="<?= $data_user['tgl_lahir'] ?>"  class="form-control" readonly > </td>
            </tr>
            <tr>
              <td height="42"> Alamat </td>
              <td> <input type="text" name="alamat" id="alamat" required value="<?= $data_user['alamat'] ?>" class="form-control" readonly> </td>
            </tr>
           
           
           
          </table>
        </form>

        <body>

        </body>

</html>