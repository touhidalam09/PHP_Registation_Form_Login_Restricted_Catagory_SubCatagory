<?php

$username = $email = $contactNumber = $password = $name = $flexRadioDefault = "";
$brithday_Date = $skill_Range = $address_Field = $product_Select = "";
$partydate = $agreeCheck = $img_File = $upload_File = $color_picker = "";

if (isset($_POST["userInformation_submit"])) {

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["user_Name"];
        $email = $_POST["email"];
        $contactNumber = $_POST["contact_number"];
        $password = $_POST["password"];
        $flexRadioDefault = $_POST["flexRadioDefault"];
        $color_picker = $_POST["color_picker"];
        $brithday_Date = $_POST["brithday_Date"];
        $skill_Range = $_POST["skill_Range"];
        $address_Field = $_POST["address_Field"];
        $product_Select = $_POST["product_Select"];
        $partydate = $_POST["partydate"];
        $agreeCheck = $_POST["agreeCheck"];
    }

    //validate function
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    //Validated variable
    $username = test_input($username);
    $email = test_input($email);
    $contactNumber = test_input($contactNumber);
    $password = test_input($password);
    $password = md5($password);
    $address_Field = test_input($address_Field);


    $brithday_Date = date('y-m-d', strtotime($brithday_Date));
    $partydate = date('y-m-d\TH:i A', strtotime($partydate));
    if (isset($agreeCheck)) {
        $agreeCheck = "Agree";
    } else {
        $agreeCheck = "Not Agree";
    }

    //for  file uploading START
    include_once 'imageFileFunction.php';
    $img_File = $target_new_name_img;
    $upload_File = $target_new_name_pdf;
    //for  file uploading END

    
    $sql = "INSERT INTO userInformation"
            . " (UserName,Email,ContactNumber,Password,Gender,ColorPicker,BrithdayDate,SkillRange,Address,Catagory,PartyDate,AgreeCheck,Image,UploadFile)"
            . " VALUES ('$username','$email','$contactNumber','$password','$flexRadioDefault','$color_picker','$brithday_Date','$skill_Range','$address_Field','$product_Select','$partydate','$agreeCheck','$img_File','$upload_File')";
    if (($conn->query($sql) === TRUE)) {
        header("location:index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        exit();
    }
}

