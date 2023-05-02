<?php
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['role'])) {

    require_once '../controls/connection.php';
    if (isset($_POST['add'])) {
        $admission_no = $_POST['admission_no'];
        $full_name = $_POST['full_name'];
        $name_with_init = $_POST['name_with_init'];
        $address = $_POST['address'];
        $phone1 = $_POST['phone1'];
        $phone2 = $_POST['phone2'];
        $dob = $_POST['dob'];
        $email = $_POST['email'];
        $d_o_admission = $_POST['d_o_admission'];

        $current_date = date("Y-m-d"); // for date_added

        $sql1 = "SELECT * FROM student_tbl st INNER JOIN user_tbl ut ON 
        (st.admission_no = ut.admission_no) WHERE (st.admission_no = '$admission_no')";
        $result1 = mysqli_query($con, $sql1);
        if (mysqli_num_rows($result1) < 1) {
            $sql2 = "INSERT INTO student_tbl (admission_no, full_name, name_with_initials, address, phone_no_1, 
                    phone_no_2, dob, email, d_o_admission, date_added, status) VALUE
                    ('$admission_no', '$full_name', '$name_with_init', '$address', '$phone1', '$phone2',
                    '$dob', '$email', '$d_o_admission', '$current_date', '1')";

            if (mysqli_query($con, $sql2)) {
                $sql3 = "INSERT INTO user_tbl (username, password, role_id, admission_no) 
                         VALUES ('$admission_no', '" . password_hash($admission_no, PASSWORD_DEFAULT) . "', '5', '$admission_no')";
                if (mysqli_query($con, $sql3)) {
                    $sm = "As a new student, $name_with_init has been successfully registered!";
                    header("Location: ../pages/admin/add-students.php?success=$sm");
                    exit;
                } else {
                    $em = "Unknown error occurred";
                    header("Location: ../pages/admin/add-students.php?error=$em");
                    exit;
                }
            } else {
                $em = "Unknown error occurred";
                header("Location: ../pages/admin/add-students.php?error=$em");
                exit;
            }
        } else {
            $em = "$name_with_init already exist";
            header("Location: ../pages/admin/add-students.php?error=$em");
            exit;
        }
    }
} else {
    header("Location:../../login.php");
    exit;
}
