 <?php
session_start();
include("../Assets/Connection/Connection.php");
if(isset($_POST['btn_login']))
{
	$email=$_POST["txt_email"];
	$password = $_POST["txt_password"];
	
	$selUser = "select * from tbl_user where user_email='$email' and user_password='$password' and user_status = 1";
	$SelTeacher = "select * from tbl_electionteacher where electionteacher_email='$email' and electionteacher_password='$password'";
	$SelAdmin = "select * from tbl_admin where admin_email='$email' and admin_password='$password'";
	  
	
	$datauser = mysql_query($selUser);
	$dataTeacher = mysql_query($SelTeacher);
	$dataAdmin = mysql_query($SelAdmin);
	
	if($rowUser = mysql_fetch_array($datauser))
	{
		$_SESSION["uid"] = $rowUser["user_id"];
		$_SESSION["uname"] = $rowUser["user_name"];
		header ("location:../User/HomePage.php");
	}
	elseif($rowTeacher = mysql_fetch_array($dataTeacher))
	{
		$_SESSION["etid"] = $rowTeacher["electionteacher_id"];
		$_SESSION["etname"] = $rowTeacher["electionteacher_name"];
		header ("location:../Teacher/Homepage.php");
	}
	elseif($rowAdmin = mysql_fetch_array($dataAdmin))
	{
		$_SESSION["aid"] = $rowTeacher["admin_id"];
		$_SESSION["aname"] = $rowTeacher["admin_name"];
		header ("location:../Admin/Homepage.php");
	}
	
	
	else
	{
		echo "Invalid Credentials";
	}
}
	?>
 <!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - CSS Cube Login Form</title>
  <link rel="stylesheet" href="../Assets/Template/Login/style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<form autocomplete='off' class='form' method="post">
  <div class='control'>
    <h1>
      Sign In
    </h1>
  </div>
  <div class='control block-cube block-input'>
    <input name='txt_email' placeholder='Username' type='text'required="required">
    <div class='bg-top'>
      <div class='bg-inner'></div>
    </div>
    <div class='bg-right'>
      <div class='bg-inner'></div>
    </div>
    <div class='bg'>
      <div class='bg-inner'></div>
    </div>
  </div>
  <div class='control block-cube block-input'>
    <input  placeholder='Password' type='password' name="txt_password"required="required">
    <div class='bg-top'>
      <div class='bg-inner'></div>
    </div>
    <div class='bg-right'>
      <div class='bg-inner'></div>
    </div>
    <div class='bg'>
      <div class='bg-inner'></div>
    </div>
  </div>
  <button class='btn block-cube block-cube-hover' type='submit' name="btn_login">
    <div class='bg-top'>
      <div class='bg-inner'></div>
    </div>
    <div class='bg-right'>
      <div class='bg-inner'></div>
    </div>
    <div class='bg'>
      <div class='bg-inner'></div>
    </div>
    <div class='text'>
      Log In
    </div>
  </button>
  <div class='credits'>
    <a href='https://codepen.io/marko-zub/' target='_blank'>
      My other codepens
    </a>
  </div>
</form>
<!-- partial -->
  
</body>
</html>
