<?php
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['role'])) {
    require_once '../controls/connection.php';
    if (isset($_POST['update'])) {
        $id = $_GET['id'];
        $admission_no = $_POST['admission_no'];
        $full_name = $_POST['full_name'];
        $name_with_init = $_POST['name_with_init'];
        $address = $_POST['address'];
        $phone1 = $_POST['phone1'];
        $phone2 = $_POST['phone2'];
        $dob = $_POST['dob'];
        $email = $_POST['email'];
        $d_o_admission = $_POST['d_o_admission'];

        $current_date = date("Y-m-d"); // for date_updated

        $sql = "UPDATE student_tbl SET admission_no='$admission_no', full_name='$full_name', name_with_initials='$name_with_init',
                address='$address', phone_no_1='$phone1', phone_no_2='$phone2', dob='$dob', email='$email',
                d_o_admission='$d_o_admission', date_updated='$current_date'";
        if (mysqli_query($con, $sql)) {
            $sm = "Successfully updated!";
            header("Location: ../pages/admin/edit_students.php?success=$sm");
            exit;
        } else {
            $em = "Unknown error occurred";
            header("Location: ../pages/admin/edit_students.php?error=$em");
            exit;
        }
    }

    

} else {
    header("Location:../../login.php");
    exit;
}
