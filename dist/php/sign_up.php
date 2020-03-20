<?php 


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
<?php require '../inc/header.php'?>
  <body>
    <?php require '../inc/nav.php' ?>
    <section class="limiter">

      <section class="signup">

        <form class="signup" action="sign_up.php" method="post">

          <h1>Account Registration</h1>

          <section class="wrap-input uname">
            <label for="inputUsername" class="login-form-title">Username</label>
            <input id="inputUsername" name="username" type="text" placeholder="TheLegend27">
            <span class="focus-input-1"></span>
            <span class="focus-input-2"></span>
          </section>
          
          <section class="wrap-input pwd">
            <label for="inputPassword">Password</label>
            <input 
              id="inputPassword"
              name="password"
              type="password"
              placeholder="Hunter2"
            >
            <span class="focus-input-1"></span>
            <span class="focus-input-2"></span>
          </section>

          <section class="wrap-input email">
            <label for="inputEpost">Email</label>
            <input 
              id="inputEpost"
              name="epost"
              type="text"
              placeholder="yourname@email.com"
            >
            <span class="focus-input-1"></span>
            <span class="focus-input-2"></span>
          </section>
          
          <section class="wrap-input fname">
            <label for="inputfirst_name">First Name</label>
            <input 
              id="inputFirstName"
              name="first_name"
              type="text"
              placeholder="John"
            >
            <span class="focus-input-1"></span>
            <span class="focus-input-2"></span>
          </section>

          <section class="wrap-input sname">
            <label for="inputSurname">Surname</label>
            <input 
              id="inputSurname"
              name="surname"
              type="text"
              placeholder="Doe">
            <span class="focus-input-1"></span>
            <span class="focus-input-2"></span>
          </section>
            
          <section class="wrap-input post_nr">
            <label for="inputPost_nr">Postnummer</label>
            <input 
              id="inputPost_nr"
              name="post_nr"
              type="text"
              placeholder="1337"
            >
            <span class="focus-input-1"></span>
            <span class="focus-input-2"></span>
          </section>
          
          <section class="wrap-input address">
            <label for="inputAddress">Addresse</label>
            <input 
              id="inputAddress"
              name="address"
              type="text"
              placeholder="42 Wallaby Way, Sydney"
            >
            <span class="focus-input-1"></span>
            <span class="focus-input-2"></span>
          </section>
          
          <section class="wrap-input address2">
            <label for="inputAddress2">Addresse 2</label>
            <input 
              id="inputAddress2"
              name="address2"
              type="text"
              placeholder="Not required"
            >
            <span class="focus-input-1"></span>
            <span class="focus-input-2"></span>
          </section>
          
          <section class="wrap-input img">
            <label for="inputImg">Profilbilde</label>
            <input 
              id="inputImg"
              name="img"
              type="text"
              placeholder="Required, but wip. Just write whatever text you want"
            >
            <span class="focus-input-1"></span>
            <span class="focus-input-2"></span>
          </section>
          
          <section class="container-login-form-btn">
            <button class="login-form-btn">Sign Up</button>
          </section>
        </form>
      </section>
    </section>
    <?php require '../inc/script.php'?>
  </body>
</html>
