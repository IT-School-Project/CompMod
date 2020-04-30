<?php 
require '../inc/header.php';
require '../inc/nav.php';
require '../config/dbconnect.php';
$listing_id = $_GET['id'];
$sql = "SELECT l.name, l.price, l.date, l.description, l.img, u.first_name, u.surname, u.email, u.post_nr, u.address1
FROM listing l, users u
WHERE l.user = u.id
AND l.id = $listing_id"; 

$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$listing_name = $row['name'];
$listing_price = $row['price'];
$listing_desc = $row['description'];
$listing_date = $row['date'];
$listing_img = $row['img'];
$user_name = $row['first_name'] . " " . $row['surname'];
$user_email = $row['email'];
$user_post = $row['post_nr'];
$user_address = $row['address1'];

$sql = "SELECT p.name, c.category
FROM parts p, category c, xparts x
WHERE p.id = x.parts_id
AND $listing_id = x.listing_id
AND c.id = p.cat_id";
$result = mysqli_query($conn, $sql);
$parts = array();
$cats = array();

while($row = mysqli_fetch_array($result))
{
  array_push($parts,$row['name']);
  array_push($cats,$row['category']);
}

?>

<body>
  <h1 class = 'title'><?php echo $listing_name;?></h1>
  <img src='<?php echo $listing_img;?>' onerror='this.src="../img/placeholder.png"' alt='placeholder image'>
  <p class = 'date'><?php echo $listing_date?></p>
  <h4>Beskrivelse</h4>
  <p class = 'description'><?php echo $listing_desc;?></p>
  <h4 class = 'pris'>Pris</h4>
  <p><?php echo $listing_price;?>kr</p>
  <h2>Kontaktinformasjon: </h2>
  <ul>
    <li><p>Navn: <?php echo $user_name;?></p></li>
    <li><p>Postnummer: <?php echo $user_post;?><p></li>
    <li><p>Addresse: <?php echo $user_address;?><p></li>
    <li><p>Email: <?php echo $user_email;?></p></li>
  </ul>
  <h2>Deler: </h2>
  <ul>
    <?php 
    for ($i = 0; $i < count($parts); $i++){
      echo "<li><section class = 'category'>". $cats[$i] . ": </section><section class = 'part'>". $parts[$i]."</section></li>";
    }
    require '../config/dbdisconnect.php';
    ?>
  </ul>
</body>
</html>