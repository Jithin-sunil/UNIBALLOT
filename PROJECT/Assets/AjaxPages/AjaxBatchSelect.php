<option value="">----Select----</option>

<?php
include("../Connection/Connection.php");

$department = $_GET["did"];
$selQry = "SELECT *
            FROM tbl_batch WHERE department_id = '$department'";

$data = $con->query($selQry);

while ($row = $data->fetch_assoc()) {
    ?>
    <option value="<?php echo $row['batch_id']; ?>">
        <?php echo $row['batch_name']; ?>
    </option>
    <?php
}
?>
