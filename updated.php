<?php
session_start();
include_once 'dbconnection.php';
include_once 'catagoryArray.php';
include_once 'updatedData.php';

function catagoryItem(int $parantId = 0, $space = "") {
    global $conn;
    $itemSql = "SELECT * FROM catagory WHERE parant_ID = '$parantId'";
    $result = $conn->query($itemSql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $id = $row["id"];
            $subitem = $space . $row["Catagory"];
            echo "<option value = " . $row["id"] . ">" . $subitem . "</option>";
            catagoryItem($row["id"], $space . $row["Catagory"] . "&raquo;");
        }
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Product Sub-product</title>

        <!--BOOTSTRAP LINK--> 
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="styleCreateForm.css">
    </head>
    <body>

        <?php
        if ($_SESSION["UserName"]) {
            include_once 'navbar.php';
            ?>

            <section class="form-section">
                <div class="container">
                    <div class="header-btn-div d-flex flex-row-reverse">
                        <div class="pb-3 btn-2-div">
                            <button type="button" class="btn btn-info">
                                <a href="tableView.php" class="text-decoration-none text-white cf-a-tag">Table View</a>
                            </button>
                        </div>
                    </div>
                    <div class="py-4 d-flex justify-content-center">
                        <div>
                            <?php
                            $id = $_GET['id']; //from tableview when Updated btn click; send id value;

                            $sqlFindRow = "SELECT * FROM catagory WHERE id = '$id'";

                            $result = $conn->query($sqlFindRow);

                            if ($result->num_rows > 0) {
                                // output data of each row
                                while ($row = $result->fetch_assoc()) {
                                    ?>
                                    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
                                        <input type="hidden" id="id" name="id" value="<?php echo $row["id"] ?>" />
                                        <div class="input-group mb-5">

                                            <select class="custom-select" name="productSelect" id="inputGroupSelect01">
                                                <?php echo "<option value = " . $row["id"] . ">" . $catagoryArray[$id] . "</option>"; ?>
                                                <?php catagoryItem(); ?>
                                            </select>

                                        </div>
                                        <div class="form-div">
                                            <div>
                                                <input 
                                                    type="text"
                                                    class="form-control"
                                                    id="productName"
                                                    name="product_Name"
                                                    placeholder="<?php echo $row["Catagory"]; ?>"
                                                    required="*"
                                                    >
                                            </div>

                                            <div class="btn-div pt-4 d-flex justify-content-between">
                                                <div>
                                                    <button type="submit" name="submit_update" class="btn btn-outline-success">Update</button>
                                                </div>
                                                <div>
                                                    <a class="btn btn-outline-danger " href="#" role="button">Cancel</a>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                    <?php
                                }
                            }
                            ?>
                        </div>

                    </div>

                </div> 
                <!--container end-->
            </section>
            <?php
        } else {
            header("location:login.php");
        }
        ?>

        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/bootstrap.bundle.min.js"></script>
        <script src="../js/popper.min.js"></script>
    </body>
</html>
