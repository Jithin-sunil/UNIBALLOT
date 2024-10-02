<?php
ob_start();
include('Header.php');
session_start();
include("../Assets/Connection/Connection.php");
if(isset($_GET['aid']))
{
  echo $delQry = "delete from tbl_candidate where user_id = ".$_GET['aid'];
  if($con->query($delQry))
{
    header('location:Withdraw.php');
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<a href="Withdraw.php?aid=<?php echo $_SESSION['uid']?>">WithDraw</a>
</body>
</html>
<?php
ob_end_flush();
include('Footer.php');
?>