<?php
// Start the session
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include_once 'dbconnection.php';
include_once 'profileData.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Profile - <?php echo $_SESSION["UserName"]; ?></title>

        <!--BOOTSTRAP LINK--> 
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="profileStyle.css">
    </head>
    <body>

        <?php
        if ($_SESSION["UserName"]) {
            include_once 'navbar.php';
        } else {
            header("location:login.php");
        }
        ?>
        <div class="container">
            <div class="fb-profile">
                <img align="left" class="img-fluid fb-image-lg" src="img/cover.jpg" alt="Profile image example"/>
                <img align="left" class="img-fluid rounded fb-image-profile thumbnail" src="img/pflBoy.jpg" alt="Profile image example"/>
                <div class="fb-profile-text">
                    <h1><?php echo $_SESSION["UserName"]; ?></h1>
                    <p>Just wanna go fun.</p>
                </div>
            </div>
        </div> <!-- /container -->  


        <script src="../js/popper.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/bootstrap.bundle.min.js"></script>

    </body>
</html>

