<?php
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['admin_role'])) {
    if (isset($_POST['pass'])) {
        include '../controls/connection.php';
        $grade = $_POST['grade'];
        $newGrade = $grade + 1;
        $sql1 = "UPDATE grade_class_tbl SET grade_id='$newGrade' WHERE grade_id='$grade'";
        if (mysqli_query($con, $sql1)) {
            $sql2 = "UPDATE grade_subject_tbl SET grade_id='$newGrade' WHERE grade_id='$grade'";
            if (mysqli_query($con, $sql2)) {
                $sm = "Grade $grade passed to Grade $newGrade";
                header("Location: ../pages/admin/upgrade.php?success=$sm");
                exit;
            } else {
                // unknown error -> updating grade_subject_tbl
            }
            // $sm = "Grade $grade passed";
            // header("Location: ../pages/admin/upgrade.php?success=$sm");
            // exit;
        } else {
            $em = "Unknown error";
            header("Location: ../pages/admin/upgrade.php?error=$em");
            exit;
        }
    }
}