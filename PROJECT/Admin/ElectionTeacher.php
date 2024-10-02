<?php
include("../Assets/Connection/Connection.php");
ob_start();
include("Header.php");
if(isset($_POST["btn_submit"]))
{
       $name=$_POST['txt_name'];
	   $email=$_POST['txt_email'];
	   $password=$_POST['txt_password'];
	   
	   $contact=$_POST['txt_contact'];
	   
	   $proof=$_FILES['file_proof']['name'];
	   $path=$_FILES ['file_proof']['tmp_name'];
	   move_uploaded_file($path,"../Assets/Files/User/".$proof);
	   
	    $photo=$_FILES['file_photo']['name'];
	   $path=$_FILES ['file_photo']['tmp_name'];
	   move_uploaded_file($path,"../Assets/Files/User/".$photo);
	   
	   
	   
	   $ins="insert into tbl_electionteacher(electionteacher_name,electionteacher_email,electionteacher_password,electionteacher_contact,electionteacher_proof,electionteacher_photo) values('".$name."','".$email."','".$password."','".$contact."','".$proof."','".$photo."')";
	 //echo $ins;
	   if($con->query($ins))
	 {
		 echo "inserted";
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
<div class="container mt-5">
    <form action="" method="post" enctype="multipart/form-data" name="form8" id="form8">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="txt_name">Name</label>
                    <input type="text" class="form-control" name="txt_name" id="txt_name"  required pattern="^[A-Z][a-zA-Z ]*$" title="Name must start with a capital letter and contain only alphabets and spaces"/>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="txt_email">Email</label>
                    <input type="email" class="form-control" name="txt_email" id="txt_email" required pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}" title="Enter a valid email address"/>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="txt_password">Password</label>
                    <input type="password" class="form-control" name="txt_password" id="txt_password" 
       required="required" 
       pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
       title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">

                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="file_proof">Proof</label>
                    <input type="file" class="form-control-file" name="file_proof" id="file_proof" required="required"/>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="file_photo">Photo</label>
                    <input type="file" class="form-control-file" name="file_photo" id="file_photo" required="required"/>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="txt_contact">Contact</label>
                    <input type="text" class="form-control" name="txt_contact" id="txt_contact" required="required" pattern="[7-9]{1}[0-9]{9}" title="Phone number with 7-9 and remaing 9 digit with 0-9" />
                </div>
            </div>
        </div>
        <div class="row justify-content-center mt-3">
            <div class="col-md-6 text-center">
                <input type="submit" class="btn btn-primary" name="btn_submit" id="btn_submit" value="Submit" />
            </div>
        </div>
    </form>
</div>


</body>
</html>
<?php 
ob_end_flush();
include("Footer.php");
?>