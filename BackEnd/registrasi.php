<?php

require "functions.php";

if (isset($_POST["register"])) {
    if (registrasi($_POST) > 0) {
        echo "
        <script>
        alert('User baru berhasil ditambahkan');
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
    <title>registrasi</title>
</head>

<body>
    <h1>Halaman Registrasi</h1>
    <form action="" method="POST">
        <ul style="list-style: none;">
            <li>
                <label for="username">Username</label> <br>
                <input type="text" name="username" id="username" required>
            </li>
            <li>
                <label for="password">Password</label> <br>
                <input type="password" name="password" id="password" required>
            </li>
            <li>
                <label for="password2">Konfirmasi password</label> <br>
                <input type="password" name="password2" id="password2" required> <br><br>
            </li>
            <li>
                <button type="submit" name="register">Daftar</button> &emsp;&emsp;
            </li>
            <li>
                <p>Sudah punya akun? <a href="login.php">Masuk</a></p>
            </li>
        </ul>
    </form>

</body>

</html>