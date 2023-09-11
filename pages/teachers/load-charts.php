<?php

include '../../controls/connection.php';
$grade = $_POST['grade'];
$query = $_POST['query'];
$sub_id = $_POST['subject'];

$sub_name = "";

$sql1 = "SELECT * FROM student_class_tbl sct INNER JOIN student_tbl st ON (sct.std_id = st.std_id) WHERE st.admission_no='$query'";
$result1 = mysqli_query($con, $sql1);
if (mysqli_num_rows($result1) == 1) {
    $row1 = mysqli_fetch_assoc($result1);
    $std_id = $row1['std_id'];

    $sql2 = "SELECT DISTINCT st.sub_name, almt.term, almt.marks FROM subject_tbl st INNER JOIN al_marks_tbl almt ON (st.sub_id = almt.sub_id) WHERE almt.std_id='$std_id' AND NOT almt.marks='' AND almt.sub_id='$sub_id' AND almt.grade_id='$grade'";
    $result2 = mysqli_query($con, $sql2);
    if (mysqli_num_rows($result2) > 0) {
        $marks_array = array();
        $term_array = array();
        while ($row2 = mysqli_fetch_assoc($result2)) {
            $sub_name = $row2['sub_name'];
            $term = $row2['term'];
            $marks = $row2['marks'];


            array_push($marks_array, $marks);
            array_push($term_array, $term);
        }

        $marks2 = json_encode($marks_array);
        $terms2 = json_encode($term_array);

?>

        <canvas id="line-chart"></canvas><br />/<script>
            new Chart(document.getElementById("line-chart"), {
                type: 'line',
                data: {
                    labels: <?php echo $terms2; ?>,
                    datasets: [{
                        data: <?php echo $marks2; ?>,
                        label: "Marks",
                        fill: false,
                        borderColor: '#36A2EB',
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true,
                            max: 100,
                            min: 0
                        }
                    }
                }
            });
        </script>

<?php
    } else {
        // raise an error -> no marks
    }
}
