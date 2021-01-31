<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
//This is the Index Page for this Application
include_once 'dbconnection.php'; //DataBase Connection
include_once 'catagoryArray.php'; //Column Subcatagory Array Data
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Product Table</title>

        <!--BOOTSTRAP LINK--> 
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="styleTableView.css">
    </head>
    <body>

        <?php
        if ($_SESSION["UserName"]) {
            include_once 'navbar.php';
            ?>

            <section class="btn-section">
                <div class="container">
                    <div class="d-flex justify-content-end">
                        <div>
                            <button type="button" class="btn btn-success">
                                <a href="createForm.php" class="text-white text-decoration-none">
                                    Create New
                                </a>
                            </button>
                        </div>
                    </div>
                </div>
            </section>   

            <section class="table-section">
                <div class="container">
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-8">
                            <table class="table table-hover table-striped">
                                <thead class="bg-dark text-white">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Catagory</th>
                                        <th scope="col">SubCatagory</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    $sqlShowData = "SELECT * FROM catagory";
                                    $result = $conn->query($sqlShowData);


                                    if ($result->num_rows > 0) {
                                        // output data of each row
                                        while ($row = $result->fetch_assoc()) {
                                            ?>
                                            <tr>
                                                <th scope = "row"> <?php echo $row["id"] ?></th>
                                                <td> <?php echo $row["Catagory"] ?> </td>
                                                <td class="text-muted">
                                                    <?php
                                                    $id = $row["id"];
                                                    echo $catagoryArray[$id];
                                                    ?>
                                                </td>

                                                <td>
                                                    <div>
                                                        <button type = "button" class = "btn btn-outline-danger">
                                                            <a href = "deleteData.php ? id=<?php echo $row["id"]; ?>" class="text-decoration-none dlt-tag">DELETE</a>
                                                        </button>
                                                        <button type = "button" class = " btn btn-outline-warning">
                                                            <a href = "updated.php ? id=<?php echo $row["id"]; ?>" class="text-decoration-none update-tag">UPDATE</a>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>

                                            <?php
                                        }
                                    } else {
                                        //no data message show
                                    }
                                    $conn->close();
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>

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

