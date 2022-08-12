<?php 
session_start();

if (!isset($_SESSION["login"]) ) {
  header("Location: login_admin.php");
  exit;
}
require "config.php";

if(isset($_POST['update']))
{	
    $id = $_POST['id'];
    
    $nama=$_POST['nama'];
    $waktu=$_POST['waktu'];

    // update user data
    $result = mysqli_query($conn, "UPDATE jadwal SET namakursus='$nama',waktu='$waktu' WHERE id=$id"); //perhatiin koneksi dan databasenya
    
    // Redirect to homepage to display updated user in list
    header("Location: jadwal_kursus.php");
    // echo '<script>alert("Hello! I am an alert box!!");</script>';
}

?>

<?php
$id = $_GET['id'];
 
// Fetech user data based on id
$result = mysqli_query($conn, "SELECT * FROM jadwal WHERE id=$id"); //perhatiin koneksi dan databasenya
 
while($user_data = mysqli_fetch_array($result))
{
    $nama = $user_data['namakursus'];
    $waktu = $user_data['waktu'];
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
                <a class="nav-link active" aria-current="page" href="jadwal_kursus.php">Jadwal</a>
                </li>
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="data_kursus.php">Jadwal Kursus</a>
                </li>
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php">Daftar mahasiswa</a>
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
      <div class="row">
        <div class="col-sm text-center">
          <h1 style="margin-top: 50px; font-weight: bold;">Edit <span style="color: #eb3464;">Kursus</span></h1>
        </div>
      </div>
     
    </div>
    <div class="container mt-5">
                <form action="" method="post" class="shadow-lg" style="background-color: #f3f4f5; padding: 30px; border-radius: 10px;">
                <div class="mb-3">
                <input type="hidden" name="id" value=<?php echo $_GET['id'];?>>
                      <select  name="nama" class="form-select" aria-label="Default select example">
                          <option value=<?php echo $nama;?>><?php echo $nama;?></option>
                          
                          <?php 
                          $result = mysqli_query($conn, "SELECT namakursus FROM kursus");
                          while($user_data = mysqli_fetch_array($result)) {
                            if($user_data['namakursus'] != $nama){
                          ?>
                          <option value=<?php echo $user_data['namakursus'];?>><?php echo $user_data['namakursus'];?></option>
                          <?php }}?>
                      </select>
                  </div>
                  <div class="mb-3">
                    <label for="kelas" class="form-label">Tanggal</label>
                    <input type="date" name="waktu" class="form-control" id="kelas" required value=<?php echo $waktu;?>> 
                  </div>
                  <!-- <button type="submit" name="submit" class="btn btn-danger">Selesai</button> -->
                  <input type="submit" name="update" class="btn btn-danger" value="Tambah">
                </form>
    </div>
    <br>
    <br>
    <!-- footer -->
    <footer >
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