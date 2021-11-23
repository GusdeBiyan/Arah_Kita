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
$mhs = query("SELECT * FROM wisata WHERE id = $id")[0];

// cek apakah tombol submit sudah ditekan
if (isset($_POST["submit"])) {

    // cek apakah data berhasil diubah
    if (ubah($_POST) > 0) {
        echo "
        <script>
        alert('data berhasil diubah');
        document.location.href = 'index.php';
        </script>
        ";
    } else {
        echo "
        <script>
        alert('data gagal diubah');
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
    <title>ubah wisata</title>
</head>

<h1>Ubah data wisata</h1>

<form action="" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $mhs['id'] ?>">
    <input type="hidden" name="gambarLama" value="<?= $mhs['gambar'] ?>">

    <ul style="list-style: none;">
        <li>
            <label for="nama">Nama &emsp;&nbsp;:</label>
            <input type="text" name="nama" id="nama" required value="<?= $mhs['nama'] ?>">
            <br><br>
        </li>
        <li>
            <label for="lokasi">Lokasi &emsp;:</label>
            <input type="lokasi" name="lokasi" id="lokasi" required value="<?= $mhs['lokasi'] ?>">
            <br><br>
        </li>
        <li>
            <label for="gambar">Gambar &nbsp;&nbsp;:</label> <br>
            <img src="img/<?= $mhs['gambar']; ?>" alt="gambar user" width="110" height="70"> <br>
            <input type="file" name="gambar" id="gambar" value="<?= $mhs['gambar'] ?>">
            <br><br>
        </li>
        <li>
            <button type="submit" name="submit">Ubah data wisata</button>
        </li>
    </ul>
</form>

<body>

</body>

</html>