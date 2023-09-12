<?php
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['admin_role'])) {
	include '../../data/admin_operations.php';
	$subjects = getAllSubjects();
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
		<title>Add New Subjects - Admin</title>
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
				<h1 class="mt-4">Add New Subjects</h1>
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

					<form action="../../data/add-subject-data.php" method="post" class="shadow p-3  mt-5 form-w">
						<!-- <h3>Fill all the Data</h3> -->
						<!-- <hr> -->

						<div class="mb-3">
							<label class="form-label">Subject Name</label>
							<input type="text" name="sub_name" class="form-control" autocomplete="off" required>
						</div>

						<div class="mb-3">
							<label class="form-label">Subject Code</label>
							<input type="text" name="sub_code" class="form-control" autocomplete="off" required>
						</div>


						<button type="submit" class="btn btn-primary" name="add">Add</button>
					</form>
				</div>

				<!-- Show the subjects in the database -->

				<br />
				<h1 class="mt-4">Registered Subjects</h1>

				<div class="container mt-5">
					<?php if ($subjects) { ?>
						<table class="table">
							<thead>
								<tr>
									<th scope="col">#</th>
									<th scope="col">Subject Name</th>
									<th scope="col">Subject Code</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($subjects as $sub) { ?>
									<tr>
										<td scope="row">
											<?= $sub[0] ?>
										</td>
										<td>
											<?= $sub[2] ?>
										</td>
										<td>
											<?= $sub[1] ?>
										</td>
									</tr>
								<?php } ?>
							</tbody>
						</table>
					<?php } else { ?>
						<div class="alert alert-info" role="alert">
							Empty!
						</div>
					<?php } ?>
				</div>


			</div><br />


			<script src="../bootstrap/js/bootstrap.bundle.js"></script>

			<!-- footer -->
			<?php include '../footer.php'; ?>
		</div>
		</div>

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