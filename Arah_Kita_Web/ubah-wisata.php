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
$wisata = tampil("SELECT * FROM wisata WHERE id_wisata = $id")[0];

// cek apakah tombol submit sudah ditekan
if (isset($_POST["submit"])) {

  // cek apakah data berhasil diubah
  if (ubah($_POST) > 0) {
    echo "
        <script>
        alert('Data berhasil diubah');
        document.location.href = 'index.php';
        </script>
        ";
  } else if (ubah($_POST) == 0) {
    echo "
        <script>
        alert('Data tidak diubah');
        document.location.href = 'index.php';
        </script>
        ";
  } else {
    echo "
        <script>
        alert('Data gagal diubah');
        document.location.href = 'index.php';
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

        <h3> <?= $wisata['nama_wisata'] ?>'s Profile</h3>

        <form action="" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="gambarLama" value="<?= $wisata['gambar'] ?>">

          <table width="100%" border="0">

            <tr>
              <td height="42">ID </td>
              <td><input type="text" name="id" value="<?= $wisata['id_wisata'] ?>" class="form-control" readonly></td>

            </tr>
            <tr>
              <td height="42"> Nama Wisata </td>
              <td> <input type="text" name="nama_wisata" id="nama_wisata" required value="<?= $wisata['nama_wisata'] ?>" class="form-control"> </td>
            </tr>
            <tr>
              <td height="42">Kategori </td>
              <td><select name="kategori">
                  <option value="<?= $wisata['kategori'] ?>"><?= $wisata['kategori'] ?> </option>
                  <option value="Pantai">Pantai</option>
                  <option value="Gunung">Gunung</option>
                  <option value="Taman Nasional">Taman Nasional</option>
                  <option value="Lainya">Lainnya</option>
                </select>
              </td>

            <tr>
              <td height="42"> Deskripsi </td>
              <td> <input type="text" name="deskripsi" id="deskripsi" required value="<?= $wisata['deskripsi'] ?>" class="form-control"> </td>
            </tr>

            <tr>
              <td height="42"> Lokasi </td>
              <td> <input type="text" name="lokasi" id="lokasi" required value="<?= $wisata['lokasi'] ?>" class="form-control"> </td>
            </tr>
            <tr>
              <td height="42"> Harga Tiket </td>
              <td> <input type="text" name="harga_tiket" id="Harga_tiket" required value="<?= $wisata['harga_tiket'] ?>" class="form-control"> </td>
            </tr>
            <tr>
              <td>Gambar &nbsp;&nbsp; </td>
              <td> <img src="img/wisata/<?= $wisata['gambar']; ?>" alt="gambar wisata" width="110" height="70">
                <input type="file" name="gambar" id="gambar" value="<?= $wisata['gambar'] ?>">
              <td>

            </tr>
            <tr>
              <td>&nbsp;</td>
              <td height="42">
                <button type="submit" class="btn btn-primary" name="submit">Ubah data wisata</button>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
          </table>
        </form>

        <body>

        </body>

</html>