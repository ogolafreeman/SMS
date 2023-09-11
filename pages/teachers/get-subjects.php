<?php
include '../../controls/connection.php';

$query = $_POST['query'];

$sql1 = "SELECT * FROM student_class_tbl sct INNER JOIN student_tbl st ON (sct.std_id = st.std_id) WHERE st.admission_no='$query'";
$result1 = mysqli_query($con, $sql1);
if (mysqli_num_rows($result1) == 1) {
    $row1 = mysqli_fetch_assoc($result1);
    $std_id = $row1['std_id'];

    $sql2 = "SELECT DISTINCT st.sub_id, st.sub_name FROM subject_tbl st INNER JOIN al_marks_tbl almt ON (st.sub_id = almt.sub_id) WHERE almt.std_id='$std_id' AND NOT almt.marks=''";
    $result2 = mysqli_query($con, $sql2);
    if (mysqli_num_rows($result2) > 0) {
        while ($row2 = mysqli_fetch_assoc($result2)) {
            echo "<option value='" . $row2['sub_id'] . "'>" . $row2['sub_name'] . "</option>";
        }
    }
}
