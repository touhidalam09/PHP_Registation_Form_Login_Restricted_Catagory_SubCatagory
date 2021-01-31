<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include_once 'dbconnection.php'; //database Connection
include_once 'userInformationData.php';

function catagoryItem(int $parantId = 0, $space = "") {
    global $conn;
    $itemSql = "SELECT * FROM catagory WHERE parant_ID = '$parantId'";
    $result = $conn->query($itemSql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $subitem = $space . $row["Catagory"];
            echo "<option value = " . $row["Catagory"] . ">" . $subitem . "</option>";
            catagoryItem($row["id"], $space . $row["Catagory"] . "&raquo;");
        }
    }
}
?>




<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Registation - CSC</title>

        <!--BOOTSTRAP LINK--> 
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="registationStyle.css">

    </head>
    <body>

        <?php
        if ($_SESSION["UserName"]) {
            include_once 'navbar.php';
            ?>

            <main class="d-flex justify-content-center align-items-center">
                <section class="registation-section">
                    <div class="container-fluid">
                        <div class="container">
                            <div class="container-card py-5">
                                <div class="card registation-card p-4">
                                    <div class="card-head py-3 text-center">
                                        <h2>Registation Form</h2>
                                    </div>
                                    <div class="card-body">
                                        <form 
                                            action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"
                                            method="POST"
                                            enctype="multipart/form-data"
                                            >
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="floatingInput" name="user_Name" placeholder="user name" required="*">
                                                <label for="floatingInput">User Name</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com" required="*">
                                                <label for="floatingInput">Email address</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input type="number" class="form-control" id="floatingInput" name="contact_number" placeholder="contact number">
                                                <label for="floatingInput">Contact Number</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password" required="*">
                                                <label for="floatingPassword">Password</label>
                                            </div>

                                            <div class="form-floating mb-3">
                                                <div class="d-inline"> Gender: </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="flexRadioDefault" value="Male" id="flexRadioDefault1" checked>
                                                    <label class="form-check-label" for="flexRadioDefault1">
                                                        Male
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="flexRadioDefault" value="Female" id="flexRadioDefault2">
                                                    <label class="form-check-label" for="flexRadioDefault2">
                                                        Female
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="input-group mb-3">
                                                <div class="d-inline">BirthDay Date: </div>
                                                <div id="from-datepicker" class="input-append date mx-3">
                                                    <input 
                                                        class="input-group-text"
                                                        name="brithday_Date"
                                                        min ="1970-01-01"
                                                        data-format="y-m-d"
                                                        type="date"
                                                        value="<?php echo date('y-m-d'); ?>"
                                                        >
                                                </div>
                                            </div>
                                            <div class="input-group mb-3">
                                                <label for="exampleColorInput" class="form-label px-2">Color picker </label>
                                                <input 
                                                    type="color"
                                                    class="form-control form-control-color"
                                                    name="color_picker"
                                                    id="exampleColorInput"
                                                    title="Choose your color"
                                                    >
                                            </div>

                                            <div class="input-group mb-3">
                                                <label 
                                                    for="customRange2"
                                                    class="form-label">
                                                    Skill
                                                </label>
                                                <input
                                                    type="range"
                                                    class="form-range"
                                                    min="0" max="100"
                                                    step="1"
                                                    value="10"
                                                    oninput="this.nextElementSibling.value = this.value"
                                                    name="skill_Range"
                                                    id="customRange2">
                                                <output 
                                                    class="text-dark">
                                                    10
                                                </output>
                                            </div>

                                            <div class="input-group mb-3">
                                                <span class="input-group-text">User Address</span>
                                                <textarea 
                                                    class="form-control"
                                                    name="address_Field"
                                                    aria-label="With textarea"
                                                    ></textarea>
                                            </div>

                                            <div class="input-group mb-3">
                                                <select class="custom-select form-select form-select-lg mb-3" name="product_Select" id="inputGroupSelect01" required="*">
                                                    <option selected value="0">Choose Catagory...</option>
                                                    <?php catagoryItem(); ?>
                                                </select>
                                            </div>
                                            <div class="input-group mb-3">
                                                <label class="input-group-text" for="party">Date Seleted For Booking:</label>
                                                <input 
                                                    id="party"
                                                    type="datetime-local"
                                                    min ="1970-01-01"
                                                    name="partydate"
                                                    value="<?php echo date('y-m-d\TH:i A'); ?>"
                                                    >
                                            </div>
                                            <div class="input-group mb-3">
                                                <label class="input-group-text"  for="img">Select image:</label>
                                                <input type="file" class="form-control" id="img" name="img_File" accept="image/PNG" required="*">
                                            </div>
                                            <div class="input-group mb-3">
                                                <input type="file" class="form-control" id="inputGroupFile02" name="upload_File" accept="application/pdf">
                                                <label class="input-group-text" for="inputGroupFile02">Upload</label>
                                            </div>

                                            <div class="form-check mb-3 d-flex justify-content-center">
                                                <div>
                                                    <input class="form-check-input" type="checkbox" id="gridCheck" name="agreeCheck" required="*">
                                                    <label class="form-check-label" for="gridCheck">
                                                        agree terms & condition
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="mb-3 d-flex justify-content-center">
                                                <small>Already you have Account ?  <a class="text-warning" href="login.php"> Login</a></small>
                                            </div>
                                            <div class="text-center">
                                                <button type="submit" name="userInformation_submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </main>

            <?php
        } else {
            header("location:login.php");
        }
        ?>

        <script src="../js/popper.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/bootstrap.bundle.min.js"></script>

    </body>
</html>
