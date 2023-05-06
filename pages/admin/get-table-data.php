<?php
	include '../../controls/connection.php';
	include '../../data/admin_operations.php';
    $grades = getAllGrades();
    foreach ($grades as $grade) { 
	    $g = explode("-", $grade[1])[0];
	    $y = explode("-", $grade[1])[1];
	    $sec = explode(" ", $g)[2];
	    $g = explode(" ", $g)[1];

	    $sql = "SELECT first_name, last_name FROM teacher_tbl WHERE teacher_id='$grade[2]'";
	    $result = mysqli_query($con, $sql);
		$data = mysqli_fetch_assoc($result);


	    if($_POST['choice'] == 1) {
	    	if($g <= 11 && $g >=1) {
	    		echo "<tr>
			    	<td>". $grade[0]."</td>
			    	<td>". $g ."</td>
			    	<td> - </td>
			    	<td>". $y ."</td>
			    	<td>". $data['first_name'] ." ". $data['last_name'] ."</td>
		    	</tr>";
	    	} else {
	    		continue;
	    	}
	    } else {
	    	if($g <= 13 && $g >=12) {
	    		echo "<tr>
			    	<td>". $grade[0]."</td>
				    	<td>". $g ."</td>
				    	<td>". $sec ."</td>
				    	<td>". $y ."</td>
				    	<td>". $data['first_name'] ." ". $data['last_name'] ."</td>
			    	</tr>";
	    	} else {
	    		continue;
	    	}
	    }
	}
?>