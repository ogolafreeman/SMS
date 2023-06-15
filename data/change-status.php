<?php
include '../controls/connection.php';
if (isset($_POST['change'])) {
    $admission_no = $_GET['admission_no'];

    $sql1 = "SELECT std_id FROM student_tbl WHERE admission_no='$admission_no'";
    $result1 = mysqli_query($con, $sql1);
    $row = mysqli_fetch_assoc($result1);
    $std_id = $row['std_id'];

    $sql2 = "UPDATE student_marks_watched_tbl SET is_watched='1' WHERE std_id='$std_id'";
    if (mysqli_query($con, $sql2)) {
        $sm = "Updated!";
        header("Location: ../pages/students/show-marks.php?success=$sm");
        exit;
    } else {
        $em = "Unknown error occurred";
        header("Location: ../pages/students/show-marks.php?success=$em");
        exit;
    }
}
