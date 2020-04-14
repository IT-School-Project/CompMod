<?php 
require '../config/dbconnect.php';
require '../inc/header.php';

if(isset($_SESSION['userid']) && isset($_POST['title']) && isset($_POST['price']) && isset($_POST['description']) && is_numeric($_POST['price'])){
  $userid = $_SESSION['userid'];
  $title = $_POST['title'];
  $price = $_POST['price'];
  $description = $_POST['description'];

  echo $userid.$title.$price.$description;

  $sql = "INSERT INTO listing(name,price,date,description,user) VALUES ('$title', $price, NOW(), '$description', $userid)";
  $result = mysqli_query($conn, $sql);
}



if(isset($_POST['category']) && isset($_POST['partName'])){
  $category = $_POST['category'];
  $partName = $_POST['partName'];
}
?>
<body>
  <?php require '../inc/nav.php'?>
  <form id = "listing" method = "POST">

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
  <input type = "submit">


  </form>
  

</form>
  <?php require '../inc/script.php'?>
</body>
</html>