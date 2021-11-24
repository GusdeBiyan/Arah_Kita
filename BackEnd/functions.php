<?php

// koneksi ke database
$server = "localhost";
$username = "root";
$password = "";
$db = "project";

$koneksi = mysqli_connect($server, $username, $password, $db);

// fungsi tampil
function tampil($query)
{
    global $koneksi;
    $result = mysqli_query($koneksi, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

// fungsi tambah
function tambah($data)
{
    global $koneksi;
    // ambil data dari tiap elemen dalam form
    // htmlspecialchars() supaya tidak disusupi script
    $nama = htmlspecialchars($data["nama"]);
    $lokasi = htmlspecialchars($data["lokasi"]);

    // upload gambar
    $gambar = upload();
    if ($gambar === false) {
        return false;
    }

    // query
    $query = "INSERT INTO wisata VALUES
     ('', '$nama', '$lokasi', '$gambar')";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

// fungsi upload
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
            alert('Silahkan upload gambar');
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
        alert('Yang anda upload bukan gambar/format gambar yang anda masukan salah');
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

// fungsi hapus
function hapus($id)
{
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM wisata WHERE id = $id");
    return mysqli_affected_rows($koneksi);
}

// fungsi ubah
function ubah($data)
{
    global $koneksi;
    $id = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $lokasi = htmlspecialchars($data["lokasi"]);
    $gambarLama = htmlspecialchars($data["gambarLama"]);

    // cek apakah users pilih gambar baru
    if ($_FILES["gambar"]["error"] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }


    // query
    $query = "UPDATE wisata SET
        nama = '$nama',
        lokasi = '$lokasi',
        gambar = '$gambar'
            WHERE id = $id
        ";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

// fungsi cari
function cari($keyword)
{
    $query = "SELECT * FROM wisata 
    WHERE
    nama LIKE '%$keyword%' OR 
    lokasi LIKE '%$keyword%'";

    return tampil($query);
}

// fungsi registrasi
function registrasi($data)
{
    global $koneksi;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($koneksi, $data["password"]);
    $password2 = mysqli_real_escape_string($koneksi, $data["password2"]);

    // cek username yang sudah ada
    $result = mysqli_query($koneksi, "SELECT username FROM users WHERE username = '$username'");
    if (mysqli_fetch_assoc($result)) {
        echo "
        <script>
        alert('Username sudah digunakan');
        </script>
        ";
        return false;
    }

    // cek konfirmasi password
    if ($password !== $password2) {
        echo "
        <script>
        alert('Konfirmasi password tidak sesuai');
        </script>
        ";
        return false;
    }

    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // tambahkan data ke database
    mysqli_query($koneksi, "INSERT INTO users VALUES('','$username', '$password')");
    return mysqli_affected_rows($koneksi);
}
