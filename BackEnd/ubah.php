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
$wisata = tampil("SELECT * FROM wisata WHERE id = $id")[0];

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
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ubah wisata</title>
</head>

<h1>Ubah data wisata</h1>

<form action="" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="gambarLama" value="<?= $wisata['gambar'] ?>">

    <ul style="list-style: none;">
        <li>
            <label for="id">ID &emsp;&emsp;:</label>
            <input type="text" name="id" value="<?= $wisata['id'] ?>" readonly>
            <br><br>
        </li>
        <li>
            <label for="nama">Nama &emsp;&nbsp;:</label>
            <input type="text" name="nama" id="nama" required value="<?= $wisata['nama'] ?>">
            <br><br>
        </li>
        <li>
            <label for="kategori">Kategori &emsp;&nbsp;:</label>
            <input type="text" name="kategori" id="kategori" required value="<?= $wisata['kategori'] ?>">
            <br><br>
        </li>
        <li>
            <label for="deskripsi">Deskripsi &emsp;&nbsp;:</label>
            <input type="text" name="deskripsi" id="deskripsi" required value="<?= $wisata['deskripsi'] ?>">
            <br><br>
        </li>
        <li>
            <label for="lokasi">Lokasi &emsp;:</label>
            <input type="lokasi" name="lokasi" id="lokasi" required value="<?= $wisata['lokasi'] ?>">
            <br><br>
        </li>
        <li>
            <label for="gambar">Gambar &nbsp;&nbsp;:</label> <br>
            <img src="img/<?= $wisata['gambar']; ?>" alt="gambar user" width="110" height="70"> <br>
            <input type="file" name="gambar" id="gambar" value="<?= $wisata['gambar'] ?>">
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