<?php
$fname="";
$lname="";
$gender="";
$marital="";
$department="";
$Basic_Salary="";
$DEDUCTION="";
$NET="";
if(isset($_POST["submit"]))
{
$fname=$_POST["fname"];
$lname=$_POST["lname"];
$gender=$_POST["gen"];
$marital=$_POST["mar"];
$department=$_POST["department"];
$basicsalary=$_POST["basicsalary"];
}
if(isset($_POST["basicsalary"]))
{
	if($basicsalary>=10000)
	{
		$TA=(40/100) *$basicsalary;
		$DA=(35/100) *$basicsalary;
		$HRA=(30/100) *$basicsalary;
		$LIC=(25/100) *$basicsalary;
		$PF=(20/100) *$basicsalary;
	}
	if($basicsalary>=5000 && $basicsalary<10000)
	{
		$TA=(35/100) *$basicsalary;
		$DA=(30/100) *$basicsalary;
		$HRA=(25/100) *$basicsalary;
		$LIC=(20/100) *$basicsalary;
		$PF=(15/100) *$basicsalary;
	}
	if($basicsalary>5000)
	{
		$TA=(30/100) *$basicsalary;
		$DA=(25/100) *$basicsalary;
		$HRA=(20/100) *$basicsalary;
		$LIC=(15/100) *$basicsalary;
		$PF=(10/100) *$basicsalary;
	}
	$DEDUCTION=$LIC + $PF;
	$NET=$basicsalary+$TA+$DA+$HRA-$DEDUCTION;
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>
<center>
<form id="form1" name="form1" method="post" action="">
<table border="1">
<tr>
<th>Fisrt name</th>
<td><input type="text" name="fname"></td>
</tr>
<tr>
<th>Last name</th>
<td><input type="text" name="lname"></td>
</tr>
<tr>
<th>Gender</th>
<th><input type="radio" name="gen" value="male">male
<input type="radio" name="gen" value="female">female</th>
<tr>
<th>Martial</th>
<th><input type="radio" name="mar" value="single">single 
<input type="radio" name="mar" value="married">married
</th>
</tr>
<tr>
<th>Department</th>
<td><select name="department">
	<option>select</option>
	<option>bca </option>
	<option>bsc </option>
	<option>ba </option>
</select>
</td>
</tr>
<tr>
<th>Basic_Salary</th>
<td><input type="number" name="basicsalary"></td>
</tr>
<tr>
<td align="center" colspan=2>
<input type="submit" name="submit">
<input type="reset" name="cancel">
</tr>

<tr>
<th>Name</th>
<td><?php echo $fname," ",$lname;?></td>
</tr>
<tr>
<th>Gender</th>
<td><?php echo $gender;?></td>
</tr>
<tr>
<th>marital</th>
<td><?php echo $marital;?></td>
</tr>
<tr>
<th>Department</th>
<td><?php echo $department;?></td>
</tr>
<tr>
<th>Basic_Salary</th>
<td><?php echo $basicsalary;?></td>
</tr>
<tr>
<th>TA</th>
<td><?php echo $TA;?></td>
</tr>
<tr>
<th>DA</th>
<td><?php echo $DA;?></td>
</tr>
<tr>
<th>HRA</th>
<td><?php echo $HRA;?></td>
</tr>
<tr>
<th>LIC</th>
<td><?php echo $LIC;?></td>
</tr>
<tr>
<th>PF</th>
<td><?php echo $PF;?></td>
</tr>
<tr>
<th>DEDUCTION</th>
<td><?php echo $DEDUCTION;?></td>
</tr>
<tr>
<th>NET</th>
<td><?php echo $NET;?></td>
</tr>
</table>
</form>
</center>
</body>
</html>