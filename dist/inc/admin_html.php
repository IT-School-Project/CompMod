<body class="admin-body">
  <?php require '../inc/nav.php'?>
  <section class="wrapper">
    <h1 class="admin-head">Admin Page</h1>

    <form action="admin.php" method="post" class="adds">

        <fieldset class="category">
            <legend>Add category:</legend>
            <input type="text" name="category" id="category">
            <button type="submit">Submit</button>
        </fieldset>

        <fieldset class="spec">
            <legend>Add spec:</legend>
            <input type="text" name="spec" id="spec">
            <select name="selecttype" id="selecttype">
                <?php
                $sql2 = "SELECT id,name FROM type";
                $result2 = mysqli_query($conn, $sql2);
                while($row = mysqli_fetch_array($result2))
                {
                    echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
                }
                ?>
            </select>
            <button type="submit">Submit</button>
        </fieldset>

        <fieldset class="type">
            <legend>Add type:</legend>
            <input type="text" name="type" id="type">
            <button type="submit">Submit</button>
        </fieldset>
        
        <fieldset class="img">
            <legend>Add image:</legend>
            <input type="file" name="img" id="img">
            <button type="submit" action="">Submit</button>
        </fieldset>

    </form>
    <h2>TODO:</h2>
    <ul>
        <li>Make it so that admin page can't add duplicate values</li>
        <li>Fix hover on inputs in sign_up.php</li>
    </ul>
  </section>
    

  <?php require '../inc/script.php'?>
  <?php include '../config/dbdisconnect.php'?>
</body>
</html>