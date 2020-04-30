<header>
    <section class="menu-btn">
        <section class="btn-line"></section>
        <section class="btn-line"></section>
        <section class="btn-line"></section>
    </section>
    
    <nav class="menu">
        <ul class="menu-nav">
            <li class="nav-item">
                <form action="" method="get" class="nav-form search-form">
                    <input type="text" name="search" class="nav-input" placeholder="Search">
                    <a class="nav-link" onclick="this.closest('form').submit();return false;"><i class="icon fa fa-search"></i></a>
                </form>
            </li>
            <li class="nav-item">
                <?php require 'user_handler.php';?>
            </li>
            <li class="nav-item">
                <form class="nav-form" action = "newitem.php" method = "POST">
                    <input type = "hidden" name = "new" value = "true">
                    <input class="nav-button sell-item" type = "submit" value = "Sell Item">
                </form>
            </li>
            <li class="nav-item">
                <a href="../php/store.php" class="nav-link link">Store</a>
            </li>
            <li class="nav-item">
                <a href="../php/sign_up.php" class="nav-link link">Sign up</a>
            </li>
            <li class="nav-item">
                <a href="../php/not_implemented.php" class="nav-link link">Contact</a>
            </li>
            <li class="nav-item">
                    <a href="../php/not_implemented.php" class="nav-link link">About</a>
            </li>
        </ul>
        <section class="menu-branding">
            <section class="favcon"></section>
        </section>
    </nav>
</header>