<?php

include '../../controls/connection.php';
$grade_id = $_POST['grade'];

$grades_arr = array();
$sections_arr = array();
$sub_arr = array();
$sub_name = array();


$sql = "SELECT grade_id FROM grade_tbl WHERE grade_name='" . $_POST['grade'] . "'";
$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result) == 1) {
	$d = mysqli_fetch_assoc($result);
	$grade_id = $d['grade_id'];
}

$sql1 = "SELECT DISTINCT grade_id, stream_id,  year FROM grade_subject_tbl WHERE grade_id='$grade_id'";
$result1 = mysqli_query($con, $sql1);
while ($row = mysqli_fetch_assoc($result1)) {
	$grade_id = $row['grade_id'];
	$stream_id = $row['stream_id'];
	$year = $row['year'];
	$sql4 = "SELECT grade_name FROM grade_tbl WHERE grade_id='$grade_id'";
	$result4 = mysqli_query($con, $sql4);
	$row4 = mysqli_fetch_assoc($result4);
	$grade_name = $row4['grade_name'];

	$sql5 = "SELECT stream_name FROM al_subject_stream_tbl WHERE stream_id='$stream_id'";
	$result5 = mysqli_query($con, $sql5);
	$row5 = mysqli_fetch_assoc($result5);
	$stream_name = $row5['stream_name'];

	echo "<tr>
		<td>$grade_name</td>
    	<td>$stream_name</td>
    	<td>$year</td>
    	<td>";

	$sql2 = "SELECT sub_id FROM grade_subject_tbl WHERE grade_id='" . $row['grade_id'] . "' AND stream_id='" . $row['stream_id'] . "' ORDER BY order_id ASC";
	$result2 = mysqli_query($con, $sql2);
	while ($row2 = mysqli_fetch_assoc($result2)) {
		array_push($sub_arr, $row2['sub_id']);
	}

	foreach ($sub_arr as $sub) {
		$sql3 = "SELECT sub_name FROM subject_tbl WHERE sub_id='$sub'";
		$result3 = mysqli_query($con, $sql3);
		$row3 = mysqli_fetch_assoc($result3);
		$sub = $row3['sub_name'];
		echo "&#x2022;&nbsp;&nbsp;$sub<br/>";
	}


	echo "</td>
   		<td><a class='btn btn-warning' name='edit' href='change-subjects.php?grade_id=$grade_id?&stream_id=$stream_id'>Change</a></td>
    	  </tr>";

	$sub_arr = array_diff($sub_arr, $sub_arr);
}
