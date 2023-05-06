<?php
	include '../../controls/connection.php';
	include '../../data/admin_operations.php';
    $classes = getAllClasses();
    //print_r($classes);

    foreach ($classes as $class) {
    	$grade_id = $class[1];
    	$class_id = $class[2];
    	$year = $class[3];
    	$teacher = $class[4];
    	$currentYear = date("Y");
        $currentYear1 = date("Y")+1;

        $sql = "SELECT * FROM teacher_tbl WHERE teacher_id='$teacher'";
        $result = mysqli_query($con, $sql);
        if(mysqli_num_rows($result) == 1) {
        	$t = mysqli_fetch_assoc($result);
        	$teacher = $t['first_name'] ." ". $t['last_name'];

        	$sql2 = "SELECT grade_name FROM grade_tbl WHERE (grade_name LIKE '%$currentYear%' OR grade_name LIKE '%$currentYear1%') AND grade_id='$grade_id'";
	    	$result2 = mysqli_query($con, $sql2);
	    	if(mysqli_num_rows($result2) > 0) {
	    		$d = mysqli_fetch_assoc($result2);
	    		$grade_name = $d['grade_name'];
	    		$grade_array = explode("-", $grade_name);
	    		$grade_name = $grade_array[0];
	    		$grade_year = $grade_array[1];
	    		$grd = explode(" ", $grade_name);
	    		$g = $grd[1];
	    		$sec = $grd[2];

	    		$sql3 = "SELECT class_name FROM class_tbl WHERE class_id='$class_id'";
	    		$result3 = mysqli_query($con, $sql3);
	    		if(mysqli_num_rows($result3) > 0) {
	    			$d2 = mysqli_fetch_assoc($result3);
	    			$class_name = $d2['class_name'];

	    			if($_POST['choice'] == 1) {
		    			if($g <= 11 && $g >=1) {
				    		echo "<tr>
						    	<td>". $g."</td>
						    	<td> - </td>
						    	<td> ".$class_name." </td>
						    	<td>". $grade_year ."</td>
						    	<td>". $teacher ."</td>
					    	</tr>";
				    	} else {
				    		continue;
				    	}
		    		}else {
				    	if($g <= 13 && $g >=12) {
				    		echo "<tr>
						    	<td>". $g ."</td>
						    	<td> ". $sec ." </td>
						    	<td>".$class_name."</td>
						    	<td>". $grade_year ."</td>
						    	<td>". $teacher ."</td>
					    	</tr>";
				    	} else {
				    		continue;
				    	}
				    }
	    		}
	    	}
        }
    }
    //print_r($grade_name);
?>