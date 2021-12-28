<?php

// koneksi ke database
$server = "localhost";
$username = "u1694897_d_reg_2";
$password = "jtipolije";
$db = "u1694897_d_reg_2_db";

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

// fungsi tambah wisata
function tambah($data)
{
    global $koneksi;
    // ambil data dari tiap elemen dalam form
    // htmlspecialchars() supaya tidak disusupi script
    $nama_wisata = htmlspecialchars($data["nama_wisata"]);
    $kategori = htmlspecialchars($data["kategori"]);
    $deskripsi = htmlspecialchars($data["deskripsi"]);
    $lokasi = htmlspecialchars($data["lokasi"]);
    $harga_tiket = htmlspecialchars($data["harga_tiket"]);

    // upload gambar wisata
    $gambar = upload();
    if ($gambar === false) {
        return false;
    }

    // query
    $query = "INSERT INTO wisata VALUES
     ('', '$nama_wisata','$kategori','$deskripsi','$lokasi', '$gambar','$harga_tiket')";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

// fungsi upload gambar wisata
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
            alert('Silahkan upload gambar terlebih dahulu');
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
        alert('Yang anda upload bukan gambar\\natau format gambar tidak didukung');
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

    move_uploaded_file($tmpName, 'img/wisata/' . $namaFileBaru);
    return $namaFileBaru;
}

// fungsi hapus wisata
function hapus($id)
{
    global $koneksi;

    $result = mysqli_query($koneksi, "SELECT gambar FROM wisata WHERE id_wisata = $id");
    $target = mysqli_fetch_assoc($result);
    $lokasiFile = "img/wisata/" . $target["gambar"];

    if (file_exists($lokasiFile)) {
        unlink($lokasiFile);
    }

    mysqli_query($koneksi, "DELETE FROM wisata WHERE id_wisata = $id");
    return mysqli_affected_rows($koneksi);
}

// fungsi ubah wisata
function ubah($data)
{
    global $koneksi;
    $id = $data["id"];
    $nama_wisata = htmlspecialchars($data["nama_wisata"]);
    $lokasi = htmlspecialchars($data["lokasi"]);
    $kategori = htmlspecialchars($data["kategori"]);
    $deskripsi = htmlspecialchars($data["deskripsi"]);
    $harga_tiket = htmlspecialchars($data["harga_tiket"]);
    $gambarLama = htmlspecialchars($data["gambarLama"]);

    // cek apakah users pilih gambar baru
    if ($_FILES["gambar"]["error"] === 4) {
        $gambar = $gambarLama;
    } else {
        // hapus gambar lama dan ganti dengan gambar baru
        $lokasiFile = "img/wisata/" . $gambarLama;

        if (file_exists($lokasiFile)) {
            unlink($lokasiFile);
        }
        $gambar = upload();
    }


    // query
    $query = "UPDATE wisata SET
        nama_wisata = '$nama_wisata',
        lokasi = '$lokasi',
        kategori = '$kategori' ,
        deskripsi = '$deskripsi',
        harga_tiket = '$harga_tiket',
        gambar = '$gambar'
            WHERE id_wisata = $id
        ";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

// fungsi cari wisata
function cari($keyword)
{
    $query = "SELECT * FROM wisata 
    WHERE
    nama LIKE '%$keyword%' OR 
    kategori LIKE '%$keyword%'";

    return tampil($query);
}

//fungsi upload gambar wisatawan
function upload_wisatawan()
{
    $namaFile = $_FILES["gambar"]["name"];
    $ukuranFile = $_FILES["gambar"]["size"];
    $error = $_FILES["gambar"]["error"];
    $tmpName = $_FILES["gambar"]["tmp_name"];

    // cek apakah gambar sudah diupload
    if ($error === 4) {
        echo "
            <script>
            alert('Silahkan upload gambar terlebih dahulu');
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
        alert('Yang anda upload bukan gambar\\natau format gambar tidak didukung');
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

    move_uploaded_file($tmpName, 'img/user/' . $namaFileBaru);
    return $namaFileBaru;
}

function hapus_wisatawan($id)
{
    global $koneksi;

    $result = mysqli_query($koneksi, "SELECT gambar FROM data_user WHERE id_user = $id");
    $target = mysqli_fetch_assoc($result);
    $lokasi = "img/user/" . $target["gambar"];

    if (file_exists($lokasi)) {
        unlink($lokasi);
    }

    mysqli_query($koneksi, "DELETE FROM data_user WHERE id_user = $id");
    return mysqli_affected_rows($koneksi);
}

// fungsi ubah wisatawan
function ubah_wisatawan($data)
{
    global $koneksi;
    $id = $data["id"];
    $nama_user = htmlspecialchars($data["nama_user"]);
    $nik = htmlspecialchars($data["nik"]);
    $email = htmlspecialchars($data["email"]);
    $no_hp = htmlspecialchars($data["no_hp"]);
    $password = htmlspecialchars($data["password"]);
    $jenis_kelamin = htmlspecialchars($data["jenis_kelamin"]);
    $tgl_lahir = htmlspecialchars($data["tgl_lahir"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $gambarLama = htmlspecialchars($data["gambarLama"]);

    // cek apakah users pilih gambar baru
    if ($_FILES["gambar"]["error"] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload_wisatawan();
    }


    // query
    $query = "UPDATE data_user SET
        nama_user = '$nama_user',
        nik = '$nik',
        email = '$email' ,
        no_hp = '$no_hp',
        password = '$password',
        jenis_kelamin = '$jenis_kelamin',
        tgl_lahir = '$tgl_lahir',
        alamat = '$alamat',
        gambar = '$gambar'

            WHERE id_user = $id
        ";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

//fungsi tambah pengelola
function tambah_pengelola($data)
{
    global $koneksi;
    // ambil data dari tiap elemen dalam form
    // htmlspecialchars() supaya tidak disusupi script
    $nama_wisata = htmlspecialchars($data["nama_wisata"]);
    $nik_pengelola = htmlspecialchars($data["nik_pengelola"]);
    $nama_pengelola = htmlspecialchars($data["nama_pengelola"]);
    $email = htmlspecialchars($data["email"]);
    $no_hp = htmlspecialchars($data["no_hp"]);
    $password = htmlspecialchars($data["password"]);

    

    // query
    $query = "INSERT INTO data_pengelola (id_pengelola,id_wisata,nik_pengelola,nama_pengelola,email,no_hp, password )  VALUES
     ('', '$nama_wisata','$nik_pengelola','$nama_pengelola','$email','$no_hp', '$password')";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}


//fungi hapus data pengelola
function hapus_pengelola($id)
{
    global $koneksi;


    mysqli_query($koneksi, "DELETE FROM data_pengelola WHERE id_pengelola = $id");
    return mysqli_affected_rows($koneksi);
}

//fungsi ubah data pengelola
function ubah_pengelola($data)
{
    global $koneksi;

    $id = $data["id"];
    $nama_wisata = htmlspecialchars($data["nama_wisata"]);
    $nik_pengelola = htmlspecialchars($data["nik_pengelola"]);
    $nama_pengelola = htmlspecialchars($data["nama_pengelola"]);
    $email = htmlspecialchars($data["email"]);
    $no_hp = htmlspecialchars($data["no_hp"]);
    $password = htmlspecialchars($data["password"]);




    // query
    $query = "UPDATE data_pengelola SET
        
        nik_pengelola = '$nik_pengelola',
        nama_pengelola = '$nama_pengelola',
        email = '$email' ,
        no_hp = '$no_hp',
        password = '$password'
       

            WHERE id_pengelola = $id
        ";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

//fungsi hapus transaksi
function hapus_transaksi($id)
{
    global $koneksi;


    mysqli_query($koneksi, "DELETE FROM transaksi WHERE id_transaksi = $id");
    return mysqli_affected_rows($koneksi);
}

// fungsi registrasi admin
function registrasi($data)
{
    global $koneksi;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($koneksi, $data["password"]);
    $password2 = mysqli_real_escape_string($koneksi, $data["password2"]);

    // cek username yang sudah ada
    $result = mysqli_query($koneksi, "SELECT username FROM admin WHERE username = '$username'");
    if (mysqli_fetch_assoc($result)) {
        echo "
        <script>
        alert('Username sudah digunakan');
        </script>
        ";
        return false;
    }

    // cek minimal username
    if (strlen($username) < 5) {
        echo "
        <script>
        alert('Username minimal 5 karakter');
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

    // cek minimal karakter password
    if (strlen($password) < 8) {
        echo "
        <script>
        alert('Password minimal 8 karakter');
        </script>
        ";
        return false;
    }

    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // tambahkan data ke database
    mysqli_query($koneksi, "INSERT INTO admin VALUES('','$username', '$password')");
    return mysqli_affected_rows($koneksi);
}
