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
    <title>Admin</title>
 <!-- font awesome cdn link  -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

 <!-- custom css file link  -->
 <link rel="stylesheet" href="style.css">

</head>
<body>
    <section class="contact" id="contact">

        <div class="image">
            <img src="arahkita-2.png" alt="">
        </div>
    
        <form action="" method="POST">
    
            <h1 class="heading">Welcome to Arah Kita</h1>
    
            <div class="inputBox">
                <input type="text" name="username" id="username">
                <label>Username</label>
            </div>
    
            <div class="inputBox">
                <input type="password" name="password" id="password">
                <label>Password</label>
            </div>
    
            <button type="submit" name="login" class="btn_login">Login</button>
    
        </form>
    
    </section>
</body>
</html>