<?php
ob_start();
include('Header.php');
session_start();
include("../Assets/Connection/Connection.php");

// Assuming you have already established your mysqli connection as $con
if(isset($_GET['aid'])) {
    $upQry = "UPDATE tbl_result SET polling_status = 1 WHERE polling_id = " . intval($_GET['aid']);
    $con->query($upQry);
}

if(isset($_GET['rid'])) {
    $upQry = "UPDATE tbl_result SET polling_status = 2 WHERE polling_id = " . intval($_GET['rid']);
    $con->query($upQry);
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Vote Verification</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- Your custom styles or additional styles can go here -->
</head>

<body>

<?php
$selQry = "
SELECT *, 
       ud2.user_name AS candidate,
       ud.user_name AS voter,
       ud.user_rollno AS rollnum, 
       ud.user_admissionno AS adno
FROM tbl_result AS rd
INNER JOIN tbl_user AS ud ON rd.user_id = ud.user_id
INNER JOIN tbl_candidate AS cg ON rd.candidate_id = cg.candidate_id 
INNER JOIN tbl_user ud2 ON cg.user_id = ud2.user_id
WHERE rd.user_id IN (
    SELECT u.user_id
    FROM tbl_user AS u
    WHERE u.batch_id = (
        SELECT b.batch_id
        FROM tbl_batch AS b
        INNER JOIN tbl_assignelectionteacher AS a ON b.batch_id = a.batch_id
        WHERE a.teacher_id = " . $_SESSION['etid']. "
    )
) AND rd.polling_status = 0";

$result = $con->query($selQry);
?>

<div class="container mt-5">
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <td>SI no</td>
                <td width="146">Name</td>
                <td width="146">Candidate</td>
                <td width="103">Admission no</td>
                <td width="99">Roll no</td>
                <td width="105">Status</td>
            </tr>
        </thead>
        <tbody>
        <?php
        $i = 0;
        while($row = $result->fetch_assoc()) {
            $i++;
            ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo htmlspecialchars($row["voter"]); ?></td>
                <td><?php echo htmlspecialchars($row["candidate"]); ?></td>
                <td><?php echo htmlspecialchars($row["adno"]); ?></td>
                <td><?php echo htmlspecialchars($row["rollnum"]); ?></td>
                <td>
                    <a href="VoteVerification.php?aid=<?php echo $row["polling_id"]; ?>" class="btn btn-success">Accept</a>
                    <a href="VoteVerification.php?rid=<?php echo $row["polling_id"]; ?>" class="btn btn-danger">Reject</a>
                </td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
</div>
</body>
</html>

<?php
ob_end_flush();
include('Footer.php');
?>
