<?php
//DataBase already Connected From createForm.php

$catagoryName = "";
$selectItem = "";

if (isset($_POST["submit_cf"]) AND ( !empty($_POST["product_Name"]))) {
    $selectItem = $_POST["productSelect"];

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $catagoryName = test_input($_POST["product_Name"]);
    }

    //select value string to integer convert
    $selectItemInt = (int) $selectItem;
    //if item select
    $sql = "INSERT INTO catagory (parant_ID,Catagory) VALUES ('$selectItemInt','$catagoryName')";


    if (($conn->query($sql) === TRUE)) {
        $conn->close();
        header("location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        $conn->close();
        exit();
    }
}



