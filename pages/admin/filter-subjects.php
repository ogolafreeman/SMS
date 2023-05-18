<?php

include '../../controls/connection.php';
$stream_id = $_POST['choice'];
$sql1 = "SELECT sub_id FROM al_subjects_tbl WHERE stream_id='$stream_id'";
$result1 = mysqli_query($con, $sql1);
if(mysqli_num_rows($result1) > 0){
	while($data = mysqli_fetch_assoc($result1)) {
		$sub_id = $data['sub_id'];
		$sql2 = "SELECT sub_name FROM subject_tbl WHERE sub_id='$sub_id'";
		$result2 = mysqli_query($con, $sql2);
		$sub_data = mysqli_fetch_assoc($result2);
		$sub_name = $sub_data['sub_name'];

		echo '<input type="checkbox" name="subject[]" value="' . $sub_id . '"> ' . $sub_name . '<br>';
	}
}


?>