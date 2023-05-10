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
        <title>Add Classes - Admin</title>
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
                <h1 class="mt-4">Add New Class</h1>
                <ol class="breadcrumb mb-4">
                    <!-- <li class="breadcrumb-item active">Welcome back, <b> <?= $_SESSION['admin_role'] ?> </b> !</li> -->
                </ol>

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

                    <form action="../../data/add-classes-data.php" method="post" class="shadow p-3  mt-5 form-w">
                        <!-- <h3>Fill all the Data</h3> -->
                        <!-- <hr> -->

                        <div class="mb-3">
                            <label class="form-label">Grade</label>
                            <select name="grade" class="form-select gradeSelect" required>
                                <!-- <option value="">-- Select Grade --</option> -->
                                <?php
                                include '../../controls/connection.php';
                                $currentYear = date("Y");
                                $currentYear1 = date("Y") + 1;
                                $sql = "SELECT * FROM grade_tbl";
                                $result = mysqli_query($con, $sql);
                                while ($ri = mysqli_fetch_assoc($result)) {
                                ?>
                                    <option value="<?php echo $ri['grade_name']; ?>"><?php echo "Grade " . $ri['grade_name']; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Year</label>
                            <select name="year" class="form-select year" required>

                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Class Name</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text txt" id="basic-addon1" name="class1"></span>
                                <input type="text" class="form-control" placeholder="Class name" aria-label="Username" aria-describedby="basic-addon1" name="class_name" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Class Teacher</label>
                            <select name="teacher" class="form-select" required>
                                <?php
                                include '../../controls/connection.php';
                                $sql = "SELECT * FROM teacher_tbl";
                                $result = mysqli_query($con, $sql);
                                while ($ri = mysqli_fetch_assoc($result)) {
                                ?>
                                    <option value="<?php echo $ri['teacher_id']; ?>"><?php echo $ri['first_name'] . " " . $ri['last_name']; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary" name="add">Add</button>
                    </form>

                </div>

            </div>

            <script type="text/javascript">
                $(document).ready(function() {
                    var year = <?php echo date("Y"); ?>;
                    $("select.year").html("<option value='" + year + "'>" + year + "</option>");
                    $("select.gradeSelect").change(function() {
                        var selected = $(this).children("option:selected").val();
                        $("span.txt").text("Grade " + selected + " -");
                        if (Number(selected) <= 11) {
                            var year = <?php echo date("Y"); ?>;
                            $("select.year").html("<option value='" + year + "'>" + year + "</option>");
                        } else {
                            var year1 = <?php echo date("Y"); ?>;
                            var year2 = <?php echo date("Y") + 1; ?>;
                            $("select.year").html("<option value='" + year1 + "'>" + year1 + "</option> <option value='" + year2 + "'>" + year2 + "</option>");
                        }
                    });
                });
            </script>


            <script src="../bootstrap/js/bootstrap.bundle.js"></script>
            <!-- footer -->
            <?php include '../footer.php'; ?>
        </div>
        </div>

        <!-- content goes here -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../js/scripts.js"></script>
    </body>

    </html>

<?php } else {
    header("Location:../../login.php");
    exit;
}
?>