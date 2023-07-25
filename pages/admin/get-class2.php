<?php
include '../../controls/connection.php';
$grade = $_POST['grade'];

if ($grade >= 1 && $grade <= 11) {
    $sql2 = "SELECT * FROM class_tbl WHERE type='0'";
} else {
    $sql2 = "SELECT * FROM class_tbl WHERE type='1'";
}

$result2 = mysqli_query($con, $sql2);
while ($row1 = mysqli_fetch_assoc($result2)) {
    echo "<option value='" . $row1['class_id'] . "'>" . $row1['class_name'] . "</option>";
}