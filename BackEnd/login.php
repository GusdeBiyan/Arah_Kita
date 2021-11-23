<?php

session_start();

require "functions.php";

// cek cookie
if (isset($_COOKIE["id"]) && isset($_COOKIE["key"])) {
    $id = $_COOKIE["id"];
    $key = $_COOKIE["key"];

    // ambil username berdasarkan id
    $result = mysqli_query($koneksi, "SELECT username FROM users 
    WHERE id = '$id'");
    $row = mysqli_fetch_assoc($result);

    // cek cookie dan username
    if ($key === hash("sha512", $row["username"])) {
        $_SESSION["login"] = true;
    }
}


if (isset($_SESSION["login"])) {
    header("location: index.php");
    exit;
}


if (isset($_POST["login"])) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($koneksi, "SELECT * FROM users
     WHERE username = '$username'");

    // cek username
    if (mysqli_num_rows($result) === 1) {

        // cek password
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {

            // set session
            $_SESSION["login"] = true;

            // cek remember me
            if (isset($_POST["remember"])) {

                // buat cookie
                setcookie("id", hash("sha512", $row["id"]), time() + 300);
                setcookie("key", hash("sha512", $row["username"]), time() + 300);
            }

            header("location: index.php");
            exit;
        }
    }
    $error = true;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>

<body>
    <h1>Halaman login</h1>

    <?php if (isset($error)) : ?>
        <i style="color: red;">Username atau password salah</i>
    <?php endif; ?>

    <form action="" method="POST">
        <ul style="list-style: none;">
            <li>
                <label for="username">Username :</label>
                <input type="text" name="username" id="username"> <br><br>
            </li>
            <li>
                <label for="password">Password :</label>
                <input type="password" name="password" id="password"> <br><br>
            </li>
            <li>
                <input type="checkbox" name="remember" id="remember">
                <label for="remember">Ingat saya</label> <br><br>
            </li>
            <li>
                <button type="submit" name="login">Masuk</button>
            </li>
            <li>
                <p>Belum punya akun? <a href="registrasi.php">Daftar</a></p>
            </li>
        </ul>
    </form>
</body>

</html>