<?php require '../config/dbconnect.php';

if (
isset($_POST['category'])
&& $_POST['category'] != ""
){
    $category = $_POST['category'];
    $sql = "INSERT INTO category(category) VALUES('$category')";
    $result = mysqli_query($conn, $sql);
    if (!$result){
      die("No result, category");
    }
}

if (
isset($_POST['spec'])
&& $_POST['spec'] != ""
){
    $spec = $_POST['spec'];
    $sql = "INSERT INTO spec(spec,type) VALUES('$spec', 2)"; #TODO: dynamic type from dropdown menu
    $result = mysqli_query($conn, $sql);
    if (!$result){
        die("No result, spec");
    }
}

if (
isset($_POST['type'])
&& $_POST['type'] != ""
){
    $type = $_POST['type'];
    $sql = "INSERT INTO type(name) VALUES('$type')";
    $result = mysqli_query($conn, $sql);
    if (!$result){
        die("No result, type");
    }
}



require '../inc/header.php';
?>

<body class="admin-body">
    <?php require '../inc/nav.php'?>
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
    </ul>
    <?php require '../inc/script.php'?>
    <?php include '../config/dbdisconnect.php'?>
</body>
</html>