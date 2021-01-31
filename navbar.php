<?php
// Start the session
//session_start();
?>

<header class="fixed-top">
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="tableView.php">Catagory</a></li>
        <li><a href="registation.php">Registration</a></li>
        <li><a href="registationList.php">Registration List</a></li>
        <li style="float:right">
            <a class="active" href="logout.php">
                LogOut
            </a>
        </li>
        <li style="float:right">
            <a class="bg-info" href="profile.php">
                Welcome, <?php echo $_SESSION["UserName"]; ?>
            </a>
        </li>
    </ul>
</header>

