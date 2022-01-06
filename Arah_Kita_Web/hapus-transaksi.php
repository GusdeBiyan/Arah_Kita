<?php

session_start();

if (isset($_SESSION["login"]) === false) {
    header("location: login.php");
    exit;
}

require "functions.php";

$id = $_GET["id"];

if (hapus_transaksi($id) > 0) {
    echo "
        <script>
        alert('Data berhasil dihapus');
        document.location.href = 'data-transaksi.php';
        </script>
        ";
} else {
    echo "
        <script>
        alert('Data gagal dihapus');
        document.location.href = 'data-transaksi.php';
        </script>
        ";
}