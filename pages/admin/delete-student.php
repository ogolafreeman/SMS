<?php
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['admin_role'])) {


    if ($_SESSION['admin_role'] == 'Admin') {
        include '../../controls/connection.php';
        include '../../data/admin_operations.php';

        $id = $_GET['id'];
        if (removeStudent($id, $con)) {
            $sm = "Successfully deleted a student";
            header("Location: view-all-students.php?success=$sm");
            exit;
        } else {
            $em = "Unknown error occurred";
            header("Location: view-all-students.php?error=$em");
            exit;
        }
    }
} else {
    header("Location:../../login.php");
    exit;
}
