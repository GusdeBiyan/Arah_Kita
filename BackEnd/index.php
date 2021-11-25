<?php

session_start();

if (isset($_SESSION["login"]) === false) {
    header("location: login.php");
    exit;
}

// tampilkan data
require "functions.php";
$wisata = tampil("SELECT * FROM wisata ORDER BY id DESC");

// jika tombol cari ditekan
if (isset($_POST["cari"])) {
    $wisata = cari($_POST["keyword"]);
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>halaman admin</title>
</head>

<body>

    <h1>Daftar Wisata</h1>

    <a class="btn btn-success btn-sm" href="tambah.php" role="button">Tambah Wisata</a> &emsp;
    <a class="btn btn-danger btn-sm" href="logout.php" role="button">Keluar</a>
    <br> <br>

    <form action="" method="POST" enctype="multipart/form-data">
        <input type="text" name="keyword" size="30" autofocus placeholder="Masukan kata kunci" autocomplete="off">
        <button type="submit" name="cari">Cari</button>
        <br><br>
    </form>

    <table border="1" cellpadding="10" cellspacing="0">

        <tr>
            
            <th>Nama</th>
            <th>Kategori</th>
            <th>Gambar</th>
            <th>Aksi</th>
        </tr>

        <?php $i = 1; ?>
        <?php foreach ($wisata as $row) : ?>
            <tr>
               
                <td><?= $row["nama"] ?></td>
                <td><?= $row["kategori"] ?></td>
                <td><img src="img/<?= $row["gambar"] ?>" width="110" height="70">
                <td>
                    <a class="btn btn-warning btn-sm" href="ubah.php?id= <?= $row['id'] ?>" role="button">Ubah</a> &emsp14;
                    <a class="btn btn-danger btn-sm" href="hapus.php?id= <?= $row['id'] ?>" role="button" onclick="
                    return confirm ('Anda yakin ingin menghapus?');">Hapus</a>
                </td>
            </tr>
            <?php $i++; ?>
        <?php endforeach; ?>
    </table>

</body>

</html>