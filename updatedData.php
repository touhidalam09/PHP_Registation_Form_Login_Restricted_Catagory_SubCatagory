<?php

$selectItem = "";
$catagoryName = "";

if (isset($_POST["submit_update"]) AND ( !empty($_POST["product_Name"]))) {
    $selectItem = $_POST["productSelect"];

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST["id"];
        $catagoryName = test_input($_POST["product_Name"]);
    }
    //select value string to integer convert
    $selectItemInt = (int) $selectItem;
//    $sql = "UPDATE catagory  SET parant_ID ='$selectItemInt' ,Catagory='$catagoryName' WHERE id = '$id'";
    $sql = "UPDATE catagory  SET Catagory='$catagoryName' WHERE id = '$id'";




    if (($conn->query($sql) === TRUE)) {
        $conn->close();
        header("location: tableView.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        $conn->close();
        exit();
    }
}



