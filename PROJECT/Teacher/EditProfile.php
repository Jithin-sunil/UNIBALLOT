<?php
ob_start();
include('Header.php');
session_start();
include("../Assets/Connection/Connection.php");

if (isset($_POST["btn_submit"])) {
    $name = $_POST['txt_name'];
    $email = $_POST['txt_email'];
    $contact = $_POST['txt_contact'];

    $upQry = "UPDATE tbl_electionteacher SET electionteacher_name = '$name', electionteacher_email = '$email', electionteacher_contact = '$contact' WHERE electionteacher_id = " . $_SESSION['etid'];

    if ($con->query($upQry) === TRUE) {
        echo "Updated";
    } else {
        echo "error: " . $con->error;
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
$selQry = "SELECT * FROM tbl_electionteacher WHERE electionteacher_id = " . $_SESSION['etid'];
$result = $con->query($selQry);
$data = $result->fetch_assoc();
?>
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1">
    <tr>
      <td>Name</td>
      <td>
        <label for="name"></label>
        <input type="text" name="txt_name" id="txt_name" value="<?php echo $data['electionteacher_name'] ?>" required="required" />
      </td>
    </tr>
    <tr>
      <td>Email</td>
      <td>
        <label for="txt_email"></label>
        <input type="email" name="txt_email" id="txt_email" value="<?php echo $data['electionteacher_email'] ?>" required pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}" title="Enter a valid email address" />
      </td>
    </tr>
    <tr>
      <td>Contact</td>
      <td>
        <label for="txt_contact"></label>
        <input type="text" name="txt_contact" id="txt_contact" value="<?php echo $data['electionteacher_contact'] ?>" required="required" pattern="[7-9]{1}[0-9]{9}" title="Phone number with 7-9 and remaining 9 digits with 0-9" />
      </td>
    </tr>
    <tr>
      <td colspan="2">
        <input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
        <input type="reset" name="cancel" id="cancel" value="Cancel" />
      </td>
    </tr>
  </table>
  <p>&nbsp;</p>
</form>
</body>
</html>
<?php
ob_end_flush();
include('Footer.php');
?>
