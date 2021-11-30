<?php
session_start();
include("checklogin.php");
check_login();
include("dbconnection.php");


if(isset($_POST['submit']))
{
$nama=$_POST['nama'];
$kategori=$_POST['kategori'];
$deskripsi=$_POST['deskripsi'];
$lokasi=$_POST['lokasi'];
$harga_tiket=$_POST['harga_tiket'];
$gambar = upload();
    if ($gambar === false) {
        return false;
    }


	$ret=mysqli_query($con,"insert into wisata values ('','$nama','$kategori','$deskripsi','$lokasi','$harga_tiket','$gambar')");
	if($ret)
	{
	echo "<script>alert('Data Berhasil Ditambahkan');</script>";	
	}
	}

  function upload()
  {
      $namaFile = $_FILES["gambar"]["name"];
      $ukuranFile = $_FILES["gambar"]["size"];
      $error = $_FILES["gambar"]["error"];
      $tmpName = $_FILES["gambar"]["tmp_name"];
  
      // cek apakah gambar sudah diupload
      if ($error === 4) {
          echo "
              <script>
              alert('Silahkan upload gambar terlebih dahulu');
              </script>
              ";
          return false;
      }
  
      // cek apakah yang diupload adalah gambar
      $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
  
      // explode untuk memecah string menjadi array
      $ekstensiGambar = explode('.', $namaFile);
      $ekstensiGambar = strtolower(end($ekstensiGambar));
      if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
          echo " 
          <script>
          alert('Yang anda upload bukan gambar\\natau format gambar tidak didukung');
          </script>
          ";
          return false;
      }
  
      // cek jika ukuran terlalu besar
      if ($ukuranFile > 1000000) {
          echo "
          <script>
          alert('Ukuran gambar terlalu besar');
          </script>
          ";
          return false;
      }
  
      // lolos pengecekan dan gambar siap diupload
      // generate nama gambar baru
      $namaFileBaru = uniqid();
      $namaFileBaru .= ".";
      $namaFileBaru .= $ekstensiGambar;
  
      move_uploaded_file($tmpName, 'img/' . $namaFileBaru);
      return $namaFileBaru;
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
<link href="assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="assets/plugins/boostrapv3/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/boostrapv3/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/animate.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/jquery-scrollbar/jquery.scrollbar.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/style.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/responsive.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/custom-icon-set.css" rel="stylesheet" type="text/css"/>
</head>
<body class="">
<?php include("header.php");?>
<div class="page-container row-fluid">	
	<?php include("leftbar.php");?>
	<div class="clearfix"></div> 
  </div>
  </div>
  <a href="#" class="scrollup">Scroll</a>
   <div class="footer-widget">		
	<div class="progress transparent progress-small no-radius no-margin">
		<div data-percentage="79%" class="progress-bar progress-bar-success animate-progress-bar" ></div>		
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
                            <h3>Tambahkan Wisata</h3>
                     <table width="100%" border="0">
  <tr>
    <td height="42">Nama Wisata </td>
    <td><input type="text" name="nama" id="nama"  class="form-control" required></td>
  </tr>
  <tr>
    <td height="42">Kategori</td>
    <td><select name="kategori" class="form-control" required>
    <option value=""></option>
    <option value="Pantai">Pantai</option>
    <option value="Gunung">Gunung</option>
    <option value="Taman Nasional">Taman Nasional</option>
    <option value="Lainya">Lainnya</option>
    </select>
    </td>
  </tr>
  <tr>
    <td height="42">Deskripsi</td>
    <td><input type="text" name="deskripsi" id="deskripsi"  class="form-control" required></td>
  </tr>
  <tr>
    <td height="42">Lokasi</td>
    <td><input type="text" name="lokasi" id="lokasi" class="form-control" required></td>
  </tr>
  <tr>
    <td height="42">Harga Tiket</td>
    <td><input type="text" name="harga_tiket" id="harga_tiket"  class="form-control" required></td>
  </tr>
  <tr>
    <td height="42">Gambar</td>
    <td> <input type="file" name="gambar" id="gambar"   required></td>
  </tr>
  
  <tr>
    <td>&nbsp;</td>
    <td height="42">
                          <button type="submit" name="submit" class="btn btn-primary">Tambah Wisata</button></td>
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