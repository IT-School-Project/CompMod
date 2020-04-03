<?php require '../config/dbconnect.php'?>
<?php require '../inc/header.php'?>
<body>
    <?php require '../inc/nav.php'?>
    <form action = "newitem.php" method = "POST">
        <input type = "hidden" name = "new" value = "true">
        <input type = "submit" value = "sell an item">
    </form>
    <?php require '../inc/script.php'?>
</body>
</html>
