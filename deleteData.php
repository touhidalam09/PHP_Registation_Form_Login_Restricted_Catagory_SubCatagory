<?php
include_once 'dbconnection.php';

$id = $_GET['id'];
$sql = "DELETE FROM catagory WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
//    echo "Delete successfully";
    $conn->close();
    header("location: tableView.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    exit();
}

exit();

