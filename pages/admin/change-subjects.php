<?php
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['admin_role'])) {
	include '../../data/admin_operations.php';
	include '../../controls/connection.php';
	$grade_id = $_GET['grade_id'];
	$stream_id = $_GET['stream_id'];
	$year = $_GET['year'];
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
		<title>Change Subjects - Admin</title>
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
				<h1 class="mt-4">Change Subjects</h1>
				<ol class="breadcrumb mb-4">
					<!-- <li class="breadcrumb-item active">Welcome back, <b> <?= $_SESSION['admin_role'] ?> </b> !</li> -->
				</ol>

				<div class="container mt-3">
					<!-- <a href="teacher.php" class="btn btn-dark">Go Back</a><br><br> -->
					<a class='btn btn-primary' href='assign-to-class.php'>Go Back</a>
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

					<form action="../../data/change-subject-data.php?grade_id=<?= $grade_id ?>&stream_id=<?= $stream_id ?>&year=<?= $year ?>" method="post" class="shadow p-3  mt-4 form-w">

						<div class="mb-3">
							<label class="form-label">Grade</label>
							<?php
							include '../../controls/connection.php';
							$sql = "SELECT * FROM grade_tbl WHERE grade_id='$grade_id'";
							$result = mysqli_query($con, $sql);
							$ri = mysqli_fetch_assoc($result)
							?>
							<input type="text" name="grade" class="form-control" value="<?= "Grade " . $ri['grade_name'] ?>" required readonly>
						</div>
						<div class="mb-3">
							<label class="form-label">Year</label>
							<input type="text" name="year" class="form-control" value="<?= $year ?>" required readonly>
						</div>
						<div class="mb-3">
							<label class="form-label">Stream</label>
							<?php
							include '../../controls/connection.php';
							$sql = "SELECT * FROM al_subject_stream_tbl WHERE stream_id='$stream_id'";
							$result = mysqli_query($con, $sql);
							$ri = mysqli_fetch_assoc($result)
							?>
							<input type="text" name="stream" class="form-control" value="<?= $ri['stream_name'] ?>" required readonly>
						</div>

						<div class="mb-3">
							<label class="form-label">Subjects</label><br />
							<?php
							include '../../controls/connection.php';
							$sql1 = "SELECT sub_id FROM al_subjects_tbl WHERE stream_id='$stream_id'";
							$result1 = mysqli_query($con, $sql1);
							if (mysqli_num_rows($result1) > 0) {
								while ($data = mysqli_fetch_assoc($result1)) {
									$sub_id = $data['sub_id'];

									// to get the assigned subjects from the db
									$sql3 = "SELECT sub_id FROM grade_subject_tbl WHERE grade_id='$grade_id' AND sub_id='$sub_id' AND year='$year'";
									$result3 = mysqli_query($con, $sql3);
									$d = mysqli_fetch_assoc($result3);
									if (mysqli_num_rows($result3) > 0) {
										if ($d['sub_id'] == $sub_id) {
											$sql2 = "SELECT sub_name FROM subject_tbl WHERE sub_id='$sub_id'";
											$result2 = mysqli_query($con, $sql2);
											$sub_data = mysqli_fetch_assoc($result2);
											$sub_name = $sub_data['sub_name'];

											echo '<input type="checkbox" name="subject[]" value="' . $sub_id . '" checked> ' . $sub_name . '<br>';
										}
									} else {
										$sql2 = "SELECT sub_name FROM subject_tbl WHERE sub_id='$sub_id'";
										$result2 = mysqli_query($con, $sql2);
										$sub_data = mysqli_fetch_assoc($result2);
										$sub_name = $sub_data['sub_name'];

										echo '<input type="checkbox" name="subject[]" value="' . $sub_id . '" > ' . $sub_name . '<br>';
									}
								}
							}
							?>
						</div>

						<button type="submit" class="btn btn-warning" name="change">Change</button>
					</form>

				</div>



			</div>

			<script src="../../bootstrap/js/bootstrap.bundle.js"></script>
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