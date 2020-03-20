<?php 
  //settings
  $servername = "localhost:3307";
  $username = "root";
  $password = "";
  $dbname = "compmod";

  //open connection
  $conn = mysqli_connect(
    $servername, $username, $password, $dbname
  );
  
  mysqli_set_charset($conn, "utf-8");


  if(!$conn){
    die("Fatal error: connection to database could not be established");
  }
?>