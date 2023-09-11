<?php
$grade = $_POST['grade'];
include '../../controls/connection.php';
if ($grade >= 0 && $grade <= 11) {
    $sql = "SELECT * FROM class_tbl WHERE type=0";
} else {
    $sql = "SELECT * FROM class_tbl WHERE type=1";
}

$result = mysqli_query($con, $sql);
while ($row = mysqli_fetch_assoc($result)) {
    echo "<option value='" . $row['class_id'] . "'>" . $row['class_name'] . "</option>";
}
