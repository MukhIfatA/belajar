<?php
session_start();
require 'function2.php';

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");
    if (empty($username) || empty($password)) {
        $error = true;
        echo '<script>alert("gagal")</script>';
    }

    if (mysqli_num_rows($result) === 1) {
        //cek pw
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {
            //set session 
            $_SESSION["login"] = true;
            header("Location: dasar.php");
            exit;
        }
    }
    $error = true;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <script src="
https://cdn.jsdelivr.net/npm/sweetalert2@11.10.0/dist/sweetalert2.all.min.js
"></script>
    <link href="
https://cdn.jsdelivr.net/npm/sweetalert2@11.10.0/dist/sweetalert2.min.css
" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat&family=Open+Sans&family=Poppins:wght@200;500&family=Roboto:wght@300&display=swap');

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 100vh;
            background-color: #F0F2F5;
            font-family: 'Poppins';
            color: white;
        }

        ul li {
            list-style: none;
        }

        .wrapper {

            padding: 20px;
            width: 10cm;
            /* height: 5cm; */
            height: 9cm;
            border: 2px white solid;
            background-color: white;
            color: black;
        }

        input {
            margin: 10px 10px 0 0px;
            margin-bottom: 20px;
            width: 100%;
            height: 2rem;
            border: 1px solid silver;
            outline: none;
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>

<body>
    <div class="wrapper">
        <p>Login ke daftar siswa</p>
        <form action="" method="post">
            <div class="input-box">
                <label for="username">Username</label>
                <input class="form-control" type="text" id="username" name="username">
            </div>
            <div class="input-box">
                <label for="password">password</label>
                <input class="form-control" type="password" id="password" name="password">
            </div>
            <button style="width: 100%;" class="btn btn-success" type="submit" name="login">Login</button>
        </form>
        <a href="regristasi.php">Registrasi</a>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>

</html>