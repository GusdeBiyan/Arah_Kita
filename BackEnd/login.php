<?php

session_start();

require "functions.php";

// cek cookie
if (isset($_COOKIE["x"]) && isset($_COOKIE["y"])) {
    $id = $_COOKIE["x"];
    $key = $_COOKIE["y"];

    // ambil username berdasarkan id
    $result = mysqli_query($koneksi, "SELECT username FROM admin 
    WHERE id = '$id'");
    $row = mysqli_fetch_assoc($result);

    // cek cookie dan username
    if ($key === hash("sha512", $row["username"])) {
        $_SESSION["login"] = true;
    }
}


if (isset($_SESSION["login"])) {
    header("location: dashboard.php");
    exit;
}


if (isset($_POST["login"])) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($koneksi, "SELECT * FROM admin
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
                setcookie("x", $row["id"], time() + 300);
                setcookie("y", hash("sha512", $row["username"]), time() + 300);
            }

            header("location: dashboard.php");
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

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="assets/css/login.css">

</head>

<body>
    <section class="contact">

        <div class="image">
            <img src="bg/arahkita-2.png" alt="">
        </div>


        <form action="" method="POST">

            <h1 class="heading">Welcome to Arah Kita</h1>

            <?php if (isset($error)) : ?>
                <i style="color: red;">Username atau password salah</i>
            <?php endif; ?>


            <ul style="list-style: none;">
                <div class="inputBox">
                    <li>
                        <input type="text" name="username" id="username" placeholder="Username"> <br><br>
                    </li>
                </div>

                <div class="inputBox">
                    <li>
                        <input type="password" name="password" id="password" placeholder="Password"> <br><br>
                    </li>
                </div>

                <li>
                    <input type="checkbox" name="remember" id="remember">
                    <label for="remember">Ingat saya</label> <br><br>
                </li>
                <li>
                    <button type="submit" name="login" class="btn_login">Masuk</button>
                </li>
                
            </ul>
        </form>

    </section>
</body>

</html>