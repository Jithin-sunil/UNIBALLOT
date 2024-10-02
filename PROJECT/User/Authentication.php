<?php
ob_start();
include('Header.php');
include("../Assets/Connection/Connection.php");
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body align="center">

<?php
$SelQry = "select * from tbl_result r inner join tbl_user u on r.user_id = u.user_id inner join tbl_batch b on b.batch_id = u.batch_id inner join tbl_assignelectionteacher ag on b.batch_id = ag.batch_id inner join tbl_election e on e.election_id = ag.election_id where u.user_id = ".$_SESSION['uid']; 
$Result = $con->query($SelQry);
if($row = $Result->fetch_assoc()){
   
}
else{
    ?>
    <a href="Vote.php"><h1>Vote</h1></a>
   <?php
}
?>
   
</body>
</html>
<?php
ob_end_flush();
include('Footer.php');
?>
