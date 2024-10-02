<?php
include("../Assets/Connection/Connection.php");
ob_start();
include("Header.php");

if (isset($_POST["btn_assign"])) {
    $name = $_POST['txt_name'];
    $details = $_POST['txt_details'];
    $electiondate = $_POST['txt_electiondate'];
    $electiontime = $_POST['txt_electiontime'];

    $ins = "INSERT INTO tbl_election(election_name, election_details, election_declareddate, election_date, election_time) 
            VALUES ('$name', '$details', CURDATE(), '$electiondate', '$electiontime')";

    if ($con->query($ins)) {
        echo "Inserted";
    } else {
        echo "Error: " . $con->error;
    }
}

if (isset($_GET["eid"])) {
    $did = $_GET["eid"];
    $delQry = "DELETE FROM tbl_election WHERE election_id='$did'";
    if ($con->query($delQry)) {
        echo "Deleted successfully";
    } else {
        echo "Error: " . $con->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Election Assignment</title>
</head>
<body>
<div class="container mt-5">
    <form action="" method="post" enctype="multipart/form-data" name="form7" id="form">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="txt_name">Name</label>
                    <input type="text" class="form-control" name="txt_name" id="txt_name" required />
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="txt_details">Details</label>
                    <input type="text" class="form-control" name="txt_details" id="txt_details" required />
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="txt_electiondate">Election Date</label>
                    <input type="text" class="form-control" name="txt_electiondate" id="txt_electiondate" 
                           required pattern="\d{4}-\d{2}-\d{2}" 
                           title="Enter a valid date in YYYY-MM-DD format" />
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="txt_electiontime">Election Time</label>
                    <input type="text" class="form-control" name="txt_electiontime" id="txt_electiontime" 
                           required pattern="\d{2}:\d{2}:\d{2}" 
                           title="Enter a valid time in HH:MM:SS format" />
                </div>
            </div>
        </div>
        <div class="row justify-content-center mt-3">
            <div class="col-md-6 text-center">
                <input type="submit" class="btn btn-primary" name="btn_assign" id="btn_assign" value="Assign" />
            </div>
        </div>
    </form>
</div>

<div class="container mt-5">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">SL.No</th>
                <th scope="col">Name</th>
                <th scope="col">Details</th>
                <th scope="col">Election Date</th>
                <th scope="col">Election Time</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 0;
            $selQry = "SELECT * FROM tbl_election";
            $data = $con->query($selQry);
            while ($row = $data->fetch_assoc()) {
                $i++;
                ?>
                <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $row["election_name"] ?></td>
                    <td><?php echo $row["election_details"] ?></td>
                    <td><?php echo $row["election_date"] ?></td>
                    <td><?php echo $row["election_time"] ?></td>
                    <td><a href="AssignElectionTeacher.php?eid=<?php echo $row["election_id"] ?>" class="btn btn-danger">Delete</a></td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</div>

</body>
</html>

<?php 
ob_end_flush();
include("Footer.php");
?>
