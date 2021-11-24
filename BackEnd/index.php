<?php

session_start();

if (isset($_SESSION["login"]) === false) {
    header("location: login.php");
    exit;
}

// tampilkan data
require "functions.php";
$mahasiswa = tampil("SELECT * FROM wisata");

// jika tombol cari ditekan
if (isset($_POST["cari"])) {
    $mahasiswa = cari($_POST["keyword"]);
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>halaman admin</title>
</head>

<body>

    <h1>Daftar Wisata</h1>

    <a href="tambah.php">Tambahkan wisata</a> &emsp;
    <a href="logout.php" style="color: red;">Logout</a>
    <br> <br>

    <form action="" method="POST" enctype="multipart/form-data">
        <input type="text" name="keyword" size="30" autofocus placeholder="masukan kata kunci" autocomplete="off">
        <button type="submit" name="cari">Cari</button>
        <br><br>
    </form>

    <table border="1" cellpadding="10" cellspacing="0">

        <tr>
            <th>No.</th>
            <th>Nama</th>
            <th>Lokasi</th>
            <th>Gambar</th>
            <th>Aksi</th>
        </tr>

        <?php $i = 1; ?>
        <?php foreach ($mahasiswa as $row) : ?>
            <tr>
                <td><?= $i ?></td>
                <td><?= $row["nama"] ?></td>
                <td><?= $row["lokasi"] ?></td>
                <td><img src="img/<?= $row["gambar"] ?>" width="110" height="70">
                <td>
                    <a href="ubah.php?id=<?= $row["id"] ?>">Ubah</a>
                    <a style="color: red;" href="hapus.php?id=<?= $row["id"] ?>" onclick="
                    return confirm ('Anda yakin ingin dihapus?');">Hapus</a>
                </td>
            </tr>
            <?php $i++; ?>
        <?php endforeach; ?>
    </table>

</body>

</html>