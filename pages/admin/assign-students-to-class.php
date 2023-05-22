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
        <title>Assign Students to Class - Admin</title>
        <link href="../css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- <script src="../../js/jquery-3.6.3.min.js"></script> -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>

    <body class="sb-nav-fixed">

        <?php include '../top-navbar.php'; ?>
        <?php include 'left-side-bar.php'; ?>

        <div id="layoutSidenav_content">

            <!-- content goes here. do not remove any code -->
            <div class="container-fluid">
                <h1 class="mt-4">Assign Students to Class</h1>
                <ol class="breadcrumb mb-4">
                    <!-- <li class="breadcrumb-item active">Welcome back, <b> <?= $_SESSION['role'] ?> </b> !</li> -->
                </ol>

                <!-- Your further code goes here. keep coding in this div -->
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
                            </ /?=$_GET['error'] ?>
                        </div> -->

                        <script>
                            Swal.fire({
                                icon: 'warning',
                                title: 'Oops...',
                                text: "<?= $_GET['error'] ?>"
                            })
                        </script>
                    <?php } ?>

                    <form action="../../data/student-assign-to-class.php" method="post" class="shadow p-3  mt-5 form-w">
                        <!-- <h3>Fill all the Data</h3> -->
                        <!-- <hr> -->

                        <div class="mb-3">
                            <label class="form-label">Section</label>
                            <select name="section" class="form-select" required>
                                <!-- <option value="">-- Select Grade --</option> -->
                                <?php
                                include '../../controls/connection.php';
                                $sql = "SELECT * FROM section_tbl";
                                $result = mysqli_query($con, $sql);
                                while ($ri = mysqli_fetch_assoc($result)) {
                                ?>
                                    <option value="<?php echo $ri['sec_id']; ?>"><?php echo "Grade " . $ri['sec_name']; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>

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

                        <!-- <div class="mb-3 stream">
                            <label class="form-label">Stream</label>
                            <select name="stream" class="form-select streamSelect" required>
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
                        </div> -->

                        <div class="mb-3">
                            <label class="form-label">Class</label>
                            <select name="grade" class="form-select classSelect" required>
                                <!-- <option value="">-- Select Grade --</option> -->
                                <?php
                                include '../../controls/connection.php';
                                $sql = "SELECT * FROM class_tbl";
                                $result = mysqli_query($con, $sql);
                                while ($ri = mysqli_fetch_assoc($result)) {
                                ?>
                                    <option value="<?php echo $ri['class_id']; ?>"><?php echo $ri['class_name']; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Year / A/L Year</label>
                            <select name="year" class="form-select yearSelect" required>
                                
                            </select>
                        </div>


                        <br/><hr>
                        <h4>Students</h4><br>

                        <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Admission No.</th>
                                <th scope="col">Full Name</th>
                                <th scope="col">Assign</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include '../../controls/connection.php';
                            $sql1 = "SELECT admission_no, full_name FROM student_tbl WHERE status='1' ORDER BY admission_no ASC";
                            $result1 = mysqli_query($con, $sql1);
                            if(mysqli_num_rows($result1) > 0) {
                                while($row = mysqli_fetch_assoc($result1)) {
                                    $admission_no = $row['admission_no'];
                                    $full_name = $row['full_name'];

                                    echo "<tr>
                                    <td>$admission_no</td>
                                    <td>$full_name</td>
                                    <td><input type='checkbox' value='$admission_no' name='std[]' /></td>
                                    </tr>";
                                }
                            } else { ?>
                                <div class="alert alert-info" role="alert">
                                    Empty!
                                </div>
                            <?php } ?>

                            ?>
                        </tbody>
                    </table>



                        <br/><button type="submit" class="btn btn-primary" name="add">Add</button>
                    </form>
                </div>
            </div><br />

            <!-- footer -->
            <?php include '../footer.php'; ?>
        </div>
        </div>

        <script type="text/javascript">
                $(document).ready(function() {
                    var year = <?php echo date("Y"); ?>;
                    $("select.yearSelect").html("<option value='" + year + "'>" + year + "</option>");
                    $("select.gradeSelect").change(function() {
                        var selected = $(this).children("option:selected").val();
                        // $("span.txt").text("Grade " + selected + " -");
                        if (Number(selected) <= 11) {
                            
                            $("select.yearSelect").html("<option value='" + year + "'>" + year + "</option>");
                        } else {
                            var year = <?php echo date("Y"); ?>;
                            var year1 = <?php echo date("Y") + 1; ?>;
                            var year2 = <?php echo date("Y") + 2; ?>;
                            $("select.yearSelect").html("<option value='" + year + "'>" + year + "</option> <option value='" + year1 + "'>" + year1 + "</option>  <option value='" + year2 + "'>" + year2 + "</option>");
                        }
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