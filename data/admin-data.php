<?php
function getFullNumOfStudents()
{
	//require_once '../controls/connection.php';
	$con = mysqli_connect('localhost', 'root', '', 'sms');
	$sql = "SELECT count(*) FROM student_tbl WHERE status='1'";
	if ($result = mysqli_query($con, $sql)) {
		$data = mysqli_fetch_assoc($result);
		$count = $data['count(*)'];
		return $count;
	}
	$con->close();
}

function getFullNumOfTeachers()
{
	//require_once '../controls/connection.php';
	$con = mysqli_connect('localhost', 'root', '', 'sms');
	$sql = "SELECT count(*) FROM teacher_tbl WHERE status='1'";
	if ($result = mysqli_query($con, $sql)) {
		$data = mysqli_fetch_assoc($result);
		$count = $data['count(*)'];
		return $count;
	}
	$con->close();
}

function getFullNumOfUsers()
{
	//require_once '../controls/connection.php';
	$con = mysqli_connect('localhost', 'root', '', 'sms');
	$sql = "SELECT count(*) FROM user_tbl";
	if ($result = mysqli_query($con, $sql)) {
		$data = mysqli_fetch_assoc($result);
		$count = $data['count(*)'];
		return $count;
	}
	$con->close();
}

function getFullNumOfClasses()
{
	//require_once '../controls/connection.php';
	$con = mysqli_connect('localhost', 'root', '', 'sms');
	$sql = "SELECT count(*) FROM grade_class_tbl";
	if ($result = mysqli_query($con, $sql)) {
		$data = mysqli_fetch_assoc($result);
		$count = $data['count(*)'];
		return $count;
	}
	$con->close();
}
