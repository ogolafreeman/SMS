<?php
include '../../controls/connection.php';
$sec_id = $_POST['sec_id'];

$sql1 = "SELECT sec_name FROM section_tbl WHERE sec_id='$sec_id'";
$result1 = mysqli_query($con, $sql1);
$row = mysqli_fetch_assoc($result1);
$sec_name = $row['sec_name'];
$exploded_txt = explode(" - ", $sec_name);

if ($exploded_txt[0] >= 1 && $exploded_txt[1] <= 11) {
    $sql2 = "SELECT * FROM class_tbl WHERE type='0'";
} else {
    $sql2 = "SELECT * FROM class_tbl WHERE type='1'";
}

$result2 = mysqli_query($con, $sql2);
while ($row1 = mysqli_fetch_assoc($result2)) {
    echo "<option value='" . $row1['class_id'] . "'>" . $row1['class_name'] . "</option>";
}
