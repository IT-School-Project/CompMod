<nav class="navbar">
    <section class="dropdown">
        <a class="dd-menu"><i class="fa fa-bars"></i></a>
        <ul class="dropdown">
            <li><a href="">Home</a></li>
            <li><a href="../php/store.php">Store</a></li>
            <li><a href="">Wishlist</a></li>
            <li><a href="">Contact</a></li>
        </ul>
        <img class="logo" src="../img/logo.png" alt="">
    </section>
    
    <section class="search">
        <form action="" method="get" class="search-form">
            <input type="text" name="search" class="search-bar" placeholder="Search">
            <a onclick="this.closest('form').submit();return false;"><i class="icon fa fa-search"></i></a>
        </form>
    </section>
    <section>
        <ul class="navbar-right">
            <li><a class="button" href="../inc/user_handler.php">Login</a></li>
            <li><a class="button" href="../php/sign_up.php">Signup</a></li>
            <li><a href=""><i class="fa fa-shopping-basket"></i></a></li>
        </ul>
    </section>
</nav>