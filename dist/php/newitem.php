<?php 
session_start();
require '../config/dbconnect.php';

if(isset($_SESSION['userid']) && isset($_POST['title']) && isset($_POST['price']) && isset($_POST['description']) && is_numeric($_POST['price'])){
  $userid = $_SESSION['userid'];
  $title = $_POST['title'];
  $price = $_POST['price'];
  $description = $_POST['description'];

  echo $userid.$title.$price.$description;

  $sql = "INSERT INTO listing(name,price,date,description,user) VALUES ('$title', $price, NOW(), '$description', $userid)";
  $result = mysqli_query($conn, $sql);
}

else{
  echo "you entered wrong values.";
}
require '../inc/header.php';
?>
<body>
  <?php require '../inc/nav.php'?>
  <form method = "POST">
    <label for="inputTitle">Title</label>
    <input 
      id="inputTitle"
      name="title"
      type="text"
      placeholder="Grab some attention"
    >
    <label for="inputPrice">Price</label>
    <input 
      id="inputPrice"
      name="price"
      type="text"
      placeholder="A fair price"
    >
    <label for="inputDescription">Description</label>
    <textarea rows="4" cols="50" 
      id="inputDescription"
      name="description"
      type="text"
      placeholder="Make them trust you"
    ></textarea>
    <input type = "submit">
  </form>
  <?php require '../inc/script.php'?>
</body>
</html>