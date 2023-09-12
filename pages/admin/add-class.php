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
        <link rel="shortcut icon" href="https://img.freepik.com/free-vector/hand-drawn-pencil-high-school-logo_23-2149689302.jpg?w=900&t=st=1694527035~exp=1694527635~hmac=8e02c01f5752c7f5d7ff35f802f5c0943179870c4028ad3a81221ef9cc71300d" type="image/x-icon">
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
                                <!-- <input type="text" class="form-control" placeholder="Class name" aria-label="Username" aria-describedby="basic-addon1" name="class_name" required> -->
                                <select name="class_id" class="form-select" id="data" required>
                                </select>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Class Teacher</label>
                            <select name="teacher" class="form-select" required>
                                <?php
                                include '../../controls/connection.php';
                                // $sql1 = "SELECT role FROM user_role_tbl urt INNER JOIN user_tbl ut ON (ut.role_id = urt.role_id) WHERE (ut.nic='$nic')";
                                $sql1 = "SELECT * FROM staff_tbl WHERE status='1'";
                                $result1 = mysqli_query($con, $sql1);
                                if (mysqli_num_rows($result1) > 0) {
                                    while ($row1 = mysqli_fetch_assoc($result1)) {
                                        $staff_id = $row1['staff_id'];
                                        $nic = $row1['nic'];
                                        $name = $row1['first_name'] . " " . $row1['last_name'];
                                        $sql2 = "SELECT role FROM user_role_tbl urt INNER JOIN user_tbl ut ON (ut.role_id = urt.role_id) WHERE (ut.nic='$nic')";
                                        $result2 = mysqli_query($con, $sql2);
                                        if (mysqli_num_rows($result2) == 1) {
                                            $row2 = mysqli_fetch_assoc($result2);
                                            if ($row2['role'] != 'Admin' && $row2['role'] != 'Principal') {
                                                echo "<option value='$staff_id'>$name</option>";
                                            } else {
                                                continue;
                                            }
                                        } else {
                                            echo "<script>Swal.fire({icon: 'error', title: 'Oh no...', text: 'No Teachers!'});</script>";
                                        }
                                    }
                                } else {
                                    echo "<script>Swal.fire({icon: 'error', title: 'Oh no...', text: 'No Teachers!'});</script>";
                                }
                                ?>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary" name="add">Add</button>
                    </form>

                </div>

            </div>

            <script type="text/javascript">
                $(document).ready(function () {
                    var year = <?php echo date("Y"); ?>;
                    $("select.year").html("<option value='" + year + "'>" + year + "</option>");
                    $("select.gradeSelect").change(function () {
                        var selected = $(this).children("option:selected").val();
                        $("span.txt").text("Grade " + selected + " -");
                        if (Number(selected) <= 11) {
                            var year = <?php echo date("Y"); ?>;
                            $("select.year").html("<option value='" + year + "'>" + year + "</option>");
                        } else {
                            var year1 = <?php echo date("Y"); ?>;
                            var year2 = <?php echo date("Y") + 1; ?>;
                            var year3 = <?php echo date("Y") + 2; ?>;
                            $("select.year").html("<option value='" + year1 + "'>" + year1 + "</option> <option value='" + year2 + "'>" + year2 + "</option> <option value='" + year3 + "'>" + year3 + "</option>");
                        }

                        $.ajax({
                            url: "get-class-name.php",
                            type: "POST",
                            data: {
                                grade: selected
                            },
                            success: function (data) {
                                $("#data").html(data);
                            },
                            error: function (jqXHR, textStatus, errorThrown) {
                                console.log("Error: " + textStatus + " - " + errorThrown);
                            }
                        });

                    });
                    // get-class-name.php

                });
            </script>


            <script src="../bootstrap/js/bootstrap.bundle.js"></script>
            <!-- footer -->
            <?php include '../footer.php'; ?>
        </div>
        </div>

        <!-- content goes here -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
            crossorigin="anonymous"></script>
        <script src="../js/scripts.js"></script>
    </body>

    </html>

<?php } else {
    header("Location:../../login.php");
    exit;
}
?>