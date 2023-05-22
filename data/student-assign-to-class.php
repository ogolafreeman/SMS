<?php
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['admin_role'])) {

	if(isset($_POST['add'])) {
		$std = $_POST['std'];

		foreach ($std as $s) {
			echo $s . " <br>";
		}
	}

} else {
    header("Location:../../login.php");
    exit;
}
?>