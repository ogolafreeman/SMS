<?php
include '../../controls/connection.php';

$query = $_POST['query'];

$sql1 = "SELECT std_id FROM student_tbl WHERE admission_no='$query'";
$result1 = mysqli_query($con, $sql1);
if (mysqli_num_rows($result1) == 1) {
    $row1 = mysqli_fetch_assoc($result1);
    $std_id = $row1['std_id'];

    $sql2 = "SELECT DISTINCT grade_id FROM al_marks_tbl WHERE std_id='$std_id'";
    $result2 = mysqli_query($con, $sql2);
    if (mysqli_num_rows($result2) > 0) {
        while ($row2 = mysqli_fetch_assoc($result2)) {
            $grade = $row2['grade_id'];
            echo "<option value='$grade'>$grade</option>";
        }
    } else {
    }
} else {
}
