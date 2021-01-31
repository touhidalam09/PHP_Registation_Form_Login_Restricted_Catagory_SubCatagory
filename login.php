<?php
include_once 'dbconnection.php'; //database Connection
// Start the session
session_start();
$userName = $password = $passwordMd5 = "";
if (isset($_POST["login_submit"])) {

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $userName = $_POST["user_Name"];
        $password = $_POST["password"];
    }
    if ((!empty($userName)) and ( !empty($password))) {

        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $userName = test_input($userName);
        $password = test_input($password);

        $passwordMd5 = md5($password);
    }

    $sql = "SELECT UserName,Password FROM registration WHERE UserName='$userName' AND Password='$passwordMd5'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION["UserName"] = $row["UserName"];
    } else {
        //No data in database
        echo "Incorrect Username or Password";
    }
}
if (isset($_SESSION["UserName"])) {
    header("location:index.php");
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login - CSC</title>

        <!--BOOTSTRAP LINK--> 
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="loginStyle.css">
    </head>
    <body>

        <main class="d-flex justify-content-center align-items-center">
            <section class="registation-section">
                <div class="container-fluid">
                    <div class="container">
                        <div class="container-card">
                            <div class="card registation-card">
                                <div class="card-head py-3 text-center">
                                    <h2>Login Form</h2>
                                </div>
                                <div class="card-body">
                                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput" name="user_Name" placeholder="user name" required="*">
                                            <label for="floatingInput">User Name</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password" required="*">
                                            <label for="floatingPassword">Password</label>
                                        </div>
                                        <div class="mb-3 d-flex justify-content-center">
                                            <small>or Create New Account  <a href="registation.php"> Sign Up</a></small>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" name="login_submit" class="btn btn-primary">Login</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>

        <script src="../js/popper.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/bootstrap.bundle.min.js"></script>

    </body>
</html>


