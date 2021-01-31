<?php

$username = $email = $contactNumber = $password = $name = "";

if (isset($_POST["registation_submit"])) {

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["user_Name"];
        $email = $_POST["email"];
        $contactNumber = $_POST["contact_number"];
        $password = $_POST["password"];
    }

    if ((!empty($username)) and ( !empty($email)) and ( !empty($contactNumber)) and ( !empty($password))) {

        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $name = test_input($username);
        $email = test_input($email);
        $contactNumber = test_input($contactNumber);
        $password = test_input($password);

        $passwordMd5 = md5($password);

        $sql = "INSERT INTO registration (UserName,Email,ContactNumber,Password) VALUES ('$name','$email','$contactNumber','$passwordMd5')";
        if (($conn->query($sql) === TRUE)) {
            header("location:index.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
            exit();
        }
    }
}

