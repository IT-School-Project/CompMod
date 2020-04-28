<script>    
    if(typeof window.history.pushState == 'function') {
        window.history.pushState({}, "Hide", '<?php echo $_SERVER['PHP_SELF'];?>');
    }
</script>

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
    echo "num of rows returned: " . mysqli_num_rows($result) . ". In other words: Failed to sign in.";
    session_destroy();
  }
}

if (isset($_GET['logout'])){
  session_unset();
  session_destroy();
  #echo '<meta http-equiv="Refresh" content="0;" url ="'.$url.'" />';
}


if (!isset($_SESSION["userid"])){
  echo '
  <form method="POST">
    <label for="inputUsername">Username</label>
    <input type="text" name="username" id="inputUsername">
    <label for="inputPassword">Password</label>
    <input type="password" name="password" id="inputPassword">
    <input type="submit">
  </form>';
}
else {
  echo '<form method = "GET">
  <input type="hidden" name = "logout" value = "True">
  <input type="submit" value="Sign out">
  </form>';
}
?>