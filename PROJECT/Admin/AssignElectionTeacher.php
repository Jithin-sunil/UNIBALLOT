<?php
include("../Assets/Connection/Connection.php");
ob_start();
include("Header.php");

if (isset($_POST["btn_submit"])) {
    $electionteacher = $_POST['select_electionteacher'];
    $batch = $_POST['select_batch'];
    
    $ins = "INSERT INTO tbl_assignelectionteacher(teacher_id, batch_id, election_id) VALUES ('$electionteacher', '$batch', '{$_GET['eid']}')";
    
    if ($con->query($ins) === TRUE) {
        echo "inserted";
    } else {
        echo "error: " . $con->error; // Display the error for debugging
    }
}
?>

<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Untitled Document</title>
</head>

<body>
<div class="container mt-5">
    <form action="" method="post" enctype="multipart/form-data" name="form69" id="form69">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="select_electionteacher">Election Teacher</label>
                    <select class="form-control" name="select_electionteacher" id="select_electionteacher" required>
                        <option value="">...select...</option>
                        <?php
                        $sel = "SELECT et.* FROM tbl_electionteacher et
                                LEFT JOIN tbl_assignelectionteacher ae ON et.electionteacher_id = ae.teacher_id
                                WHERE ae.assignelectionteacher_id IS NULL";
                        $res = $con->query($sel);
                        while ($data = $res->fetch_assoc()) {
                        ?>
                            <option value="<?php echo $data["electionteacher_id"]; ?>">
                                <?php echo $data["electionteacher_name"]; ?>
                            </option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="select_department">Department</label>
                    <select class="form-control" name="select_department" id="select_department" onchange="getBatch(this.value)" required>
                        <option value="">...select...</option>
                        <?php
                        $sel = "SELECT * FROM tbl_department";
                        $res = $con->query($sel);
                        while ($data = $res->fetch_assoc()) {
                        ?>
                            <option value="<?php echo $data["department_id"]; ?>">
                                <?php echo $data["department_name"]; ?>
                            </option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="select_batch">Batch</label>
                    <select class="form-control" name="select_batch" id="select_batch" required>
                        <option value="">...select...</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mt-3">
            <div class="col-md-6 text-center">
                <input type="submit" class="btn btn-primary" name="btn_submit" id="btn_submit" value="Submit" />
            </div>
        </div>
    </form>
</div>

<script src="../Assets/JQ/jQuery.js"></script>
<script>
    function getBatch(did) {
        $.ajax({
            url: "../Assets/AjaxPages/AjaxBatch.php?did=" + did,
            success: function (html) {
                $("#select_batch").html(html);
            }
        });
    }
</script>

</body>

</html>
<?php 
ob_end_flush();
include("Footer.php");
?>
