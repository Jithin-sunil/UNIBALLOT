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
$selQry = "select * from tbl_user u inner join tbl_batch b on u.batch_id = b.batch_id inner join tbl_department d on b.department_id = d.department_id where u.user_id = ".$_SESSION['uid'];
$result = $con->query($selQry);
$data = $result->fetch_assoc();

?>

<form id="form1" name="form1" method="post" action="">
  <div class="container mt-4">
    <table class="table table-bordered">
      <tr>
        <td colspan="2"><img src="../Assets/Files/User/<?php echo $data['user_photo'] ?>" height="250px" class="img-fluid"/></td>
      </tr>
      <tr>
        <td>Name</td>
        <td><?php echo $data['user_name']?></td>
      </tr>
      <tr>
        <td>Email</td>
        <td><?php echo $data['user_email']?></td>
      </tr>
      <tr>
        <td>Admission No</td>
        <td><?php echo $data['user_admissionno']?></td>
      </tr>
      <tr>
        <td>Roll No</td>
        <td><?php echo $data['user_rollno']?></td>
      </tr>
      <tr>
        <td height="26">Department</td>
        <td><?php echo $data['department_name']?></td>
      </tr>
      <tr>
        <td height="26">Batch</td>
        <td><?php echo $data['batch_name']?></td>
      </tr>
    </table>
  </div>
  <p>&nbsp;</p>
</form>
</body>
</html>
<?php
ob_end_flush();
include('Footer.php');
?>