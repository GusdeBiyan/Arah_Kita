<?php 
// koneksi database
include 'dbconnection.php';

// menangkap data id yang di kirim dari url
$id = $_GET['id'];


// menghapus data dari database
mysqli_query($con,"delete from wisata where id_wisata='$id'");

// mengalihkan halaman kembali ke index.php
header("location:data-wisata.php");

?>