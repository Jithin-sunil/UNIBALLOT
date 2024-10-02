<option value="">----Select----</option>

<?php
include("../Connection/Connection.php");

$department = $_GET["did"];
$selQry = "SELECT b.batch_id, b.batch_name 
            FROM tbl_batch b
            LEFT JOIN tbl_assignelectionteacher ae ON b.batch_id = ae.batch_id
            WHERE ae.assignelectionteacher_id IS NULL
            AND b.department_id = '$department'";

$data = $con->query($selQry);

while ($row = $data->fetch_assoc()) {
    ?>
    <option value="<?php echo $row['batch_id']; ?>">
        <?php echo $row['batch_name']; ?>
    </option>
    <?php
}
?>
