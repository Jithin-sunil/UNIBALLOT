<?php
ob_start();
include('Header.php');
include("../Assets/Connection/Connection.php");
session_start();

?>
<!DOCTYPE html
	PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Untitled Document</title>
</head>

<body>
	<table width="200" border="1" align="center">
		<tr>
			<td>SL.No</td>
			<td> Name</td>
			<td>
				<div align="center">Details</div>
			</td>
			<td>Election Date</td>
			<td>Election Time</td>
			<td>Apply to be a Candidate</td>
			
		</tr>

		<?php
	   $i=0;
	  $selQry = "select * from tbl_assignelectionteacher r inner join tbl_election el on r.election_id=el.election_id inner join tbl_batch b on r.batch_id=b.batch_id inner join tbl_user u on b.batch_id = u.batch_id where u.user_id=".$_SESSION['uid'];
	   $data   =  query($selQry);
	   if($row = $data->fetch_assoc())
	   {
		    ?>
		<tr>
			<td>
				<?php echo $i ?>
			</td>
			<td>
				<?php echo $row["election_name"]?>
			</td>
			<td>
				<?php echo $row["election_details"]?>
			</td>
			<td>
				<?php echo $row["election_date"]?>
			</td>
			<td>
				<?php echo $row["election_time"]?>
			</td>
			<td>

				<?php
$selQry2 = "SELECT *,
    DATE_SUB(e.election_date, INTERVAL 2 DAY) AS two_days_before_election
    FROM tbl_election e
    INNER JOIN tbl_assignelectionteacher a ON e.election_id = a.election_id
    INNER JOIN tbl_batch b ON a.batch_id = b.batch_id
    INNER JOIN tbl_user u ON b.batch_id = u.batch_id
    WHERE u.user_id = " . $_SESSION['uid'] . "
    AND DATE_SUB(e.election_date, INTERVAL 2 DAY) >= CURDATE()";

$data2 = $con->query($selQry2);



 $selQry23="select * from tbl_candidate where user_id = ".$_SESSION['uid'];
$data23 = $con->query($selQry23);

// Fetch the result into $row2.
if (($row2 = $data2->fetch_assoc()) && (num_rows($data23)<=0)) {
    ?>
				<a href="ViewElection.php?eid=<?php echo $row2[" assignelectionteacher_id"] ?>">Click Here</a>
				<?php
}
?>



				<?php
				 $selQry1 = "SELECT *
					FROM tbl_election e 
					INNER JOIN tbl_assignelectionteacher a ON e.election_id = a.election_id 
					INNER JOIN tbl_batch b ON a.batch_id = b.batch_id 
					INNER JOIN tbl_user u ON b.batch_id = u.batch_id 
					WHERE u.user_id = " . $_SESSION['uid'] . "
					AND e.election_date = CURDATE() 
					AND HOUR(NOW()) BETWEEN 9 AND 12";

					$data1   =  $con->query($selQry1);

					// Execute your query here and fetch the result into $row.

					if ($row1 = $data1->fetch_assoc()) {
						?>
				<a href="Authentication.php">Vote</a>
				<?php	
				}
					?>




			</td>

		</tr>
		<?php
				  
			if(isset($_GET["eid"]))
			{
				   
				   
				   
				   $ins="insert into tbl_candidate(user_id,election_id,batch_id,submission_date) values('".$_SESSION['uid']."','".$row['election_id']."','".$row['batch_id']."',curdate())";
				 
				 
				   if($con->query($ins))
				 {
					 header('location:ViewElection.php');
				 }
				 else
				 {
					 echo "error";
				 }
			}
	   }
	   ?>
	</table>

	<?php

$selQry = "SELECT * FROM tbl_user  f inner join tbl_candidate ct on f.user_id = ct.user_id
		  WHERE f.user_id IN (
			  SELECT c.user_id
			  FROM tbl_candidate c
			  INNER JOIN tbl_user u ON c.batch_id = u.batch_id
			  WHERE u.user_id = " . $_SESSION['uid'] . ") and ct.candidate_status = 1";

$result = $con->query($selQry);


?>
<br><br><br><br><br>
	<div align="center">
		<table width="1000" border="1">
			<tr>
				<td width="">SI no</td>
				<td width="">Candidate Name</td>


			</tr>
			<?php
	  $i=0;
	  while($row = $result->fetch_assoc())
	  {
		   $i++;
		   ?>




			<tr>
				<td>
					<?php echo $i ?>
				</td>

				<td>
					<?php echo $row["user_name"]?>
				</td>









			</tr>

			<?php
	  }
	 ?>
		</table>
	</div>
</body>
<?php
ob_end_flush();
include('Footer.php');
?>
</html>