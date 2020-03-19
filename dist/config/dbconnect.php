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
  // check connection
  if (!$conn) {
    die("connection to database failed");
  }
?>