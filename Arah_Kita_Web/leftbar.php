 <?php



  if (isset($_SESSION["login"]) === false) {
    header("location: login.php");
    exit;
  }

  ?>

 <!-- BEGIN SIDEBAR -->
 <div class="page-sidebar" id="main-menu">
   <!-- BEGIN MINI-PROFILE -->
   <div class="page-sidebar-wrapper scrollbar-dynamic" id="main-menu-wrapper">
      <div class="user-info-wrapper">
        
        <div class="user-info">
          <div class="greeting">Welcome</div>
          <div class="username">Admin</div>

        </div>
      </div>
  
      
     
     <!-- END MINI-PROFILE -->

     <!-- BEGIN SIDEBAR MENU -->
     <br>
     <br>

     <ul>
     <li>
         <a href="dashboard.php"><span class="icon-custom-home"></span> Dashboard</a>
       </li>
       <li>
         <a href="index.php"><span class="fa fa-map-marker">&nbsp;&nbsp;</span> Data Wisata</a>
       </li>
       <li>
         <a href="data-user.php"><span class="fa fa-users"></span> Data User </a>
       </li>
       <li>
         <a href="data-pengelola.php"><span class="fa fa-users"></span> Data Pengelola Wisata </a>
       </li>
       <li>
         <a href="data-transaksi.php"><span class="fa fa-ticket"></span> Riwayat Transaksi</a>
       </li>
       <li>
         <a href="registrasi.php"><span class="fa fa-users"></span> Tambah Admin</a>
       </li>
       
       <br>
       <br>
       <br>
       <br>
       <br>
      

       <li><a href="logout.php"><span class="fa fa-power-off"></span>&nbsp;&nbsp;Log Out</a></li>
     </ul>