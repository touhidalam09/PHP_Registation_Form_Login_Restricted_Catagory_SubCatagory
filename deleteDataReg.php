<?php
include_once 'dbconnection.php';

$id = $_GET['id'];
$sql = "DELETE FROM userinformation WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
//    echo "Delete successfully";
    $conn->close();
    header("location: index.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    exit();
}

exit();

