<?php 
require '..\config\dbconnect.php';

if (( 
isset($_POST['username']) && 
isset($_POST['epost']) && 
isset($_POST['first_name']) && 
isset($_POST['surname']) && 
isset($_POST['post_nr']) && 
isset($_POST['address']) && 
isset($_POST['img'])) && 

is_numeric($_POST['post_nr'])){



  $username = $_POST['username'];
  $epost = $_POST['epost'];
  $name = $_POST['first_name'];
  $password = $_POST['password'];
  $post_nr = $_POST['post_nr'];
  $surname = $_POST['surname']; 
  $address = $_POST['address']; 
  $img = $_POST['img'];


  if (isset($_POST['address2'])){
    $address2 = $_POST['address2'];
    $sql = "INSERT INTO users(username,password,email,first_name,surname,address1,address2,post_nr,img) VALUES (\"$username\", SHA2(\"$password\", 256), \"$epost\", \"$name\", \"$surname\", \"$address\", \"$address2\", \"$post_nr\", \"$img\" )";
  }

  else{
  $sql = "INSERT INTO users(username,password,email,first_name,surname,address1,post_nr,img) VALUES (\"$username\", SHA2(\"$password\", 256), \"$epost\", \"$name\", \"$surname\", \"$address\", \"$post_nr\", \"$img\" )";
  }



  $result = mysqli_query($conn, $sql);
  if (!$result){
    die("No result");
  }



}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>New user</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css"  href="../css/main.css">
    <link rel="icon"       type="image/png" hrfe="favicon.png">
  </head>
  <body>
    <?php require_once '..\inc\nav.php' ?>
    <form class="signup" action="sign_up.php" method="post">
      <label for="inputUsername">Username</label>
      <input 
        id="inputUsername"
        name="username"
        type="text"
        placeholder="xXx_King1_xXx"
      >

      <label for="inputPassword">Password</label>
      <input 
        id="inputPassword"
        name="password"
        type="password"
        placeholder="Hunter2"
      ></input>

      <label for="inputEpost">Epost</label>
      <input 
        id="inputEpost"
        name="epost"
        type="text"
        placeholder="yourname@email.com"
      >

      <label for="inputfirst_name">Full Name</label>
      <input 
        id="inputFirstName"
        name="first_name"
        type="text"
        placeholder="John"
      >

      <label for="inputSurname">Surname</label>
      <input 
        id="inputSurname"
        name="surname"
        type="text"
        placeholder="Doe"
      ></input>

      <label for="inputPost_nr">Postnummer</label>
      <input 
        id="inputPost_nr"
        name="post_nr"
        type="text"
        placeholder="1337"
      ></input>

      <label for="inputAddress">Addresse</label>
      <input 
        id="inputAddress"
        name="address"
        type="text"
        placeholder="42 Wallaby Way, Sydney"
      ></input>

      <label for="inputAddress2">Addresse2</label>
      <input 
        id="inputAddress2"
        name="address2"
        type="text"
        placeholder="Not required. If you have a second address or any other need to use this field"
      ></input>

      <label for="inputImg">Profilbilde</label>
      <input 
        id="inputImg"
        name="img"
        type="text"
        placeholder="required, but wip. Just write whatever text you want"
      ></input>

      <input type="submit" value="Submit">
    </form>
  </body>
</html>
<?php include '../config/dbdisconnect.php' ?>