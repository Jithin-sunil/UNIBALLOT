<?php
$dep = "";
include("../Assets/Connection/Connection.php");
ob_start();
include("Header.php");

if (isset($_POST["btn_submit"])) {
    $dep = $_POST["department"];
    $ins = "INSERT INTO tbl_department(department_name) VALUES('$dep')";
    $con->query($ins);
}

if (isset($_GET["did"])) {
    $did = $_GET["did"];
    $delQry = "DELETE FROM tbl_department WHERE department_id='$did'";
    $con->query($delQry);
}
?>

<html>
<head>
    <title>DEPARTMENT</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
    <div class="container mt-5">
        <h1 class="text-center">DEPARTMENT</h1>
        <div class="row justify-content-center mt-3">
            <div class="col-md-4">
                <label for="txt_depart">Department</label>
                <input type="text" class="form-control" name="department" id="txt_depart" required="required" />
            </div>
        </div>
        <div class="row justify-content-center mt-3">
            <div class="col-md-4 text-center">
                <input type="submit" class="btn btn-primary" name="btn_submit" id="btn_submit" value="Submit" />
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">SL.No</th>
                    <th scope="col">Department</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 0;
                $selQry = "SELECT * FROM tbl_department";
                $data = $con->query($selQry);
                while ($row = $data->fetch_assoc()) {
                    $i++;
                    ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $row["department_name"] ?></td>
                        <td><a href="Department.php?did=<?php echo $row["department_id"] ?>" class="btn btn-danger">Delete</a></td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</form>

</body>
</html>

<?php 
ob_end_flush();
include("Footer.php");
?>
