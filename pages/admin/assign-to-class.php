<?php
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['admin_role'])) {
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <link rel="shortcut icon" href="../../Media/Richmond Colleg LOGO.png" type="image/x-icon">
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Assign Subjects to Classes - Admin</title>
        <link href="../css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <script src="../../js/jquery-3.6.3.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>

    <body class="sb-nav-fixed">

        <?php include '../top-navbar.php'; ?>
        <?php include 'left-side-bar.php'; ?>

        <div id="layoutSidenav_content">

            <!-- content goes here. do not remove any code -->
            <div class="container-fluid">
                <h1 class="mt-4">Assign Subjects to Grades</h1>
                <!-- <ol class="breadcrumb mb-4"></ol> -->


                <div class="container mt-5">
                    <!-- <a href="teacher.php" class="btn btn-dark">Go Back</a><br><br> -->

                    <?php if (isset($_GET['success'])) { ?>
                        <!-- <div class='alert alert-success' role='alert'>
                            <?= $_GET['success'] ?>
                        </div> -->
                        <script>
                            Swal.fire({
                                icon: 'success',
                                title: 'Done',
                                text: "<?= $_GET['success'] ?>"
                            })
                        </script>
                    <?php } ?>

                    <?php if (isset($_GET['error'])) { ?>
                        <!-- <div class='alert alert-danger' role='alert'>
                            <?= $_GET['error'] ?>
                        </div> -->
                        <script>
                            Swal.fire({
                                icon: 'warning',
                                title: 'Oops...',
                                text: "<?= $_GET['error'] ?>"
                            })
                        </script>
                    <?php } ?>

                    <form action="../../data/assign-to-class-data.php" method="post" class="shadow p-3  mt-5 form-w">

                        <div class="mb-3">
                            <label class="form-label">Grade</label>
                            <select name="grade" class="form-select gradeSelect" required>
                                <!-- <option value="">-- Select Grade --</option> -->
                                <?php
                                include '../../controls/connection.php';
                                $sql = "SELECT * FROM grade_tbl";
                                $result = mysqli_query($con, $sql);
                                while ($ri = mysqli_fetch_assoc($result)) {
                                ?>
                                    <option value="<?php echo $ri['grade_name']; ?>"><?php echo "Grade " . $ri['grade_name']; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="mb-3 yearDiv">
                            <label class="form-label">Year / A/L Year</label>
                            <select name="year" class="form-select yearSelect" required>
                                <!-- <option value=""></option> -->
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Stream</label>
                            <select name="stream" class="form-select sectionSelect" required>
                                <!-- <option value="">-- Select Grade --</option> -->
                                <?php
                                include '../../controls/connection.php';
                                $sql = "SELECT * FROM al_subject_stream_tbl";
                                $result = mysqli_query($con, $sql);
                                while ($ri = mysqli_fetch_assoc($result)) {
                                ?>
                                    <option value="<?php echo $ri['stream_id']; ?>"><?php echo $ri['stream_name']; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <!-- <label class="form-label">Subjects</label> -->
                            <div>
                                <table class="table subs"></table>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" name="add">Add</button>

                    </form>

                    <br />
                    <h1 class="mt-4">Assigned Subjects</h1>

                    <table class="table">
                        <thead>
                            <tr>
                                <!-- <th scope="col">#</th> -->
                                <th scope="col">Grade</th>
                                <th scope="col">Year</th>
                                <th scope="col">Section</th>
                                <th scope="col">Assigned Subjects</th>
                                <th scope="col">Operations</th>
                            </tr>
                        </thead>
                        <tbody id="tableData">
                            <?php
                            $sub_arr = array();
                            $sql1 = "SELECT DISTINCT grade_id, stream_id,year year FROM grade_subject_tbl";
                            $result1 = mysqli_query($con, $sql1);
                            while ($row = mysqli_fetch_assoc($result1)) {
                                $grade_id = $row['grade_id'];
                                $stream_id = $row['stream_id'];
                                $year = $row['year'];
                                $sql4 = "SELECT grade_name FROM grade_tbl WHERE grade_id='$grade_id'";
                                $result4 = mysqli_query($con, $sql4);
                                $row4 = mysqli_fetch_assoc($result4);

                                $sql5 = "SELECT stream_name FROM al_subject_stream_tbl WHERE stream_id='$stream_id'";
                                $result5 = mysqli_query($con, $sql5);
                                $row5 = mysqli_fetch_assoc($result5);

                            ?>
                                <tr>
                                    <td><?php echo $row4['grade_name']; ?></td>
                                    <td><?php echo $year; ?></td>
                                    <td><?php echo $row5['stream_name']; ?></td>

                                    <?php
                                    $sql2 = "SELECT sub_id FROM grade_subject_tbl WHERE grade_id='" . $row['grade_id'] . "' AND stream_id='" . $row['stream_id'] . "' ORDER BY order_id ASC";
                                    $result2 = mysqli_query($con, $sql2);
                                    while ($row2 = mysqli_fetch_assoc($result2)) {
                                        array_push($sub_arr, $row2['sub_id']);
                                    }

                                    ?>
                                    <td>
                                        <?php foreach ($sub_arr as $sub) {
                                            $sql3 = "SELECT sub_name FROM subject_tbl WHERE sub_id='$sub'";
                                            $result3 = mysqli_query($con, $sql3);
                                            $row3 = mysqli_fetch_assoc($result3);
                                            echo "&#x2022;&nbsp;&nbsp;" . $row3['sub_name'] . "<br/>";
                                        }
                                        $sub_arr = array_diff($sub_arr, $sub_arr);
                                        ?>
                                    </td>
                                    <td><a class='btn btn-warning' name='edit' href='change-subjects.php?grade_id=<?= $grade_id ?>&stream_id=<?= $stream_id ?>&year=<?= $year ?>'>Change</a></td>
                                </tr>
                            <?php } ?>

                        </tbody>
                    </table>

                </div>


            </div>

            <script>
                $(document).ready(function() {
                    $(".yearDiv").hide();
                    $("select.sectionSelect").change(function() {
                        $.ajax({
                            url: "filter-subjects.php",
                            type: "POST",
                            data: {
                                choice: $("select.sectionSelect").children("option:selected").val(),
                            },
                            success: function(data) {
                                $(".subs").html(data);
                            },
                            error: function(jqXHR, textStatus, errorThrown) {
                                console.log("Error: " + textStatus + " - " + errorThrown);
                            }
                        });
                    });

                    $("select.gradeSelect").change(function() {
                        $.ajax({
                            url: "filter-assigned-subjects.php",
                            type: "POST",
                            data: {
                                grade: $("select.gradeSelect").children("option:selected").val(),
                            },
                            success: function(data) {
                                $("#tableData").html(data);
                            },
                            error: function(jqXHR, textStatus, errorThrown) {
                                console.log("Error: " + textStatus + " - " + errorThrown);
                            }
                        });
                    });

                    $("select.gradeSelect").change(function() {
                        $(".yearDiv").show();
                        var grade = $("select.gradeSelect").children("option:selected").val();
                        if (Number(grade) <= 11) {
                            $(".yearSelect").html("<option value=''>" +
                                <?php echo date("Y"); ?> + "</option>");
                        } else {
                            $(".yearSelect").html("<option value='" +
                                <?php echo date("Y"); ?> + "'>" +
                                <?php echo date("Y"); ?> + "</option><option value='" +
                                <?php echo date("Y") + 1; ?> + "'>" +
                                <?php echo date("Y") + 1; ?> + "</option><option value='" +
                                <?php echo date("Y") + 2; ?> + "'>" +
                                <?php echo date("Y") + 2; ?> + "</option>");
                        }
                    });
                });
            </script>

            <!-- footer -->
            <?php include '../footer.php'; ?>
        </div>
        </div>

        <!-- content goes here -->
        <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script> -->
        <script src="../js/scripts.js"></script>
        <script src="../../bootstrap/js/bootstrap.bundle.js"></script>
    </body>

    </html>

<?php } else {
    header("Location:../../login.php");
    exit;
}
?>