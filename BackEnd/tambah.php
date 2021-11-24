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
    if (tambah($_POST) > 0) {
        echo "
        <script>
        alert('Data berhasil ditambahkan');
        document.location.href = 'index.php';
        </script>
        ";
    } else {
        echo "
        <script>
        alert('Data gagal ditambahkan');
        document.location.href = 'index.php';
        </script>
        ";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tambah wisata</title>
</head>

<h1>Tambahkan wisata</h1>

<form action="" method="post" enctype="multipart/form-data">
    <ul style="list-style: none;">
        <li>
            <label for="nama">Nama &emsp;&nbsp;:</label>
            <input type="text" name="nama" id="nama" required>
            <br><br>
        </li>
        <li>
            <label for="lokasi">Lokasi &emsp;:</label>
            <input type="lokasi" name="lokasi" id="lokasi" required>
            <br><br>
        </li>
        <li>
            <label for="gambar">Gambar &nbsp;&nbsp;:</label>
            <input type="file" name="gambar" id="gambar" required>
            <br><br>
        </li>
        <li>
            <button type="submit" name="submit">Tambah data wisata</button>
        </li>
    </ul>
</form>

<body>

</body>

</html>