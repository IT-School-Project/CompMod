<?php
session_start();

if (isset($_POST['password']) && isset($_POST['username'])){
  require '../config/dbconnect.php';
  $password = $_POST['password'];
  $username = $_POST['username'];

  $sql = "SELECT id, username, password FROM users WHERE username = \"$username\" AND password = SHA2(\"$password\",256)";
  $result = mysqli_query($conn, $sql);

  if(!$result){
    die( "login failed" );
    session_destroy();
  }
  if (mysqli_num_rows($result) == 1 ) {
    $row = mysqli_fetch_assoc($result);
    $_SESSION["username"] = $username;
    $_SESSION["userid"] = $row["id"];
  }
  else {
    $message = "num of rows returned: " . mysqli_num_rows($result) . ". In other words: Failed to sign in.";
    echo "<script type='text/javascript'>alert('$message');</script>";
    session_destroy();
  }
}

if (isset($_POST['logout'])){
  session_unset();
  session_destroy();
  #echo '<meta http-equiv="Refresh" content="0;" url ="'.$url.'" />';
}


if (!isset($_SESSION["userid"])){
  echo '
  <li class="nav-item">
    <form class="nav-form" method="POST">
      <input class="nav-input" type="text" name="username" id="inputUsername" placeholder="Username">
      <br>
      <input class="nav-input" type="password" name="password" id="inputPassword" placeholder="Password">
      <br>
      <input class="nav-button" type="submit" value="Log In">
    </form>
  </li>';
}
else {
  echo '
  <li class="nav-item">
    <form class="nav-form" method = "POST">
      <input type="hidden" name = "logout" value = "True">
      <input class="nav-button" type="submit" value="Sign out">
    </form>
  </li>';
}