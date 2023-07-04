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
        <link rel="shortcut icon" href="../../Media/Richmond Colleg LOGO.png" type="image/x-icon">
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Exam Report - Student Portal</title>
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
                <h1 class="mt-4">Exam Report</h1>
                <ol class="breadcrumb mb-4"></ol>

                <div class="container mt-5">

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

                    <div action="show-marks.php" class="shadow p-3  mt-5 form-w">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Grade</label>
                                    <select name="grade" class="form-select gradeSelect" required>
                                        <?php
                                        include '../../controls/connection.php';
                                        $sql1 = "SELECT DISTINCT grade_id FROM al_marks_tbl almt INNER JOIN student_tbl st ON (almt.std_id = st.std_id) WHERE st.admission_no='" . $_SESSION['username'] . "'";
                                        $result1 = mysqli_query($con, $sql1);
                                        while ($row1 = mysqli_fetch_assoc($result1)) {
                                        ?>
                                            <option value="<?= $row1['grade_id'] ?>"><?= $row1['grade_id'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Term</label>
                                    <select name="term" class="form-select termSelect" required>
                                        <?php
                                        include '../../controls/connection.php';
                                        $sql1 = "SELECT DISTINCT term FROM al_marks_tbl almt INNER JOIN student_tbl st ON (almt.std_id = st.std_id) WHERE st.admission_no='" . $_SESSION['username'] . "'";
                                        $result1 = mysqli_query($con, $sql1);
                                        while ($row1 = mysqli_fetch_assoc($result1)) {
                                        ?>
                                            <option value="<?= $row1['term'] ?>"><?= $row1['term'] ?></option>
                                        <?php } ?>
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

                    <table class="table table-bordered mt-5" id='data'>
                    </table>
                </div>
            </div>

            <!-- footer -->
            <?php include '../footer.php'; ?>
        </div>
        </div>

        <script>
            $(document).ready(function() {
                $(".form").hide();
                $("#search").click(function(event) {
                    event.preventDefault();
                    $.ajax({
                        url: "get-marks-data.php",
                        type: "POST",
                        data: {
                            term: $(".termSelect option:selected").val(),
                            grade: $(".gradeSelect option:selected").val(),
                            admission_no: <?= $_SESSION['username'] ?>
                        },
                        success: function(data) {
                            $("#data").html(data);
                            $(".form").show();
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
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