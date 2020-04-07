<?php
session_start();

if (isset($_POST['password']) && isset($_POST['username'])){
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
?>

<nav class="navbar">
    <section class="dropdown">
        <a class="dd-menu"><i class="fa fa-bars"></i></a>
        <ul class="dropdown_list">
            <li class="list-item"><a href="">Home</a></li>
            <li class="list-item"><a href="../php/store.php">Store</a></li>
            <li class="list-item"><a href="">Wishlist</a></li>
            <li class="list-item"><a href="">Contact</a></li>
        </ul>
        <img class="logo" src="../img/logo.png" alt="">
    </section>
    
    <section class="search">
        <form action="" method="get" class="search-form">
            <input type="text" name="search" class="search-bar" placeholder="Search">
            <a onclick="this.closest('form').submit();return false;"><i class="icon fa fa-search"></i></a>
        </form>
    </section>
    <section class="nav-outer">
        <section class="table">
            <ul class="navbar-right">
                <li class="login"><a id="button" href="#">Login</a></li>
                <li class="signup"><a class="button" href="../php/sign_up.php">Sign up</a></li>
                <li class="cart"><a href=""><i class="fa fa-shopping-basket"></i></a></li>
            </ul>
        </section>
    </section>
    
    <?php
    if (!isset($_SESSION['logout'])){
        echo
        '
        <section class="popup">
            <section class="popup-content">
                <img src="../img/cross.png" alt="" class="close">
                <img src="../img/user.png" alt="User" class="user">
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
                <a class="button">Login</a>
            </section>
        </section>
        ';
    }
    else {
        echo 
        '
        <form method = "GET">
            <input type="hidden" name = "logout" value = "True">
            <input type="submit" value="Sign out">
        </form>
        ';
    }
    ?>
    <script src="../js/login.js"></script>
</nav>