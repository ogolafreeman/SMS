<!DOCTYPE html>
<html>

<head>
  <link rel="icon" href="Company Logo.png" type="image/x-icon">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="login.css">
  <title>Login | Student Management System</title>
  <link rel="shortcut icon" href="Media/Richmond Colleg LOGO.png" type="image/x-icon">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>

  <!-- navbar -->
  <nav class="navbar navbar-expand-lg bg-body-tertiary" id='homeNav'>
    <div class="container-fluid">
      <a class="navbar-brand" href="#"><img src="Media/Richmond Colleg LOGO.png" width="40"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link " aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.php">About Us</a>
          </li>
        </ul>
        <ul class="navbar-nav me-right mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" href="login.php">Login</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container-fluid">
    <section class="h-100 gradient-form bg-color">
      <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-xl-10">
            <div class="card rounded-3 text-black">
              <div class="row g-0">
                <div class="col-lg-6">
                  <div class="card-body mx-md-4">

                    <div class="text-center">

                      <img class="image-company" src="Media/Richmond Colleg LOGO.png" alt="Logo Of The School">

                    </div>

                    <form action="data/login-data.php" method="POST">
                      <p class="mb-5">Please Login to Your Account</p>

                      <?php if (isset($_GET['error'])) { ?>
                        <!-- <div class='alert alert-danger' role='alert'>
                            <//?= $_GET['error'] ?>
                          </div> -->
                        <script>
                          Swal.fire({
                            icon: 'warning',
                            title: 'Oops...',
                            text: "<?= $_GET['error'] ?>"
                          })
                        </script>
                      <?php } ?>

                      <div class="form-outline mb-4">
                        <label class="form-label">Username</label>
                        <input type="text" class="form-control" placeholder="Username" autocomplete="off" name="username" />
                      </div>

                      <div class="form-outline mb-4">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" placeholder="Password" autocomplete="off" name="password" />
                      </div>

                      <div class="form-outline mb-4">
                        <label class="form-label">Role</label>
                        <select class="form-select" name="role">
                          <option value="">-- Select who you are --</option>
                          <option value="Admin">Administrator</option>
                          <option value="Principal">Principal</option>
                          <option value="Section Head">Section Head</option>
                          <option value="Teacher">Teacher</option>
                          <option value="Student">Student</option>
                        </select>
                      </div>

                      <div class="text-center pt-1  pb-1 p-4">
                        <button class="btn btn-block gradient-1 mb-3 text-bg-light col-6" type="submit" name="login">Login</button>
                        <br />
                        <a class="text-muted" href="about.php">About Us</a>
                      </div>



                    </form>

                  </div>
                </div>
                <div class="col-lg-6 d-flex ">
                  <div class="mx-lg-5">
                    <img src="Media/LogIn.JPG" alt="" style="width: 100%; height: 100%; margin-left: 39px;border-radius: 10px; margin-right:0;">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>


  <script src="bootstrap/js/bootstrap.min.js"></script>
  <script src="bootstrap/js/bootstrap.bundle.js"></script>

</body>

</html>