<?php
ob_start();
include('Header.php');
session_start();
include("../Assets/Connection/Connection.php");

if (isset($_GET['aid'])) {
    $upQry = "UPDATE tbl_user SET user_status = 1 WHERE user_id = " . $_GET['aid'];
    $con->query($upQry);
}

if (isset($_GET['rid'])) {
    $upQry = "UPDATE tbl_user SET user_status = 2 WHERE user_id = " . $_GET['rid'];
    $con->query($upQry);
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
$selQry = "SELECT * 
            FROM tbl_election e 
            INNER JOIN tbl_assignelectionteacher a ON e.election_id = a.election_id 
            INNER JOIN tbl_user u ON a.batch_id = u.batch_id  
            INNER JOIN tbl_batch ba ON u.batch_id = ba.batch_id  
            INNER JOIN tbl_department dep ON ba.department_id = dep.department_id 
            WHERE a.teacher_id = " . $_SESSION['etid'] . " AND user_status = 0";

$result = $con->query($selQry);
?>
<br>
<div align="center">
    <h1>PENDING LIST</h1>
    <table width="1000" border="1">
        <tr>
            <td width="147">SI no</td>
            <td width="146">Name</td>
            <td width="145">Email</td>
            <td width="103">Admission no</td>
            <td width="103">Department name</td>
            <td width="100">Batch name</td>
            <td width="99">Roll no</td>
            <td width="105">Status</td>
        </tr>
        <?php
        $i = 0;
        while ($row = $result->fetch_assoc()) {
            $i++;
            ?>
            <tr>
                <td> <?php echo $i ?> </td>
                <td><?php echo $row["user_name"] ?></td>
                <td><?php echo $row["user_email"] ?></td>
                <td><?php echo $row["user_admissionno"] ?></td>
                <td><?php echo $row["department_name"] ?></td>
                <td><?php echo $row["batch_name"] ?></td>
                <td><?php echo $row["user_rollno"] ?></td>
                <td><a href="VoterVerification.php?aid=<?php echo $row["user_id"] ?>">Accept</a>
                    <a href="VoterVerification.php?rid=<?php echo $row["user_id"] ?>">Reject</a></td>
            </tr>
            <?php
        }
        ?>
    </table>
</div>

<?php
$selQry = "SELECT * 
            FROM tbl_election e 
            INNER JOIN tbl_assignelectionteacher a ON e.election_id = a.election_id 
            INNER JOIN tbl_user u ON a.batch_id = u.batch_id 
            INNER JOIN tbl_batch ba ON u.batch_id = ba.batch_id  
            INNER JOIN tbl_department dep ON ba.department_id = dep.department_id 
            WHERE a.teacher_id = " . $_SESSION['etid'] . " AND user_status = 1";

$result = $con->query($selQry);
?>
<br><br><br><br>

<div align="center">
    <h1>ACCEPTED LIST</h1>
    <table width="1000" border="1">
        <tr>
            <td width="147">SI no</td>
            <td width="146">Name</td>
            <td width="145">Email</td>
            <td width="103">Admission no</td>
            <td width="103">Department name</td>
            <td width="100">Batch name</td>
            <td width="99">Roll no</td>
            <td width="105">Status</td>
        </tr>
        <?php
        $i = 0;
        while ($row = $result->fetch_assoc()) {
            $i++;
            ?>
            <tr>
                <td> <?php echo $i ?> </td>
                <td><?php echo $row["user_name"] ?></td>
                <td><?php echo $row["user_email"] ?></td>
                <td><?php echo $row["user_admissionno"] ?></td>
                <td><?php echo $row["department_name"] ?></td>
                <td><?php echo $row["batch_name"] ?></td>
                <td><?php echo $row["user_rollno"] ?></td>
                <td><a href="VoterVerification.php?rid=<?php echo $row["user_id"] ?>">Reject</a></td>
            </tr>
            <?php
        }
        ?>
    </table>
</div>

<?php
$selQry = "SELECT * 
            FROM tbl_election e 
            INNER JOIN tbl_assignelectionteacher a ON e.election_id = a.election_id 
            INNER JOIN tbl_user u ON a.batch_id = u.batch_id 
            INNER JOIN tbl_batch ba ON u.batch_id = ba.batch_id  
            INNER JOIN tbl_department dep ON ba.department_id = dep.department_id 
            WHERE a.teacher_id = " . $_SESSION['etid'] . " AND user_status = 2";

$result = $con->query($selQry);
?>
<br><br><br>

<div align="center">
    <h1>REJECTED LIST</h1>
    <table width="1000" border="1">
        <tr>
            <td width="147">SI no</td>
            <td width="146">Name</td>
            <td width="145">Email</td>
            <td width="103">Admission no</td>
            <td width="103">Department name</td>
            <td width="100">Batch name</td>
            <td width="99">Roll no</td>
            <td width="105">Status</td>
        </tr>
        <?php
        $i = 0;
        while ($row = $result->fetch_assoc()) {
            $i++;
            ?>
            <tr>
                <td> <?php echo $i ?> </td>
                <td><?php echo $row["user_name"] ?></td>
                <td><?php echo $row["user_email"] ?></td>
                <td><?php echo $row["user_admissionno"] ?></td>
                <td><?php echo $row["department_name"] ?></td>
                <td><?php echo $row["batch_name"] ?></td>
                <td><?php echo $row["user_rollno"] ?></td>
                <td><a href="VoterVerification.php?aid=<?php echo $row["user_id"] ?>">Accept</a></td>
            </tr>
            <?php
        }
        ?>
    </table>
</div>
</body>
</html>
<?php
ob_end_flush();
include('Footer.php');
?>
