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
    session_start();

    if(isset($_SESSION['userid']) && $_SESSION['userid'] === true) {
        header('location: ../php/store.php');
        exit;
    }

    require '../config/dbconnect.php';

    $username = $password = '';
    $username_err = $password_err = '';

    if($_SERVER["REQUEST_METHOD"] == 'POST'){
 
        // Check if username is empty
        if(empty(trim($_POST['username']))){
            $username_err = 'Please enter username';
        } else{
            $username = trim($_POST['username']);
        }
        
        // Check if password is empty
        if(empty(trim($_POST['password']))){
            $password_err = 'Please enter your password.';
        } else{
            $password = trim($_POST['password']);
        }
        
        // Validate credentials
        if(empty($username_err) && empty($password_err)){
            $sql = 'SELECT id, username, password FROM users WHERE username = ?';
            
            if($stmt = mysqli_prepare($link, $sql)){
                mysqli_stmt_bind_param($stmt, 's', $param_username);
                
                $param_username = $username;
                
                if(mysqli_stmt_execute($stmt)){
                    mysqli_stmt_store_result($stmt);
                    
                    if(mysqli_stmt_num_rows($stmt) == 1){                    
                        mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                        if(mysqli_stmt_fetch($stmt)){
                            if(password_verify($password, $hashed_password)){
                                session_start();
                                
                                $_SESSION['userid'] = true;
                                $_SESSION['id'] = $id;
                                $_SESSION['username'] = $username;                            
                                
                                header('location: ../php/store.php');
                            } else{
                                $password_err = 'The password you entered was not valid';
                            }
                        }
                    } else{
                        $username_err = 'No account found with that username';
                    }
                } else{
                    echo 'Something went wrong. Please try again later';
                }
                mysqli_stmt_close($stmt);
            }
        }
        mysqli_close($link);
    }
    ?>
    
    <section class="popup">
        <section class="wrapper">
            <h2>Login</h2>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                <section class="form-group" <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>>
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                    <span class="help-block"><?php echo $username_err; ?></span>
                </section>
                <section class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control">
                    <span class="help-block"><?php echo $password_err; ?></span>
                </section>
                <section class="form-group">
                    <input type="submit" class="btn btn-primary" value="Login">
                </section>
                <p>Don't have an account? <a href="../php/sign_up.php">Sign up</a>.</p>
            </form>
        </section>
    </section>
</nav>