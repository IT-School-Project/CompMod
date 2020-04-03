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
                <li class="login"><a class="button" href="../inc/user_handler.php">Login</a></li>
                <li class="signup"><a class="button" href="../php/sign_up.php">Sign up</a></li>
                <li class="cart"><a href=""><i class="fa fa-shopping-basket"></i></a></li>
            </ul>
        </section>
    </section>
</nav>