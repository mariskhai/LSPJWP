<?php
session_start();

if (isset($_SESSION["login"]) ) {
    header("Location: index.php");
}

require "config.php";
if (isset($_POST["login"]) ) {
    // menangkap data username dan password
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM admin WHERE username = '$username'");

    // cek username
    if (mysqli_num_rows($result) === 1 ) {
        // cek password
        $row = mysqli_fetch_assoc($result);
        if ( password_verify($password, $row["password"]) ) {
            // set session
            $_SESSION["login"] = true;

            // perbolehkan user ke sistem
            header("Location: index.php");
            exit;
        }
    }

    $error = true;
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>Login - Admin</title>
  </head>
  <body>
  <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-info shadow fixed-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">Kursus Jewepe</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        </nav>
    </header>
  <div class="container mt-5">
        <div class="row">
            <div class="col-sm text-center" style="margin-top: 50px;">
            <h1>Halaman Login</h1>
            </div>
        </div>
    </div>

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-sm-6 offset-sm-3">
                <form action="" method="post" class="shadow-lg" style="background-color: #f3f4f5; padding: 30px; border-radius: 10px;">
                    <div class="mb-3">
                      <label for="username" class="form-label">Masukan Username</label>
                      <input type="text" name="username" class="form-control" id="username" autocomplete="off"> 
                    </div>
                    <div class="mb-3">
                      <label for="password" class="form-label">Masukan Passsword</label>
                      <input type="password" name="password" class="form-control" id="password"> 
                    </div>
                    <?php if(isset($error) ) : ?>
                            <p>Username atau Password salah !</p>
                    <?php endif; ?>
                    <button type="submit" name="login" class="btn btn-primary">masuk</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

  </body>
</html>