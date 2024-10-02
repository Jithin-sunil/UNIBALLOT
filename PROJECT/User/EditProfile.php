
<?php
ob_start();
include('Header.php');
session_start();
include("../Assets/Connection/Connection.php");

if(isset($_POST["btn_submit"]))
{
       $name=$_POST['txt_name'];
	   $email=$_POST['txt_email'];
	   
	   $upQry = "update tbl_user set user_name = '".$name."', user_email = '".$email."' where user_id = ".$_SESSION['uid'];
	   
	   
	   if($con->query($upQry))
	 {
		 echo "Updated";
	 }
	 else
	 {
		 echo "error";
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
$selQry = "select * from tbl_user  where user_id = ".$_SESSION['uid'];
$result = $con($selQry);
$data = $result->fetch_assoc();

?>

<form id="form1" name="form1" method="post" action="">
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="txt_name">Name</label>
          <input type="text" class="form-control" name="txt_name" id="txt_name" value="<?php echo $data['user_name'] ?>"  required pattern="^[A-Z][a-zA-Z ]*$" title="Name must start with a capital letter and contain only alphabets and spaces"/>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="txt_email">Email</label>
          <input type="email" class="form-control" name="txt_email" id="txt_email" value="<?php echo $data['user_email'] ?>"  required pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}" title="Enter a valid email address"/>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <button type="submit" class="btn btn-primary" name="btn_submit" id="btn_submit">Submit</button>
        <button type="reset" class="btn btn-secondary" name="cancel" id="cancel">Cancel</button>
      </div>
    </div>
  </form>
</body>
</html>
<?php
ob_end_flush();
include('Footer.php');
?>