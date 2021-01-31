<?php
//DataBase already connected from index page tableView.php
//Just catagoryArray Make and return for Display table
$catagoryArray = [];

function catagoryItemArrayReturn(int $parantId = 0, $space = "") {
    global $conn;
    global $catagoryArray;
    $itemSql = "SELECT * FROM catagory WHERE parant_ID = '$parantId'";
    $result = $conn->query($itemSql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $id = $row["id"];
            $subitem = $space . $row["Catagory"];
            $catagoryArray[$id] = $subitem;
            catagoryItemArrayReturn($row["id"], $space . $row["Catagory"] . "&raquo;");
        }
    }
}
catagoryItemArrayReturn();
ksort($catagoryArray);

//echo "<pre>";
//print_r($catagoryArray);
//echo "</pre>";
