<?php 
require '../inc/header.php';
require '../inc/nav.php';
require '../config/dbconnect.php';

if (isset($_SESSION['userid'])){

    $sqlGetId = "SELECT * FROM admin WHERE user_id = " . $_SESSION['userid'];

    $resultGetId = mysqli_query($conn, $sqlGetId);

    if ($resultGetId){

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
        (isset($_POST['spec'])
        && $_POST['spec'] != "")
        &&($_POST['selecttype']
        && $_POST['selecttype'] != "")){

            $selecttype = $_POST['selecttype'];
            $spec = $_POST['spec'];

            $sql = "INSERT INTO spec(spec,type) VALUES('$spec', $selecttype)"; #TODO: dynamic type from dropdown menu
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
        
        require "../inc/admin_html.php";
    }

    else{
        echo 'This site is only accessible by administrators';
    }
}

else{
    echo 'You are not logged in';
}


?>

