<?php
ob_start();
include('Header.php');
session_start();
include("../Assets/Connection/Connection.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
$selQry = "SELECT * 
            FROM tbl_assignelectionteacher v 
            INNER JOIN tbl_election e ON v.election_id = e.election_id 
            INNER JOIN tbl_assignelectionteacher a ON a.assignelectionteacher_id = v.assignelectionteacher_id 
            INNER JOIN tbl_batch b ON v.batch_id = b.batch_id  
            INNER JOIN tbl_department de ON b.department_id = de.department_id 
            WHERE v.teacher_id = " . $_SESSION['etid'];
$result = $con->query($selQry);
$data = $result->fetch_assoc();
?>

<form id="form19" name="form1" method="post" action="">
    <div class="container mt-5">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Election Name</th>
            <th>Election Details</th>
            <th>Election Date</th>
            <th>Election Time</th>
            <th>Department</th>
            <th>Batch</th>
            <th>View Voter Verification</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><?php echo $data['election_name']?></td>
            <td><?php echo $data['election_details']?></td>
            <td><?php echo $data['election_date']?></td>
            <td><?php echo $data['election_time']?></td>
            <td><?php echo $data['department_name']?></td>
            <td><?php echo $data['batch_name']?></td>
            <td><a href="voterverification.php" class="btn btn-primary">Voter Verification</a></td>
          </tr>
        </tbody>
      </table>
    </div>
</form>
</body>
</html>
<?php
ob_end_flush();
include('Footer.php');
?>
