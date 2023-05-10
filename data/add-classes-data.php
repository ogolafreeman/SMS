<?php
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['admin_role'])) {

	require_once '../controls/connection.php';
	if (isset($_POST['add'])) {
		
	}
} else {
	header("Location: ../login.php");
	exit;
}
// raise an error
		// $em = "Class $class_name - $year already exist!";
		// header("Location: ../pages/admin/add-class.php?error=$em");
		// exit;

?>