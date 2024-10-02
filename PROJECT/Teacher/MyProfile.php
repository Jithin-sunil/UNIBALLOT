<?php
ob_start();
include('Header.php');
session_start();
include("../Assets/Connection/Connection.php");

$selQry = "SELECT * FROM tbl_electionteacher WHERE electionteacher_id=" . $_SESSION['etid'];
$dataQry = $con->query($selQry);
$rowUser = $dataQry->fetch_assoc();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>	
<!-- <form id="form2" name="form2" method="post" action="">
<table width="200" border="1">
    <tr>
      <td><img src="../Assets/Files/User/<?php echo $rowUser['electionteacher_photo'] ?>" height="250px"/></td>
    </tr>
    <tr>
      <td>Name</td>
      <td><?php  echo $rowUser['electionteacher_name']?></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><?php  echo $rowUser['electionteacher_email']?></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><?php  echo $rowUser['electionteacher_contact']?></td>
    </tr>
</table>
</form> -->
<form id="form2" name="form2" method="post" action="">
    <div class="card" style="width: 18rem;">
      <img src="../Assets/Files/User/<?php echo $rowUser['electionteacher_photo'] ?>" class="card-img-top" alt="User Photo">
      <div class="card-body">
        <h5 class="card-title">Name: <?php echo $rowUser['electionteacher_name'] ?></h5>
        <p class="card-text">Email: <?php echo $rowUser['electionteacher_email'] ?></p>
        <p class="card-text">Contact: <?php echo $rowUser['electionteacher_contact'] ?></p>
      </div>
    </div>
  </form>
</body>
</html>
<?php
ob_end_flush();
include('Footer.php');
?>
