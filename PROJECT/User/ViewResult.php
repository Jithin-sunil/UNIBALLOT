<?php
ob_start();
include('Header.php');
session_start();
include("../Assets/Connection/Connection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vote Results</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- Your custom styles or additional styles can go here -->
</head>
<body>

<?php
   $selQry = "SELECT c.candidate_id, COUNT(r.polling_id) AS vote_count
   FROM tbl_candidate c
   LEFT JOIN tbl_result r ON c.candidate_id = r.candidate_id
   WHERE c.batch_id = (SELECT b.batch_id
                      FROM tbl_batch b
                      INNER JOIN tbl_user u ON b.batch_id = u.batch_id
                      WHERE u.user_id = " . $_SESSION['uid'] . ") and r.polling_status=3 
   GROUP BY c.candidate_id
   ORDER BY vote_count DESC
  ";
   $result = $con->query($selQry);

   while($data = mysql_fetch_array($result)) {
    $userdata = "select * from tbl_candidate c inner join  tbl_user  u on u.user_id=c.user_id where c.candidate_id='".$data["candidate_id"]."'";
   $usere = $con->query($userdata);
   $user = $usere->fetch_assoc();
?>

<div class="container mt-5">
  <form id="form19" name="form1" method="post" action="">
    <div class="text-center">
      <table class="table table-bordered">
        <tr>
          
          <td>Photo</td>
          <td>Candidate Name</td>
          <td>Vote Count</td>
        </tr>
        <tr>
          
          <td><img src="../Assets/Files/User/<?php echo $user['user_photo'] ?>" height="250px"/></td>
          <td><?php echo $user['user_name']?></td>
          <td><?php echo $data['vote_count']?></td>
          
        </tr>
      </table>
    </div>
  </form>
</div>
<?php
   }
?>

</body>
</html>

<?php
ob_end_flush();
include('Footer.php');
?>
