<?php

include '../../controls/connection.php';
$stream_id = $_POST['choice'];
$sql1 = "SELECT sub_id FROM al_subjects_tbl WHERE stream_id='$stream_id'";
$result1 = mysqli_query($con, $sql1);
echo "<thead> <tr> <th>Subjects</th> <th>Subject Order</th> </tr> </thead>";


if (mysqli_num_rows($result1) > 0) {
	echo "<tbody>";
	$n = mysqli_num_rows($result1);
	while ($data = mysqli_fetch_assoc($result1)) {
		$sub_id = $data['sub_id'];
		$sql2 = "SELECT sub_name FROM subject_tbl WHERE sub_id='$sub_id'";
		$result2 = mysqli_query($con, $sql2);
		$sub_data = mysqli_fetch_assoc($result2);
		$sub_name = $sub_data['sub_name'];

		echo '<tr>
				<td><input type="checkbox" name="subject[]" value="' . $sub_id . '" class="form-check-input"> ' . $sub_name . '<br></td>
				<td><select name="oder_id[][]" class="form-select form-select-sm text-center"><option value="0">-- Select Order --</option>';
		for ($i = 1; $i <= $n; $i++) {
			echo "<option value='$i, $sub_id'>$i</option>";
		}
		echo "</select></td></tr>";
	}
	echo "</tbody>";
}