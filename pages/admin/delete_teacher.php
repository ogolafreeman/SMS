<?php
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['admin_role'])) {


    if ($_SESSION['role'] == 'Admin') {
        include '../../controls/connection.php';
        include '../../data/admin_operations.php';

        $id = $_GET['id'];
        if (removeTeacher($id, $con)) {
            $sm = "Successfully deleted a teacher";
            header("Location: view-all-teachers.php?success=$sm");
            exit;
        } else {
            $em = "Unknown error occurred";
            header("Location: view-all-teachers.php?error=$em");
            exit;
        }
    }
} else {
    header("Location:../../login.php");
    exit;
}
