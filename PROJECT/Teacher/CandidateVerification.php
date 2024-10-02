<?php
ob_start();
include('Header.php');
session_start();
include("../Assets/Connection/Connection.php");

if (isset($_GET['aid'])) {
  $upQry = "UPDATE tbl_candidate SET candidate_status = 1 WHERE candidate_id = " . $_GET['aid'];
  $con->query($upQry);
}
if (isset($_GET['rid'])) {
  $upQry = "UPDATE tbl_candidate SET candidate_status = 2 WHERE candidate_id = " . $_GET['rid'];
  $con->query($upQry);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Candidate Verification</title>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

  <!-- Your custom styles or additional styles can go here -->
</head>

<body>
  <?php
  $selQry = "SELECT * FROM tbl_election e 
             INNER JOIN tbl_assignelectionteacher a ON e.election_id = a.election_id 
             INNER JOIN tbl_candidate c ON a.batch_id = c.batch_id 
             INNER JOIN tbl_user u ON u.user_id = c.user_id 
             INNER JOIN tbl_batch ba ON u.batch_id = ba.batch_id  
             INNER JOIN tbl_department dep ON ba.department_id = dep.department_id 
             WHERE a.teacher_id = " . $_SESSION['etid'];

  $result = $con->query($selQry);
  ?>
  <div class="container mt-5">
    <table class="table table-responsive">
      <thead class="thead-dark">
        <tr>
          <th>SI no</th>
          <th>Name</th>
          <th>Email</th>
          <th>Admission no</th>
          <th>Department name</th>
          <th>Batch name</th>
          <th>Roll no</th>
          <th>Photo</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $i = 0;
        while ($row = $result->fetch_assoc()) {
          $i++;
        ?>
          <tr>
            <td><?php echo $i ?></td>
            <td><?php echo $row["user_name"] ?></td>
            <td><?php echo $row["user_email"] ?></td>
            <td><?php echo $row["user_admissionno"] ?></td>
            <td><?php echo $row["department_name"] ?></td>
            <td><?php echo $row["batch_name"] ?></td>
            <td><?php echo $row["user_rollno"] ?></td>
            <td><?php echo $row["user_photo"] ?></td>
            <td>
              <a href="CandidateVerification.php?aid=<?php echo $row["candidate_id"] ?>" class="btn btn-success">Accept</a>
              <a href="CandidateVerification.php?rid=<?php echo $row["candidate_id"] ?>" class="btn btn-danger">Reject</a>
            </td>
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
include('Footer.php');
?>
