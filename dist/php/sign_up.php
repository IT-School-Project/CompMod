<?php
require '../config/dbconnect.php';
if (( 
isset($_POST['username']) && 
isset($_POST['password']) &&
isset($_POST['epost']) && 
isset($_POST['first_name']) && 
isset($_POST['surname']) && 
isset($_POST['post_nr']) && 
isset($_POST['address'])) && 

is_numeric($_POST['post_nr'])){

  $username = $_POST['username'];
  $epost = $_POST['epost'];
  $name = $_POST['first_name'];
  $password = $_POST['password'];
  $post_nr = $_POST['post_nr'];
  $surname = $_POST['surname']; 
  $address = $_POST['address'];  

  $sqlCheck = "SELECT id, username, password FROM users WHERE username = \"$username\" AND password = SHA2(\"$password\",256)";
  $resultCheck = mysqli_query($conn, $sqlCheck);
  
  
  if (mysqli_num_rows($resultCheck) == 0){
    if (isset($_POST['address2'])){
      $address2 = $_POST['address2'];
      $sql = "INSERT INTO users(username,password,email,first_name,surname,address1,address2,post_nr) VALUES (\"$username\", SHA2(\"$password\", 256), \"$epost\", \"$name\", \"$surname\", \"$address\", \"$address2\", \"$post_nr\")";
    }

    else{
    $sql = "INSERT INTO users(username,password,email,first_name,surname,address1,post_nr,img) VALUES (\"$username\", SHA2(\"$password\", 256), \"$epost\", \"$name\", \"$surname\", \"$address\", \"$post_nr\", \"$img\" )";
    }
    $result = mysqli_query($conn, $sql);
    if (!$result){
      die("No result");
    }
  }
}
?>
<?php require '../inc/header.php'?>
  <body class="signup-body">
    <?php require '../inc/nav.php' ?>
      <section class="wrapper">

        <h1 class="signup-form-title">Account Registration</h1>

        <form class="signup-form" action="sign_up.php" method="post">
          <section class="wrap-input uname">
            <label for="inputUsername" class="login-form-title">Username</label>
            <input class="inputUsername" name="username" type="text" placeholder="TheLegend27">
            
          </section>
          
          <section class="wrap-input pwd">
            <label for="inputPassword">Password</label>
            <input 
              class="inputPassword"
              name="password"
              type="password"
              placeholder="Hunter2"
            >
            
          </section>

          <section class="wrap-input email">
            <label for="inputEpost">Email</label>
            <input 
              class="inputEpost"
              name="epost"
              type="text"
              placeholder="yourname@email.com"
            >
            
          </section>
          
          <section class="wrap-input fname">
            <label for="inputfirst_name">First Name</label>
            <input 
              class="inputFirstName"
              name="first_name"
              type="text"
              placeholder="John"
            >
            
          </section>

          <section class="wrap-input sname">
            <label for="inputSurname">Surname</label>
            <input 
              class="inputSurname"
              name="surname"
              type="text"
              placeholder="Doe">
           
          </section>
            
          <section class="wrap-input post_nr">
            <label for="inputPost_nr">Postal Code</label>
            <input 
              class="inputPost_nr"
              name="post_nr"
              type="text"
              placeholder="1337"
            >
            
          </section>
          
          <section class="wrap-input address">
            <label for="inputAddress">Address</label>
            <input 
              class="inputAddress"
              name="address"
              type="text"
              placeholder="42 Wallaby Way, Sydney"
            >
            
          </section>
          
          <section class="wrap-input address2">
            <label for="inputAddress2">Address 2</label>
            <input 
              class="inputAddress2"
              name="address2"
              type="text"
              placeholder="Not required"
            >
            
          </section>
          
          <section class="wrap-input">
            <button class="signup-form-btn">Sign Up</button>
          </section>
        </form>
      </section>
    <?php require '../inc/script.php'?>
  </body>
</html>

<?php require '../config/dbdisconnect.php'?>