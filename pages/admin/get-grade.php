<?php
include '../../controls/connection.php';
$sec_id = $_POST['sec_id'];

$sql1 = "SELECT sec_name FROM section_tbl WHERE sec_id='$sec_id'";
$result1 = mysqli_query($con, $sql1);
$row = mysqli_fetch_assoc($result1);
$sec_name = $row['sec_name'];
$exploded_txt = explode(" - ", $sec_name);

if ($exploded_txt[0] >= 1 && $exploded_txt[1] <= 5) {
    $sql2 = "SELECT * FROM grade_tbl WHERE grade_name <= 5";
} elseif ($exploded_txt[0] >= 6 && $exploded_txt[1] <= 9) {
    $sql2 = "SELECT * FROM grade_tbl WHERE grade_name <= 9 AND grade_name >= 6";
} elseif ($exploded_txt[0] >= 10 && $exploded_txt[1] <= 11) {
    $sql2 = "SELECT * FROM grade_tbl WHERE grade_name <= 11 AND grade_name >= 10";
} else {
    $sql2 = "SELECT * FROM grade_tbl WHERE grade_name <= 13 AND grade_name >= 12";
}

$result2 = mysqli_query($con, $sql2);
while ($row1 = mysqli_fetch_assoc($result2)) {
    echo "<option value='" . $row1['grade_id'] . "'>" . $row1['grade_name'] . "</option>";
}
