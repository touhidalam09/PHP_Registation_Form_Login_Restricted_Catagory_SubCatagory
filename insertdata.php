<?php


$productName = "";
if (isset($_POST["submit"])) {
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $firstName = test_input($_POST["firstName"]);
    }



    $sql = "INSERT INTO user_info (firstName, lastName, email)
            VALUES ('$firstName', '$lastName', '$email')";

    if ($conn->query($sql) === TRUE) {
//        echo "New record created successfully";
        $conn->close();
        header("location: message.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        exit();
    }
}

