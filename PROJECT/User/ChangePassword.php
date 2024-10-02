<?php
ob_start();
include('Header.php');
session_start();
include("../Assets/Connection/Connection.php");

if(isset($_POST["update"]))
{
	$selQry = "select * from tbl_user  where user_id = ".$_SESSION['uid'];
$result = $con->query($selQry);
$data = $result->fetch_assoc();
       $newpass=$_POST['newpass'];
	   
	   $upQry = "update tbl_user set user_password = '".$newpass."' where user_id = ".$_SESSION['uid'];
	   if($data['user_password']==$_POST['pass'])
	   {
		   if($_POST['newpass']==$_POST['newpass2'])
	   {
	   
	   if($con->query($upQry))
	 {
		 echo "Updated";
	 }
	 else
	 {
		 echo "error";
	 }
	   }
	   
	   }
}
	   

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<?php


?>

<!-- <form id="form1" name="form1" method="post" action="">
  
  <table width="200" border="1">
    <tr>
      <td>Current Password</td>
      <td><label for="pass"></label>
      <input type="password" name="pass" id="pass"/> </td>
    </tr>
    <tr>
      <td>New Password</td>
      <td><label for="newpass"></label>
      <input type="password" name="newpass" id="newpass" /></td>
    </tr>
    <tr>
      <td>Confirm password</td>
      <td><label for="newpass"></label>
      <input type="password" name="newpass2" id="newpass2" /></td>
    </tr>
    <tr>
      <td height="23" colspan="2" align="center"><input type="submit" name="update" id="update" value="update" /></td>
    </tr>
  </table>
</form> -->
<form id="form1" name="form1" method="post" action="">
    <table class="table table-bordered" width="400">
      <tr>
        <td>Current Password</td>
        <td>
          <div class="form-group">
            <label for="pass"></label>
            <input type="password" class="form-control" name="pass" id="pass" />
          </div>
        </td>
      </tr>
      <tr>
        <td>New Password</td>
        <td>
          <div class="form-group">
            <label for="newpass"></label>
            <input type="password" class="form-control" name="newpass" id="newpass" 
       required="required" 
       pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
       title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"></td>
          </div>
        </td>
      </tr>
      <tr>
        <td>Confirm Password</td>
        <td>
          <div class="form-group">
            <label for="newpass2"></label>
            <input type="password" class="form-control" name="newpass2" id="newpass2" />
          </div>
        </td>
      </tr>
      <tr>
        <td height="23" colspan="2" align="center">
          <button type="submit" class="btn btn-primary" name="update" id="update">Update</button>
        </td>
      </tr>
    </table>
  </form>
</body>
</html>
<?php
ob_end_flush();
include('Footer.php');
?>