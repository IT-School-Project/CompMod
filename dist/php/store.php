<?php require '../config/dbconnect.php'

session_start();

$query = 'SELECT * FROM listing';
$result = mysqli_query($conn, $query);

$listings = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_free_result($result);

?>
<?php require '../inc/header.php'?>
<body>
    <?php require '../inc/nav.php'?>
    <form action = "newitem.php" method = "POST">
        <input type = "hidden" name = "new" value = "true">
        <input type = "submit" value = "sell an item">
    </form>
    <h1 class="store-head">Lisitngs</h1>
    <?php foreach($listings as $listing) : ?>
    <section class="well">
        <h3><?php echo $listing['name']; ?></h3>
        <small>Created on <?php echo $listing['date']; ?> by <?php echo $listing['author']; ?></small>
        <p><?php echo $listing['body'] ?></p>
    </section>
    <?php require '../inc/script.php'?>
</body>
</html>
<?php require '../config/dbdisconnect.php'?>