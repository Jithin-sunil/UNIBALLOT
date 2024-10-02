<?php
ob_start();
include('Header.php');
session_start();
include("../Assets/Connection/Connection.php");

if (isset($_GET["pid"])) {
  $ins = "insert into tbl_result(user_id,polling_datetime,candidate_id) values('" . $_SESSION['uid'] . "',now(),'" . $_GET['pid'] . "')";

  if ($con->query($ins)) {
    echo "inserted";
    header('location:HomePage.php');
  } else {
    echo "error";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Vote</title>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

  <!-- Your custom styles or additional styles can go here -->
</head>

<body>

  <?php
  $selQry = "SELECT * FROM tbl_user  f inner join tbl_candidate ct on f.user_id = ct.user_id
           WHERE f.user_id IN (
               SELECT c.user_id
               FROM tbl_candidate c
               INNER JOIN tbl_user u ON c.batch_id = u.batch_id
               WHERE u.user_id = " . $_SESSION['uid'] . ") and ct.candidate_status = 1";

  $result = $con->query($selQry);
  ?>

  <div class="container mt-5">
    <table class="table table-bordered">
      <thead class="thead-dark">
        <tr>
          <td width="147">SI no</td>
          <td width="147">Photo</td>
          <td width="146">Name</td>
          <td width="146">Vote</td>
        </tr>
      </thead>
      <tbody>
        <?php
        $i = 0;
        while ($row = $result->fetch_assoc()) {
          $i++;
        ?>
          <tr>
            <td> <?php echo $i ?> </td>
            <td><img src="../Assets/Files/User/<?php echo $row['user_photo'] ?>" height="250px"/></td>
            <td><?php echo $row["user_name"] ?></td>
            <td><a href="Vote.php?pid=<?php echo $row["candidate_id"] ?>" class="btn btn-success">Vote</a></td>
            
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

