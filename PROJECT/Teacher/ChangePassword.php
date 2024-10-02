<?php
ob_start();
include('Header.php');
session_start();
include("../Assets/Connection/Connection.php");

if (isset($_POST["update"])) {
    // Get the current password from the database
    $selQry = "SELECT * FROM tbl_electionteacher WHERE electionteacher_id = " . $_SESSION['etid'];
    $result = $con->query($selQry);
    $data = $result->fetch_assoc();

    $newpass = $_POST['newpass'];
    
    // Query to update the password
    $upQry = "UPDATE tbl_electionteacher SET electionteacher_password = '" . $newpass . "' WHERE electionteacher_id = " . $_SESSION['etid'];
    
    // Check if the current password matches the one in the database
    if ($data['electionteacher_password'] == $_POST['pass']) {
        // Check if the new password and confirmation password match
        if ($_POST['newpass'] == $_POST['newpass2']) {
            // Perform the update query
            if ($con->query($upQry)) {
                echo "Updated";
            } else {
                echo "Error updating password.";
            }
        } else {
            echo "New password and confirmation do not match.";
        }
    } else {
        echo "Current password is incorrect.";
    }
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Change Password</title>
</head>

<body>

<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1">
    <tr>
      <td>Current Password</td>
      <td>
        <input type="password" name="pass" id="pass" required="required"/>
      </td>
    </tr>
    <tr>
      <td>New Password</td>
      <td>
        <input type="password" class="form-control" name="newpass" id="newpass" required="required" 
        pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
        title="Must contain at least one number, one uppercase and lowercase letter, and at least 8 or more characters">
      </td>
    </tr>
    <tr>
      <td>Confirm New Password</td>
      <td>
        <input type="password" name="newpass2" id="newpass2" required="required"/>
      </td>
    </tr>
    <tr>
      <td height="23" colspan="2" align="center">
        <input type="submit" name="update" id="update" value="Update" />
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
