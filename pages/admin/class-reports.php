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
        <link rel="shortcut icon"
            href="https://img.freepik.com/free-vector/hand-drawn-high-school-logo-template_23-2149689290.jpg?w=900&t=st=1694450465~exp=1694451065~hmac=7a936b09b3a1b26e48c21cff671f711ffc7577f0e79a5b62864237f7f0f81168"
            type="image/x-icon">
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Class Reports - Admin</title>
        <link href="../css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="../../js/jquery-3.6.3.min.js"></script>
    </head>

    <body class="sb-nav-fixed">

        <?php include '../top-navbar.php'; ?>
        <?php include 'left-side-bar.php'; ?>

        <div id="layoutSidenav_content">

            <!-- content goes here. do not remove any code -->

            <div class="container-fluid">
                <h1 class="mt-4">Class Reports</h1>
                <ol class="breadcrumb mb-4">
                    <!-- <li class="breadcrumb-item active">Welcome back, <b> <?= $_SESSION['role'] ?> </b> !</li> -->
                </ol>

                <div class="container mt-5">
                    <!-- <a href="teacher.php" class="btn btn-dark">Go Back</a><br><br> -->

                    <?php if (isset($_GET['success'])) { ?>
                        <script>
                            Swal.fire({
                                icon: 'success',
                                title: 'Done',
                                text: "<?= $_GET['success'] ?>"
                            })
                        </script>
                    <?php } ?>

                    <?php if (isset($_GET['error'])) { ?>
                        <script>
                            Swal.fire({
                                icon: 'warning',
                                title: 'Oops...',
                                text: "<?= $_GET['error'] ?>"
                            })
                        </script>
                    <?php } ?>

                    <form method="post" class="shadow p-3  mt-5 form-w" id="form">
                        <h3>Apply Filters</h3>
                        <hr>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label class="form-label">Stream</label>
                                    <select name="stream" class="form-select streamSelect" id='stream' required>
                                        <option value="">-- Select Stream --</option>
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
                            </div>

                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label class="form-label">Grade</label>
                                    <select name="grade" class="form-select gradeSelect" id="grade" required>
                                        <option value="">-- Select Grade --</option>
                                        <?php
                                        include '../../controls/connection.php';
                                        $currentYear = date("Y");
                                        $currentYear1 = date("Y") + 1;
                                        $sql = "SELECT * FROM grade_tbl";
                                        $result = mysqli_query($con, $sql);
                                        while ($ri = mysqli_fetch_assoc($result)) {
                                            ?>
                                            <option value="<?php echo $ri['grade_id']; ?>"><?php echo "Grade " . $ri['grade_name']; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label class="form-label">Class</label>
                                    <select name="class" class="form-select classSelect" id="classes" required>
                                        <option value="">-- Select Class --</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label class="form-label">A/L Year</label>
                                    <select name="year" class="form-select yearSelect" required>
                                        <option value="">-- Select Year --</option>
                                        <?php
                                        include '../../controls/connection.php';
                                        // $y = "";
                                        $sql = "SELECT DISTINCT year FROM student_class_tbl ORDER BY year ASC";
                                        $result = mysqli_query($con, $sql);
                                        if (mysqli_num_rows($result) > 0) {
                                            while ($ri = mysqli_fetch_assoc($result)) {
                                                $y = $ri['year'];
                                                ?>
                                                <option value="<?php echo $y; ?>"><?php echo $y; ?>
                                                </option>
                                            <?php }
                                        } else {
                                            echo "<option value=" . date("Y") . ">" . date("Y") . "</option>";
                                            echo "<option value=" . date("Y") + 1 . ">" . date("Y") + 1 . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label class="form-label">Term</label>
                                    <select name="term" class="form-select termSelect" required>
                                        <option value="">-- Select Grade --</option>
                                        <option value="1st Term">1st Term</option>
                                        <option value="2nd Term">2nd Term</option>
                                        <option value="3rd Term">3rd Term</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-info" name="show">Show</button>
                    </form>

                </div>

                <div class="container mt-5 cnts">
                    <h3>Filtered Results</h3>
                    <hr>
                    <div class="row">
                        <div class="col-md-3">
                            <h3>Grade: <span style="color: red" id="grade2"></span></h3>
                        </div>
                        <div class="col-md-3">
                            <h3>Class: <span style="color: red" id="class">ET - 2</span></h3>
                        </div>
                        <div class="col-md-3">
                            <h3>Term: <span style="color: red" id="term"></span></h3>
                        </div>
                        <div class="col-md-3">
                            <h3>A/L Year: <span style="color: red" id="year"></span></h3><br>
                        </div>
                    </div>

                    <form action="../../data/enter-marks.php" method='post' id="marksForm">
                        <div id='tableData'></div>
                        <input type="submit" name="save" class="btn btn-success" value="Save">
                    </form>

                </div>

            </div>

            <script src="../../bootstrap/js/bootstrap.bundle.js"></script>
            <script>
                $(document).ready(function () {
                    $(".cnts").hide();
                    $("#grade").change(function () {
                        $.ajax({
                            url: "get-class2.php",
                            type: "POST",
                            data: {
                                grade: $(this).children("option:selected").val()
                            },
                            success: function (data) {
                                $("#classes").html(data);
                            },
                            error: function (jqXHR, textStatus, errorThrown) {
                                console.log("Error: " + textStatus + " - " + errorThrown);
                            }
                        });
                    });

                    $(document).ready(function () {
                        // Add event listener to all number input fields
                        $('.number-input').on('input', function () {
                            var total = 0;

                            // Loop through all number input fields
                            $('.number-input').each(function () {
                                var value = parseFloat($(this).val());

                                // Check if the value is a valid number
                                if (!isNaN(value)) {
                                    total += value;
                                }
                            });

                            // Update the total
                            $('.tot-out').text(total);
                        });
                    });

                    $('#form').submit(function (event) {
                        event.preventDefault();
                        var g = $("select.gradeSelect").children("option:selected").val();
                        var s = $("select.streamSelect").children("option:selected").val();
                        var c = $("select.classSelect").children("option:selected").val();
                        var y = $("select.yearSelect").children("option:selected").val();
                        var t = $("select.termSelect").children("option:selected").val();
                        $.ajax({
                            url: "view-filterd-class-report.php",
                            type: "POST",
                            data: {
                                stream: s,
                                grade: g,
                                class: c,
                                year: y,
                                term: t
                            },
                            success: function (data) {
                                var class_ = $(".classSelect option:selected").text();
                                $(".cnts").show();
                                $("#grade2").text("Grade " + g);
                                $("#class").text(class_);
                                $("#term").text(t);
                                $("#year").text(y);
                                $("#tableData").html(data);
                            },
                            error: function (jqXHR, textStatus, errorThrown) {
                                console.log("Error: " + textStatus + " - " + errorThrown);
                            }
                        });
                    });
                });
            </script>

            <!-- footer -->
            <?php include '../footer.php'; ?>
        </div>
        </div>
        <script src="../js/scripts.js"></script>
    </body>

    </html>
<?php } else {
    header("Location:../../login.php");
    exit;
}
?>