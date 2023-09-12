<?php
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['student_role'])) {
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <link rel="shortcut icon" href="https://img.freepik.com/free-vector/hand-drawn-pencil-high-school-logo_23-2149689302.jpg?w=900&t=st=1694527035~exp=1694527635~hmac=8e02c01f5752c7f5d7ff35f802f5c0943179870c4028ad3a81221ef9cc71300d" type="image/x-icon">
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Marks Analytics - Student Portal</title>
        <link href="../css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- <script src="../../js/jquery-3.6.3.min.js"></script> -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    </head>

    <body class="sb-nav-fixed">

        <?php include '../top-navbar.php'; ?>
        <?php include 'left-side-bar.php'; ?>

        <div id="layoutSidenav_content">

            <!-- content goes here. do not remove any code -->
            <div class="container-fluid">
                <h1 class="mt-4">Marks Analytics</h1>
                <ol class="breadcrumb mb-4"></ol>

                <div class="container mt-5">
                    <div class="shadow p-3  mt-5 form-w">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Grade</label>
                                    <select name="grade" class="form-select gradeSelect" required>
                                        <?php
                                        include '../../controls/connection.php';
                                        $sql1 = "SELECT DISTINCT grade_id FROM al_marks_tbl almt INNER JOIN student_tbl st ON (almt.std_id = st.std_id) WHERE st.admission_no='" . $_SESSION['username'] . "'";
                                        $result1 = mysqli_query($con, $sql1);
                                        if (mysqli_num_rows($result1) > 0) {
                                            while ($row1 = mysqli_fetch_assoc($result1)) {
                                                echo "<option value='" . $row1['grade_id'] . "'>" . $row1['grade_id'] . "</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Subject</label>
                                    <select name="term" class="form-select subSelect" required>
                                        <?php
                                        include '../../controls/connection.php';
                                        $sql1 = "SELECT * FROM student_class_tbl sct INNER JOIN student_tbl st ON (sct.std_id = st.std_id) WHERE st.admission_no='" . $_SESSION['username'] . "'";
                                        $result1 = mysqli_query($con, $sql1);
                                        if (mysqli_num_rows($result1) == 1) {
                                            $row1 = mysqli_fetch_assoc($result1);
                                            $std_id = $row1['std_id'];

                                            $sql2 = "SELECT DISTINCT st.sub_id, st.sub_name FROM subject_tbl st INNER JOIN al_marks_tbl almt ON (st.sub_id = almt.sub_id) WHERE almt.std_id='$std_id' AND NOT almt.marks=''";
                                            $result2 = mysqli_query($con, $sql2);
                                            if (mysqli_num_rows($result2) > 0) {
                                                while ($row2 = mysqli_fetch_assoc($result2)) {
                                                    echo "<option value='" . $row2['sub_id'] . "'>" . $row2['sub_name'] . "</option>";
                                                }
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <!-- <div class="col-md-5"> -->
                            <div class="mb-3">
                                <button class="btn btn-success" id="search">Search</button>
                            </div>
                            <!-- </div> -->
                        </div>
                    </div>
                </div>

                <div class="container mt-5">
                    <h3>Filtered Results</h3>
                    <hr>
                    <div id="data" class=""></div>
                </div>


            </div>

            <!-- footer -->
            <?php include '../footer.php'; ?>
        </div>
        </div>

        <script>
            $(document).ready(function () {
                $("#search").click(function (event) {
                    event.preventDefault();
                    $.ajax({
                        url: "load-charts.php",
                        type: "POST",
                        data: {
                            grade: $(".gradeSelect option:selected").val(),
                            admission: <?= $_SESSION['username'] ?>,
                            subject: $(".subSelect option:selected").val(),
                        },
                        success: function (data) {
                            $("#data").html(data);
                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            console.log("Error: " + textStatus + " - " + errorThrown);
                        }
                    });
                });
            });
        </script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="../js/scripts.js"></script>

    </body>

    </html>

<?php } else {
    header("Location:../../login.php");
    exit;
}
?>