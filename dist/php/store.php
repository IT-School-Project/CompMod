<?php require_once '../config/dbconnect.php';
require '../inc/header.php';

if(isset($_GET['search'])){
    $search = $_GET['search'];
    $sql = "SELECT l.id, l.name, l.price, l.img, u.post_nr, u.address1
    FROM listing l, users u
    WHERE l.user = u.id
    AND l.name LIKE '%$search%'
    ORDER BY l.date DESC 
    LIMIT 16";
}
else{
    $sql = "SELECT l.id, l.name, l.price, l.img, u.post_nr, u.address1
    FROM listing l, users u
    WHERE l.user = u.id
    ORDER BY l.date DESC 
    LIMIT 16";
}
$listings = mysqli_query($conn,$sql);
?>
<body class="store-body">
    <?php require '../inc/nav.php'?>
    <section class="space"></section>
    <section class="container">
        <section class="item">
            <?php
            while ($row = mysqli_fetch_array($listings)){
                echo "
                    <section class = 'listing'>
                        <a href = 'listing.php?id=".$row['id']."'>
                            <h3>".$row['name']."</h3>
                            <img src='".$row['img']."' onerror='this.src=\"../img/placeholder.png\"' alt='placeholder image' height = '200' width = '200'>
                            <p class = 'price'>Pris: ".$row['price']."kr</p>
                            <p class = 'address'>Addresse: ".$row['post_nr'].", ".$row['address1']."</p>
                        </a>
                    </section>";
            }
            ?>
        </section>
        </a>
    <?php require '../inc/script.php';
    require '../config/dbdisconnect.php';?>
</body>
</html>