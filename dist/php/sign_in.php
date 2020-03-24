<?php
session_start();

if (isset($_POST['password']) && isset($_POST['username'])){
  $password = $_POST['password'];
  $username = $_POST['username'];
  echo $password.$username;

  require '../config/dbconnect.php';
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
    echo "welcome " . $username . " with id: " . $_SESSION["userid"];
  }
  else {
    echo "num of rows returned: " . mysqli_num_rows($result) . ". In other words: Failed to sign in.";
    session_destroy();
  }
}


if (!isset($_SESSION["userid"])){
  echo '
  <form action="sign_in.php" method="POST">
    <label for="inputUsername">Username</label>
    <input type="text" name="username" id="inputUsername">
    <label for="inputPassword">Password</label>
    <input type="password" name="password" id="inputPassword">
    <input type="submit">
  </form>';
}
else {
  echo $_SESSION['userid'];
  echo '<form action = "sign_out.php">
  <input type="submit" value="Sign out">
  </form>';
}
?>