<?php
require 'function2.php';

if (isset($_POST["register"])) {

    if (regristrasi($_POST) > 0) {
        echo '<div style="z-index:100; height: 100vh; width:100%;top:0;left:0;position:absolute;background-color: rgba(0, 0, 0, 0.259);" class="container-fluid d-flex justify-content-center align-items-center
        ">
    <div class="card" style="animation: myAnim 2s ease 0s 1 normal forwards;">
      <div class="card" style="width: 18rem; height: 20rem;">

        <div class="card-body text-center">
          <div class="card-title d-flex justify-content-center"><img src="checked_190411.png"
              style="width:100px;height: 100px;" alt=""></div>
          <h1 class="card-text ">Thank You</h1>
          <p>Pendaftaran berhasil</p>
          <a href="login.php" class="btn btn-primary m-5">Okay</a>
        </div>
      </div>
    </div>
  </div>';
    } else {
        echo mysqli_error($conn);
    }
}


?>


<!DOCTYPE html>
<html lang="en">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

<head>
    <style>
        label {
            display: block;
        }

        @keyframes myAnim {
            0% {
                opacity: 0;
                transform: scale(0.6);
            }

            100% {
                opacity: 1;
                transform: scale(1);
            }
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman registrasi</title>
</head>

<body>
    <form method="post" id="myForm">
        <h1>Halaman Register</h1>
        <ul>
            <li>
                <label for="username">Username</label>
                <input type="text" name="username" id="username">
            </li>
            <li>
                <label for="password">Password</label>
                <input type="password" name="password" id="password">
            </li>
            <li>
                <label for="password2">Confirm Password</label>
                <input type="password" name="password2" id="password2">
            </li>
            <li>
                <button type="submit" name="register">Register!!!</button>
            </li>
        </ul>
    </form>
    <script>
        // setInterval(myFunction, 1000);


        // function myFunction() {
        //     document.getElementById("myForm").submit();
        // }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>