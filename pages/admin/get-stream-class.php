<?php
include '../../controls/connection.php';
$stream = $_POST['stream'];

$sql = "SELECT class_name FROM class_tbl ct INNER JOIN class_stream_tbl cst ON (ct.class_id = cst.class_id) WHERE cst.stream_id='$stream'";
$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<option value='" . $row['class_id'] . "'>" . $row['class_name'] . "</option>";
    }
}
