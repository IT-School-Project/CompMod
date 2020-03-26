<?php 
  //settings
  $servername = "localhost:3307";
  $dbusername = "root";
  $dbpassword = "";
  $dbname = "compmod";

  //open connection
  $conn = mysqli_connect(
    $servername, $dbusername, $dbpassword, $dbname
  );
  
  mysqli_set_charset($conn, "utf-8");


  if(!$conn){
    die("Fatal error: connection to database could not be established");
  }
?>