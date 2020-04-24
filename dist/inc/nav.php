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

    <?php require '../config/dbconnect.php';?>
    
    <section class="popup">
        <section class="wrapper">
            <h2>Login</h2>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                <section class="form-group">>
                    <label>Username</label>
                    <input type="text" name="username" class="form-control">
                    <span class="help-block"></span>
                </section>
                <section class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control">
                    <span class="help-block"></span>
                </section>
                <section class="form-group">
                    <input type="submit" class="btn btn-primary" value="Login">
                </section>
                <p>Don't have an account? <a href="../php/sign_up.php">Sign up</a>.</p>
            </form>
            <a href="#" class="button">Login</a>
        </section>
    </section>
</nav>