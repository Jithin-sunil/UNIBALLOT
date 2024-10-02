<?php
include("../Assets/Connection/Connection.php");
if(isset($_POST["btn_submit"]))
{
       $name=$_POST['txt_name'];
	   $email=$_POST['txt_email'];
	   $password=$_POST['txt_password'];
	   $admissionno=$_POST["txt_admissionno"];
	   $batch=$_POST['select_batch'];
	   $rollno=$_POST['txt_rollno'];
	   
	   $image=$_FILES['photo']['name'];
	   $path=$_FILES ['photo']['tmp_name'];
	   move_uploaded_file($path,"../Assets/Files/User/".$image);
	   
	   $ins="insert into tbl_user(user_name,user_email,user_photo,batch_id,user_password,user_admissionno,user_rollno) values('".$name."','".$email."','".$image."','".$batch."','".$password."','".$admissionno."','".$rollno."')";
	 //echo $ins;
	   if(mysql_query($ins))
	 {
		 echo "inserted";
	 }
	 else
	 {
		 echo "error";
	 }
}
 ?>
<html>
<head>
<title>USER REGISTRATION</title>
</head>

<body>	
<h1 align="center">USER REGISTRATION</h1>
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table width="200" border="1" align="center">
    <tr>
      <td>Name</td>
      <td><label for="txt_name"></label>
      <input required type="text" name="txt_name"  id="txt_name" required pattern="^[A-Z][a-zA-Z ]*$" title="Name must start with a capital letter and contain only alphabets and spaces" ></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><label for="txt_email"></label>
      <input type="email" required name="txt_email" id="txt_email" required pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}" title="Enter a valid email address"></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><label for="txt_password"></label>
      <input type="password" class="form-control" name="txt_password" id="txt_password" 
       required="required" 
       pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
       title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
    </tr>
    <tr>
      <td>Admission no</td>
      <td><label for="txt_admissionno"></label>
      <input type="text" name="txt_admissionno" required id="txt_admissionno"required="required"></td>
    </tr>
     <tr>
      <td>Department</td>
      <td><label for="select_department"></label>
        <select name="select_department" required id="select_department" onChange="getBatch(this.value)" >
        <option>...select...</option>
        <?php 
		$sel="select * from tbl_department";
		//echo $sel;
		$res=mysql_query($sel);
		while($data=mysql_fetch_array($res))
		{
			?>
			<option value="<?php echo $data["department_id"]; ?>"><?php echo $data["department_name"]; ?></option>
			<?php
		}
		?>
      </select></td>
    </tr>
    <tr>
      <td>Batch</td>
      <td><label for="select_batch"></label>
        <select name="select_batch" required id="select_batch" >
        <option>...select...</option>
       
      </select></td>
    </tr>
    <tr>
      <td>Photo</td>
      <td><label for="photo"></label>
      <input type="file" name="photo" required id="photo"required="required" ></td>
    </tr>
    <tr>
      <td>rollno</td>
      <td><label for="txt_rollno"></label>
      <input type="text" name="txt_rollno" required id="txt_rollno"required="required"></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="btn_submit" id="btn_submit" value="Submit"></td>
    </tr>
  </table>
</form>
<script src="../Assets/JQ/jQuery.js"></script>
<script>
function getBatch(did)
{
	$.ajax({
		url:"../Assets/AjaxPages/AjaxBatchSelect.php?did="+did,
		success: function(html){
			$("#select_batch").html(html);
		}
	});
}
  </script>
</body>
</html>