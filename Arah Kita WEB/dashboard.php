<?php 
session_start();

if (isset($_SESSION["login"]) === false) {
    header("location: login.php");
    exit;
}

// tampilkan data
require "functions.php";


// jika tombol cari ditekan


?>


<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<meta charset="utf-8" />
<title>CRM | Admin Dashboard</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta content="" name="description" />
<meta content="" name="author" />
    <link href="assets/plugins/jquery-metrojs/MetroJs.min.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="assets/plugins/shape-hover/css/demo.css" />
<link rel="stylesheet" type="text/css" href="assets/plugins/shape-hover/css/component.css" />
<link rel="stylesheet" type="text/css" href="assets/plugins/owl-carousel/owl.carousel.css" />
<link rel="stylesheet" type="text/css" href="assets/plugins/owl-carousel/owl.theme.css" />
<link href="assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="assets/plugins/jquery-slider/css/jquery.sidr.light.css" rel="stylesheet" type="text/css" media="screen"/>
<link rel="stylesheet" href="assets/plugins/jquery-ricksaw-chart/css/rickshaw.css" type="text/css" media="screen" >
<link rel="stylesheet" href="assets/plugins/Mapplic/mapplic/mapplic.css" type="text/css" media="screen" >
<link href="assets/plugins/boostrapv3/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/boostrapv3/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/animate.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/jquery-scrollbar/jquery.scrollbar.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/style.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/responsive.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/custom-icon-set.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/magic_space.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/leftbar.css" rel="stylesheet" type="text/css" />
       <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/plugins/morris.css" rel="stylesheet">

		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>     
</head>
<body class="">
<?php include("header.php");?>
<div class="page-container row"> 
  
      <?php include("leftbar.php");?>
    
      <div class="clearfix"></div>
      <!-- END SIDEBAR MENU -->
    </div>
  </div>
  <!-- BEGIN PAGE CONTAINER-->
  <div class="page-content">
    <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
    <div id="portlet-config" class="modal hide">
      <div class="modal-header">
        <button data-dismiss="modal" class="close" type="button"></button>
        <h3>Widget Settings</h3>
      </div>
      <div class="modal-body"> Widget settings form goes here </div>
    </div>
    <div class="clearfix"></div>
    <div class="content sm-gutter">
      <div class="page-title">
      </div>
	   <!-- BEGIN DASHBOARD TILES -->
	  <div class="row">	 
	
		<div class="col-md-3 col-vlg-3 col-sm-6">
			<div class="tiles blue m-b-10">
              <div class="tiles-body">
			  
              <div class="tiles-title text-black">User </div>
                
			         <div class="widget-stats">
                      <div class="wrapper transparent">
                      <?php $rt=mysqli_query($koneksi,"SELECT * FROM data_user") or die (mysqli_error($koneksi));
					    $rw=mysqli_num_rows($rt);?> 
						<span class="">Jumlah User</span>
                        <br> <?php echo $rw;?></span> 
					  </div>
                    </div>

			  </div>			
			</div>	
		</div>

    <div class="row">	 
		<div class="col-md-3 col-vlg-3 col-sm-6">
			<div class="tiles red m-b-10">
              <div class="tiles-body">
			  
              <div class="tiles-title text-black">Pengelola Wisata </div>
                
			         <div class="widget-stats">
                      <div class="wrapper transparent">
                      <?php $rt=mysqli_query($koneksi,"SELECT * FROM data_pengelola") or die (mysqli_error($koneksi));
					    $rw=mysqli_num_rows($rt);?> 
						<span class="">Jumlah Pengelola Wisata</span>
                        <br> <?php echo $rw;?></span> 
					  </div>
                    </div>

			  </div>			
			</div>	
		</div>

        <div class="row">	 
		<div class="col-md-3 col-vlg-3 col-sm-6">
			<div class="tiles green m-b-10">
              <div class="tiles-body">
			  
              <div class="tiles-title text-black">Wisata </div>
                
			         <div class="widget-stats">
                      <div class="wrapper transparent">
                      <?php $rt=mysqli_query($koneksi,"SELECT * FROM wisata") or die (mysqli_error($koneksi));
					    $rw=mysqli_num_rows($rt);?> 
						<span class="">Jumlah Wisata Terdaftar</span>
                        <br> <?php echo $rw;?></span> 
					  </div>
                    </div>

			  </div>			
			</div>	
		</div>
	
        <div class="row">	 
		<div class="col-md-3 col-vlg-3 col-sm-6">
			<div class="tiles white m-b-10">
              <div class="tiles-body">
			  
              <div class="tiles-title text-black">Transaksi </div>
                
			         <div class="widget-stats">
                      <div class="wrapper transparent">
                      <?php $rt=mysqli_query($koneksi,"SELECT * FROM transaksi") or die (mysqli_error($koneksi));
					    $rw=mysqli_num_rows($rt);?> 
						<span class="">Banyak Transaksi</span>
                        <br> <?php echo $rw;?></span> 
					  </div>
                    </div>

			  </div>			
			</div>	
		</div>
        
        
        
  
			
               
          
		  </div></div>
<!-- BEGIN CHAT --> 
	  
</div>
<script src="assets/plugins/jquery-1.8.3.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
<script src="assets/plugins/boostrapv3/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/plugins/breakpoints.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-unveil/jquery.unveil.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-block-ui/jqueryblockui.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-lazyload/jquery.lazyload.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js" type="text/javascript"></script>
<!-- END CORE JS FRAMEWORK -->
<!-- BEGIN PAGE LEVEL JS -->
<script src="assets/plugins/jquery-slider/jquery.sidr.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="assets/plugins/pace/pace.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-numberAnimate/jquery.animateNumbers.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-ricksaw-chart/js/raphael-min.js"></script>
<script src="assets/plugins/jquery-ricksaw-chart/js/d3.v2.js"></script>
<script src="assets/plugins/jquery-ricksaw-chart/js/rickshaw.min.js"></script>
<script src="assets/plugins/jquery-sparkline/jquery-sparkline.js"></script>
<script src="assets/plugins/skycons/skycons.js"></script>
<script src="assets/plugins/owl-carousel/owl.carousel.min.js" type="text/javascript"></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script src="assets/plugins/jquery-gmap/gmaps.js" type="text/javascript"></script>
<script src="assets/plugins/Mapplic/js/jquery.easing.js" type="text/javascript"></script>
<script src="assets/plugins/Mapplic/js/jquery.mousewheel.js" type="text/javascript"></script>
<script src="assets/plugins/Mapplic/js/hammer.js" type="text/javascript"></script>
<script src="assets/plugins/Mapplic/mapplic/mapplic.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-flot/jquery.flot.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-flot/jquery.flot.resize.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-metrojs/MetroJs.min.js" type="text/javascript" ></script>
<script src="assets/js/core.js" type="text/javascript"></script>
<script src="assets/js/chat.js" type="text/javascript"></script>
<script src="assets/js/demo.js" type="text/javascript"></script>
<script src="assets/js/dashboard_v2.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/highcharts.js"></script>
	<script type="text/javascript" src="js/exporting.js"></script>	
<script type="text/javascript">
        $(document).ready(function () {
            $(".live-tile,.flip-list").liveTile();
        });
</script>
</body>
</html>
