<?php
    $password = "51418348";
    $password_hash = password_hash($password, PASSWORD_DEFAULT);
    $password_becryp = password_hash($password, PASSWORD_BCRYPT);

    //echo($password_hash);
    echo($password_becryp);

    //Coaba verifikasi password

   $test02 = password_verify($password, $password_hash);
   
   if($test02 == true) {
      echo "<br> VALID password for the informed HASH!<br>"; 
      var_dump($test02);
   } else {
      echo "<br>INVALID password for the informed HASH!<br>";     
      var_dump($test02);    
   }
?>