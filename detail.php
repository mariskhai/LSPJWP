<?php

use LDAP\Result;

session_start();

if (!isset($_SESSION["username"]) ) {
  header("Location: login_admin.php");
  exit;
}
require "admin/config.php";



?>

<?php
$id = $_GET['id'];
 
// Fetech user data based on id
$result = mysqli_query($conn, "SELECT * FROM kursus WHERE id=$id"); //perhatiin koneksi dan databasenya

while($user_data = mysqli_fetch_array($result))
{
    $nama = $user_data['namakursus'];
    $keterangan = $user_data['keterangan'];
    $waktu = $user_data['lama'];
}


if(isset($_POST['submit']))
{	
  $username = $_SESSION['username'];
  $dipilih = $nama;
  $waktu =$_POST['waktunya'];

  $result = mysqli_query($conn , "INSERT INTO daftar(namapeserta,dipilih,waktu) VALUES('$username','$dipilih','$waktu')");
    
    
    // Redirect to homepage to display updated user in list
    header("Location: index.php");
    // echo '<script>alert("Hello! I am an alert box!!");</script>';
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
    <!-- font style -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <title>Kursus Jewepe</title>
  </head>
  <body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-info shadow fixed-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">Kursus Jewepe</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="">Daftar</a>
                </li>
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="logout.php">Logout</a>
                </li>
            </ul>
            </div>
        </div>
        </nav>
    </header>
   
    <br>
    <br>
    <div class="container mt-5" >
    <?php echo "<h1>Selamat Datang, " . $_SESSION['username'] ."!". "</h1>"; ?>
                <form action="" method="post" class="shadow-lg" style="background-color: #f3f4f5; padding: 30px; border-radius: 10px;">
                    <h1>Kursus <?php echo $nama;?></h1>
                    <div class="mb-3">
                        <p><?php echo $keterangan;?></p>
                        <p>Lama Waktu <?php echo $waktu;?> jam</p>
                        <br>
                        <p>Pilih Tanggal</p>
                    </div>
                    <div class="mb-3">
                      
                        <select  name="waktunya" class="form-select" aria-label="Default select example">
                            <?php 
                            $result = mysqli_query($conn, "SELECT waktu FROM jadwal");
                            while($user_data = mysqli_fetch_array($result)) {
                            ?>
                            <option value=<?php echo $user_data['waktu'];?>><?php echo $user_data['waktu'];?></option>
                            <?php }?>
                        </select>
                       
                    </div>
                    <label for="formFileDisabled" class="form-label">Masukan KRS</label>
                        <input class="form-control" type="file" id="formFileDisabled"  />
                        <br>
                        <br>
                    <?php
                          $result2 = mysqli_query($conn, "SELECT * FROM daftar ");
                          $result3 = mysqli_query($conn, "SELECT * FROM kursus where id = 1 ");
                          $user_data3 = mysqli_fetch_array($result3);
                          while($user_data2 = mysqli_fetch_array($result2)) {
                            if($user_data2['namapeserta'] === $_SESSION['username']){
                              if($user_data2['status'] === 'menunggu' && $user_data3  ){
                                echo " 
                                <div class = alert alert-success role ='alert'>
                                  <p>menunggu persertujuan</p>
                                </div>";
                              }
                              else if($user_data2['status'] === 'Sudah Terverifikasi' && $user_data3 ){
                                echo " 
                                  <p>sudah disetujui</p>
                                ";
                              }
                              else{
                                echo '<button type="submit" name="submit" class="btn btn-danger">Daftar</button>';
                              }
                            }
                    }?>
                    <!-- <button type="submit" name="submit" class="btn btn-danger">Daftar</button> -->
                </form>
    </div>
    <br>
    <br>
    <!-- footer -->
    <!-- <footer>
        
        <div class="container-fluid" style >
            

            <div class="row">
                <div class="col-sm bg-dark p-3">
                    <p class="text-center text-white pt-2">©Copyright by Yan™</p>
                </div>
            </div>
        </div>
    </footer> -->
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