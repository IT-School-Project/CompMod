<?php 
require '../config/dbconnect.php';
require '../inc/header.php';
require '../inc/nav.php';

if(isset($_SESSION['userid']) && isset($_POST['title']) && isset($_POST['price']) && isset($_POST['description']) && is_numeric($_POST['price']) && isset($_FILES["fileToUpload"]["name"])){

  $userid = $_SESSION['userid'];
  $title = $_POST['title'];
  $price = $_POST['price'];
  $description = $_POST['description'];

  $sql = "INSERT INTO listing(name,price,date,description,user) VALUES ('$title', $price, NOW(), '$description', $userid)";
  $result = mysqli_query($conn, $sql);

  if (!$result){
    die("pffffft");
  }
  
  $sql = "SELECT MAX(id) FROM listing";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  $listing_id = $row['MAX(id)'];

  //IMAGE UPLOAD
  $target_dir = "../img/listings/";
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo(basename( $_FILES["fileToUpload"]["name"]),PATHINFO_EXTENSION));
  $target_file = $target_dir . $listing_id . "." . $imageFileType;
  // Check if image file is a actual image or fake image
  if(isset($_POST["submit"])) {
      $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
      if($check !== false) {
          echo "File is an image - " . $check["mime"] . ".";
          $uploadOk = 1;
      } else {
          echo "File is not an image.";
          $uploadOk = 0;
      }
  }
  // Check if file already exists
  if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
  } 
  // Check file size
  if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
  }
  // Allow certain file formats
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  && $imageFileType != "gif" ) {
      echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      $uploadOk = 0;
  }
  //if everything is okay try to upload file
  else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    }
    else {
        echo "Sorry, there was an error uploading your file.";
    }
  }
}



if(isset($_POST['category']) && isset($_POST['partName'])){
  $category = $_POST['category'];
  $partName = $_POST['partName'];
  for ($i=0; $i<count($category);$i++){
    $c = $category[$i];
    $p = $partName[$i];
    $sqlCheck = "SELECT id FROM category WHERE category = '$c'";
    $resultCheck = mysqli_query($conn, $sqlCheck);
    $row = mysqli_fetch_assoc($resultCheck);
    $cat_id = $row['id'];
    $sql = "INSERT INTO parts(name, cat_id) VALUES('$p', $cat_id)";
    $result = mysqli_query($conn,$sql);
    $sql = "SELECT MAX(id) FROM parts";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
    $part_id = $row['MAX(id)'];
    $sql = "INSERT INTO xparts(listing_id,parts_id,important) VALUES($listing_id,$part_id,0)"; #TODO: is important checker
    $result = mysqli_query($conn,$sql);
  }
}
?>
<body>
  
  <form id = "listing" method = "POST" enctype="multipart/form-data">
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

    <br><br>
    
    
    <?php
    $categories = array();
    $sql2 = "SELECT id,category FROM category";
    $result2 = mysqli_query($conn, $sql2);
    while($row = mysqli_fetch_array($result2))
    {
      array_push(
        $categories, $row['category']
      );
    }
    $js_array = json_encode($categories);
    ?>
    <script type = 'text/javascript'>
      var choices = <?php echo $js_array; ?>;
      var addInputNum = 0;
      function addInput(selectName) {
        var newLabel = document.createElement('label');
        newLabel.setAttribute("for", "inputPartName")
        newLabel.innerHTML = "Name";
        document.getElementById(selectName).appendChild(newLabel);

        var newText = document.createElement('input');
        var selectHTML = "";
        newText.setAttribute("id", "inputPartName")
        newText.setAttribute("name", "partName[]")
        newText.setAttribute("type", "text")
        newText.setAttribute("placeholder", "example: Intel i7 9700k")
        newText.innerHTML = selectHTML;
        document.getElementById(selectName).appendChild(newText);



        var newLabel = document.createElement('label');
        newLabel.setAttribute("for", "selectCategory")
        newLabel.innerHTML = "Select Part Category";
        document.getElementById(selectName).appendChild(newLabel);

        var newSelect = document.createElement('select');
        var selectHTML = "";
        for(i = 0; i < choices.length; i = i + 1) {
          selectHTML += "<option value='" + choices[i] + "'>" + choices[i] + "</option>";
        }
        newSelect.setAttribute("id", "selectCategory")
        newSelect.setAttribute("name", "category[]")
        newSelect.innerHTML = selectHTML;
        document.getElementById(selectName).appendChild(newSelect);

        addInputNum++
      }
  </script> 
  <input type="button" value="Add" onclick="addInput('listing');" />
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type = "submit" value="Submit" name ="submit">


  </form>
  

</form>
  <?php require '../inc/script.php'?>
</body>
</html>