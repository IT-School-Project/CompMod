<?php require '../config/dbconnect.php';
require '../inc/header.php';

$sql = "SELECT l.id, l.name, l.price, l.img, u.post_nr, u.address1
FROM listing l, users u
WHERE l.user = u.id
ORDER BY l.date";
$result = mysqli_query($conn,$sql);
?>
<body>
    <?php require '../inc/nav.php'?>
    <form action = "newitem.php" method = "POST">
        <input type = "hidden" name = "new" value = "true">
        <input type = "submit" value = "sell an item">
    </form>
    <?php
    while ($row = mysqli_fetch_array($result)){
        echo "
        <a href = 'listing.php?id=".$row['id']."'>
        <section class = 'listing'>
            <h3>".$row['name']."</h3>
            <img src='".$row['img']."' onerror='this.src=\"../img/placeholder.png\"' alt='placeholder image' height = '200' width = '200'>
            <p class = 'price'>" .$row['price']."kr</p>
            <p class = 'address'>".$row['post_nr'].", ".$row['address1']."</p>
        </section>
        </a>";
    }
    ?>
    <?php require '../inc/script.php'?>
</body>
</html>