<?php
// include database connection file
include_once("config.php");
 
// Get id from URL to update that user
$id = $_GET['id'];
 
// update user row from table based on given id
$result = mysqli_query($conn, "UPDATE daftar  SET Status = 'Sudah Terverifikasi' WHERE id=$id");

$result2 = mysqli_query($conn, "UPDATE mahasiswa  SET status = 'sudah' WHERE id=$id");

// After Update redirect to Home, so that latest user list will be displayed.
header("Location:laporan.php");
?>