<?php
// Start the session
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Home</title>

        <!--BOOTSTRAP LINK--> 
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>

        <?php
        if ($_SESSION["UserName"]) {
            include_once 'navbar.php';
            include_once 'tableView.php';
        } else {
            header("location:login.php");
        }
        ?>


        <script src="../js/popper.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/bootstrap.bundle.min.js"></script>

    </body>
</html>
