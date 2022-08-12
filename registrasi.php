<?php
// Include config file
require_once "admin/config.php";
 
// Define variables and initialize with empty values
$npm = $password = $confirm_password = "";
$npm_err = $password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["npm"]))){
        $username_err = "Silahkan masukan NPM";
    } elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["npm"]))){
        $username_err = "NPM hanya terdiri dari letters, numbers, dan underscores.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM mahasiswa WHERE npm = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_npm);
            
            // Set parameters
            $param_npm = trim($_POST["npm"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $npm_err = "NPM ini sudah terdaftar";
                } else{
                    $npm = trim($_POST["npm"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "silahkan masukan password";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password harus memiliki minimal 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "password tidak sesuai.";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO users (npm, password) VALUES (?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_npm, $param_password);
            
            // Set parameters
            $param_npm = $npm;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: login.php");
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
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

    <title>Website Jewepe</title>
  </head>
  <body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-sm text-center">
            <h1>Registrasi</h1>
            </div>
        </div>
    </div>

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-sm-6 offset-sm-3">
                <form action="" method="post">
                    <div class="mb-3">
                      <label for="npm" class="form-label">NPM</label>
                      <input type="text" name="npm" class="form-control <?php echo (!empty($npm_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $npm; ?>">
                      <span class="invalid-feedback"><?php echo $npm_err; ?></span> 
                    </div>
                    <div class="mb-3">
                      <label for="password" class="form-label">password</label>
                      <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
                    </div>
                    <div class="mb-3">
                      <label for="confirm_password" class="form-label">Konfirmasi Password</label>
                      <input type="password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>">
                <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
                    </div>
                    <button type="submit" name="register" class="btn btn-primary">Daftar</button>
                </form>
            </div>
        </div>
    </div>
    </div>
            <p>Already have an account? <a href="login.php">Login here</a>.</p>
        </form>
    </div> 
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->

  </body>
</html>
