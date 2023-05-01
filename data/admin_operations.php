<?php
require '../../controls/connection.php';
// Get all the teachers
function getAllTeachers()
{
    require '../../controls/connection.php';
    $sql = "SELECT * FROM teacher_tbl";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) >= 1) {
        $teachers = mysqli_fetch_all($result);
        return $teachers;
    } else {
        return 0;
    }
}

// Delete selected teacher
function removeTeacher($id, $con)
{
    $sql = "DELETE FROM teacher_tbl WHERE teacher_id='$id'";
    if (mysqli_query($con, $sql)) {
        return 1;
    } else {
        return 0;
    }
}


// get the selected teachers data for updating
function getTeacherById($id, $con)
{
    $sql = "SELECT * FROM teacher_tbl WHERE teacher_id='$id'";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) == 1) {
        $teacher_data = mysqli_fetch_assoc($result);
        return $teacher_data;
    } else {
        return 0;
    }
}

function getAllStudents()
{
    require '../../controls/connection.php';
    $sql = "SELECT * FROM student_tbl WHERE status=1";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) >= 1) {
        $students = mysqli_fetch_all($result);
        return $students;
    } else {
        return 0;
    }
}

// Delete selected student
function removeStudent($id, $con)
{
    $sql = "DELETE FROM teacher_tbl WHERE teacher_id='$id'";
    if (mysqli_query($con, $sql)) {
        return 1;
    } else {
        return 0;
    }
}


// get the selected student data for updating
function getStudentById($id, $con)
{
    $sql = "SELECT * FROM teacher_tbl WHERE teacher_id='$id'";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) == 1) {
        $teacher_data = mysqli_fetch_assoc($result);
        return $teacher_data;
    } else {
        return 0;
    }
}
