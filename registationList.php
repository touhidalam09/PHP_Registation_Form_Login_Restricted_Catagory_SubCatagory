<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
//This is the Index Page for this Application
include_once 'dbconnection.php'; //DataBase Connection
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Registation List</title>

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
            <section class="table-section" style="margin-top: 100px;">
                <div class="container">
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-12">
                            <table class="table table-hover table-striped">
                                <thead class="bg-dark text-white">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">UserName</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Contact Number</th>
                                        <th scope="col">Address</th>
                                        <th scope="col">Gender</th>
                                        <th scope="col">BirthDay Date</th>
                                        <th scope="col">Skill Point</th>
                                        <th scope="col">Catagory</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">PDF file</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sqlShowData = "SELECT * FROM userinformation";
                                    $result = $conn->query($sqlShowData);


                                    if ($result->num_rows > 0) {
                                        // output data of each row
                                        while ($row = $result->fetch_assoc()) {
                                            
                                            $imageName = $row["Image"];
                                            ?>
                                            <tr>
                                                <th scope = "row"> <?php echo $row["id"]; ?></th>
                                                <td> <?php echo $row["UserName"]; ?> </td>
                                                <td> <?php echo $row["Email"]; ?> </td>
                                                <td> <?php echo $row["ContactNumber"]; ?> </td>
                                                <td> <?php echo $row["Address"]; ?> </td>
                                                <td> <?php echo $row["Gender"]; ?> </td>
                                                <td> <?php echo $row["BrithdayDate"]; ?> </td>
                                                <td> <?php echo $row["SkillRange"]; ?> </td>
                                                <td> <?php echo $row["Catagory"]; ?> </td>
                                                <td > 
                                                    <img class="img-fluid" src="uploadFile/img/<?php echo $imageName; ?>" alt="ni image" />
                                                </td>
                                                <td> <?php echo $row["UploadFile"]; ?> </td>

                                                <td>
                                                    <div class="d-flex justify-content-between">
                                                        <a href = "deleteDataReg.php?id=<?php echo $row["id"]; ?>" class="btn btn-outline-danger text-decoration-none dlt-tag">DELETE</a>
                                                        <a href = "updatedReg.php?id=<?php echo $row["id"]; ?>" class="btn btn-outline-warning text-decoration-none update-tag">UPDATE</a>

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
