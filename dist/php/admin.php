<?php require '../config/dbconnect.php'?>
<?php require '../inc/header.php'?>
<body class="admin-body">
    <?php require '../inc/nav.php'?>
    <h1 class="admin-head">Admin Page</h1>
    <form action="admin.php" method="post" class="adds">
        <fieldset class="category">
            <legend>Add catergory:</legend>
            <input type="text" name="category" id="category">
            <button type="submit">Submit</button>
        </fieldset>
        <fieldset class="spec">
            <legend>Add spec:</legend>
            <input type="text" name="spec" id="spec">
            <button type="submit">Sumbit</button>
        </fieldset>
        <fieldset class="type">
            <legend>Add type:</legend>
            <input type="text" name="type" id="type">
            <button type="submit">Sumbit</button>
        </fieldset>
        <fieldset class="img">
            <legend>Add image:</legend>
            <input type="file" name="img" id="img">
            <button type="submit" action="">Sumbit</button>
        </fieldset>
    </form>
    <?php require '../inc/script.php'?>
    <?php include '../dbdisconnect.php'?>
</body>
</html>