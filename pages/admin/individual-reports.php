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
        <title>Exam Reports - Admin</title>
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
                <h1 class="mt-4">Exam Reports</h1>
                <ol class="breadcrumb mb-4"></ol>

                <div class="container mt-5">
                    <div class="shadow p-3  mt-5 form-w">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Search by Admission No.</label>
                                    <input type="text" id="admission_no" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Grade</label>
                                    <select name="grade" class="form-select gradeSelect" required></select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Term</label>
                                    <select name="term" class="form-select termSelect" required></select>
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
                // get-years.php
                $('#admission_no').keyup(function () {
                    var query = $(this).val();
                    if (query != '') {
                        $.ajax({
                            url: 'get-grades.php',
                            method: 'POST',
                            data: {
                                query: query
                            },
                            success: function (data) {
                                $('.gradeSelect').html(data);
                            }
                        });
                    }
                });
                $('#admission_no').keyup(function () {
                    var query = $(this).val();
                    if (query != '') {
                        $.ajax({
                            url: 'get-terms.php',
                            method: 'POST',
                            data: {
                                query: query
                            },
                            success: function (data) {
                                $('.termSelect').html(data);
                            }
                        });
                    }
                });
                $("#search").click(function (event) {
                    event.preventDefault();
                    $.ajax({
                        url: "filtered-marks-details.php",
                        type: "POST",
                        data: {
                            grade: $(".gradeSelect option:selected").val(),
                            term: $(".termSelect option:selected").val(),
                            query: $("#admission_no").val()
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