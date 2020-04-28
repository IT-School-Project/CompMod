<?php


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
            <form method="post">
                <fieldset class="username">
                    <legend>Username:</legend>
                    <input type="text" placeholder="TheLegend27" name="username" id="inputUsername">
                </fieldset>
                <fieldset class="password">
                    <legend>Password:</legend>
                    <input type="password" placeholder="Hunter2" name="password" id="inputPassword">
                </fieldset>
            </form>
            <a href="#" class="button">Login</a>
        </section>
    </section>';
}
else {
  echo '<form method = "GET">
  <input type="hidden" name = "logout" value = "True">
  <input type="submit" value="Sign out">
  </form>';
}
?>