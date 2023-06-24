<?php
require '../../controls/connection.php';
// Get all the teacherss
/**
 * Summary of getAllTeachers
 * @return array|int
 */
function getAllTeachers()
{
    require '../../controls/connection.php';
    $sql = "SELECT * FROM staff_tbl st INNER JOIN user_tbl ut ON (st.nic = ut.nic) WHERE ( st.status='1' AND NOT ut.role_id='1' )";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) >= 1) {
        $teachers = mysqli_fetch_all($result);
        return $teachers;
    } else {
        return 0;
    }
}



// Delete selected teacher
/**
 * Summary of removeTeacher
 * @param mixed $id
 * @param mixed $con
 * @return int
 */
function removeTeacher($id, $con)
{
    $sql = "UPDATE staff_tbl SET status='0' WHERE staff_id='$id'";
    if (mysqli_query($con, $sql)) {
        return 1;
    } else {
        return 0;
    }
}


// get the selected teachers data for updating
/**
 * Summary of getTeacherById
 * @param mixed $id
 * @param mixed $con
 * @return array|bool|int|null
 */
function getTeacherById($id, $con)
{
    $sql = "SELECT * FROM staff_tbl WHERE staff_id='$id'";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) == 1) {
        $teacher_data = mysqli_fetch_assoc($result);
        return $teacher_data;
    } else {
        return 0;
    }
}

/**
 * Summary of getAllStudents
 * @return array|int
 */
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
/**
 * Summary of removeStudent
 * @param mixed $id
 * @param mixed $con
 * @return int
 */
function removeStudent($id, $con)
{
    $sql = "UPDATE student_tbl SET status='0' WHERE std_id='$id'";
    if (mysqli_query($con, $sql)) {
        return 1;
    } else {
        return 0;
    }
}


// get the selected student data for updating
/**
 * Summary of getStudentById
 * @param mixed $id
 * @param mixed $con
 * @return array|bool|int|null
 */
function getStudentById($id, $con)
{
    $sql = "SELECT * FROM student_tbl WHERE std_id='$id'";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) == 1) {
        $teacher_data = mysqli_fetch_assoc($result);
        return $teacher_data;
    } else {
        return 0;
    }
}

// get all the grades
/**
 * Summary of getAllGrades
 * @return array|int
 */
function getAllGrades()
{
    require '../../controls/connection.php';
    $sql = "SELECT * FROM grade_tbl";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) >= 1) {
        $students = mysqli_fetch_all($result);
        return $students;
    } else {
        return 0;
    }
}

// get all the grades
/**
 * Summary of getAllClasses
 * @return array|int
 */
function getAllClasses()
{
    require '../../controls/connection.php';
    $sql = "SELECT * FROM grade_class_tbl";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) >= 1) {
        $classes = mysqli_fetch_all($result);
        return $classes;
    } else {
        return 0;
    }
}

/**
 * Summary of getAllSubjects
 * @return array|int
 */
function getAllSubjects()
{
    require '../../controls/connection.php';
    $sql = "SELECT * FROM subject_tbl";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) >= 1) {
        $subjects = mysqli_fetch_all($result);
        return $subjects;
    } else {
        return 0;
    }
}

function getSelectedStudents($id)
{
    require '../../controls/connection.php';
    $sql1 = "SELECT grade_class_id FROM grade_class_tbl WHERE staff_id='$id'";
    $result1 = mysqli_query($con, $sql1);
    if (mysqli_num_rows($result1) == 1) {
        $row1 = mysqli_fetch_assoc($result1);
        $grade_class_id = $row1['grade_class_id'];
        $sql2 = "SELECT std_id FROM student_class_tbl WHERE grade_class_id='$grade_class_id'";
        $result2 = mysqli_query($con, $sql2);
        if (mysqli_num_rows($result2) > 0) {
            $students = mysqli_fetch_all($result2);
            return $students;
        } else {
            return 0;
        }
    }
}
