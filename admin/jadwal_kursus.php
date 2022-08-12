<!-- index buat yang admin -->
<?php
session_start();

if (!isset($_SESSION["login"]) ) {
  header("Location: login_admin.php");
  exit;
}

require "config.php";



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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />

    <title>Kursus Admin</title>
  </head>
  <body>
  <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-info shadow fixed-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">Kursus</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="jadwal_kursus.php">Jadwal</a>
                </li>
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="data_kursus.php">Data Kursus</a>
                </li>
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php">Daftar mahasiswa</a>
                </li>
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="laporan.php">Verifikasi Peserta</a>
                </li>
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="logout.php">Logout</a>
                </li>
            </ul>
            </div>
        </div>
        </nav>
    </header>
   
    <div class="container mt-5">
      <a class="btn btn-primary"  style="margin-top: 50px; font-weight: bold;"href="jadwal_kursus_tambah.php" role="button">Tambah</a>
      <div class="row">
        <div class="col-sm text-center">
          <h1 style="margin-top: 5px; font-weight: bold;">Jadwal Kursus</h1>
          
        </div>
        
        
        <table class="table">
            
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nama Kursus</th>
      <th scope="col">Waktu Kursus</th>
      <th scope="col">Update</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
  <?php 
  // Fetch all users data from database
    $result = mysqli_query($conn, "SELECT * FROM jadwal ORDER BY id DESC");
    $no=1;
    while($user_data = mysqli_fetch_array($result)) {
      ?>
    <tr>
      <td><?php echo $no++ ?></td>
      <td><?php echo $user_data['namakursus'] ?></td>
      <td><?php echo $user_data['waktu'] ?></td>
      <td><a class="btn btn-primary" href="jadwal_kursus_edit.php?id=<?php echo $user_data['id'] ?>" role="button"><i class="fa fa-pencil-square" aria-hidden="true"></i></a></td>
      <td><a class="btn btn-danger" href="jadwal_kursus_delete.php?id=<?php echo $user_data['id'] ?>" role="button"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
    </tr>
    <?php }?>
  </tbody>
</table>

      </div>
    </div>


     

<!-- sampe sini akhirnya -->


    </div>
    </div>
    
    <br>
    <br>
    <br>
    <!-- footer -->
    <footer>
        
        <div class="container-fluid" style="  position: absolute;
  bottom: 0;
  width: 100%;
  height: 50px;" >
            

            <div class="row">
                <div class="col-sm bg-dark p-3">
                    <p class="text-center text-white pt-2"></p>
                </div>
            </div>
        </div>
    </footer>
    <!-- akhir footer -->

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