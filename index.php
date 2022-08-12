<?php 
session_start();

if (!isset($_SESSION["username"]) ) {
  header("Location: login.php");
  exit;
}

require "admin/config.php";

?> 
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <!-- font style -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <title>Kursus </title>
  </head>
  <body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-info shadow fixed-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#"> Pendaftaran Kursus </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <!-- <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Daftar</a>
                </li> -->
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="logout.php">Logout</a>
                </li>
            </ul>
            </div>
        </div>
        </nav>
    </header>

    <section style="position: center;">
          <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active" data-bs-interval="10000">
            <img src="images/Html.jpg" class="d-block w-60" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <br/>
              <br/>
              <h5><b>Mari Ikuti Kursus Sekarang</b></h5>
              <p><b>Dengan Mengikuti kursus pada platform ini kalian akan dibimbing dengan mentor yang sudah profesional untuk 
                mengajarkan ada dalam segala hal baik dalam programing dan bidang lain yang dibutuhkan</b>
              </p>
            </div>
          </div>
      </div>
    </section>
   
    <div class="container mt-0">
      <div class="row">
        <div class="col-sm text-center">
          <h1 style="margin-top: 50px; font-weight: bold;">Daftar Kursus</span></h1>
        </div>
      </div>
      <div class="row">


      <div class="row">
      <?php 
  // Fetch all users data from database
    $result = mysqli_query($conn, "SELECT * FROM kursus");
    while($user_data = mysqli_fetch_array($result)) {
      ?>
          <div class="col-sm-6" style="margin-top: 10px;">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title"><?php echo $user_data['namakursus'] ?></h5>
                <a href="detail.php?id=<?php echo $user_data['id'] ?>" class="btn btn-primary">Detail Lebih</a>
                <!-- <a href="daftar.php" class="btn btn-primary">Detail Lebih</a> -->
              </div>
            </div>
          </div>
          <?php }?>
</div>

<!-- sampe sini akhirnya -->


    </div>
    </div>
    
    <br>
    <br>
    <br>
    

    <!-- Optional JavaScript; choose one of the two! -->
    <script type="text/javascript">window.$crisp=[];window.CRISP_WEBSITE_ID="607aff2b-f33e-454b-9c0f-41d39c41f6c0";(function(){d=document;s=d.createElement("script");s.src="https://client.crisp.chat/l.js";s.async=1;d.getElementsByTagName("head")[0].appendChild(s);})();</script>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
  </body>
</html>