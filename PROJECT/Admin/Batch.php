<?php
include("../Assets/Connection/Connection.php");
ob_start();
include("Header.php");

if (isset($_POST["submit"])) {
    $dept = $_POST["drop_dept"];
    $batch = $_POST["txt_batch"];

    $insQry = "INSERT INTO tbl_batch(batch_name, department_id) VALUES('$batch', '$dept')";
    $con->query($insQry);
}

if (isset($_GET["bid"])) {
    $bid = $_GET["bid"];
    $delQry = "DELETE FROM tbl_batch WHERE batch_id='$bid'";
    if ($con->query($delQry) === TRUE) {
        header('location:Batch.php');
        exit(); // Always exit after a header redirect
    }
}
?>

<form action="" method="post">
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-6">
                <label for="drop_dept">Department</label>
                <select class="form-control" name="drop_dept" id="drop_dept">
                    <option value="">-----Select-----</option>
                    <?php
                    $selQry = "SELECT * FROM tbl_department";
                    $data = $con->query($selQry);
                    while ($row = $data->fetch_assoc()) {
                        ?>
                        <option value="<?php echo $row["department_id"] ?>">
                            <?php echo $row["department_name"] ?>
                        </option>
                        <?php
                    }
                    ?>
                </select>
            </div>
            <div class="col-md-6">
                <label for="txt_batch">Batch</label>
                <input type="text" class="form-control" name="txt_batch" id="txt_batch" required="required" />
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            </div>
        </div>
    </div>

    <div class="container mt-3">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">SL NO</th>
                    <th scope="col">Department</th>
                    <th scope="col">Batch</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 0;
                $sel = "SELECT * FROM tbl_batch b INNER JOIN tbl_department d ON b.department_id = d.department_id";
                $datas = $con->query($sel);
                while ($rows = $datas->fetch_assoc()) {
                    $i++;
                    ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $rows["department_name"] ?></td>
                        <td><?php echo $rows["batch_name"] ?></td>
                        <td><a href="Batch.php?bid=<?php echo $rows["batch_id"] ?>" class="btn btn-danger">Delete</a></td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</form>

<?php 
ob_end_flush();
include("Footer.php");
?>
