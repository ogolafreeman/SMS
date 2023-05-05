<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Log in</title>

  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
  <link rel='stylesheet' href="css/style.css">
  <!-- <script src="js/sweetalert2.all.min.js"></script> -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- <script src="sweetalert2.min.js"></script> -->
  <!-- <link rel="stylesheet" href="sweetalert2.min.css"> -->

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
            <a class="nav-link" aria-current="page" href="index.php">Home</a>
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

    <div class="row">


      <section class="vh-100" style="background-color: #4471b6">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-10">
              <div class="card" style="border-radius: 1rem;">
                <div class="row g-0">
                  <div class="col-md-6 col-lg-5 d-none d-md-block c1"></div>
                  <div class="col-md-6 col-lg-7 d-flex align-items-center">
                    <div class="card-body p-4 p-lg-5 text-black">

                      <form action="data/login-data.php" method="post">
                        <div class="d-flex align-items-center mb-3 pb-1">
                          <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                          <span class="h1 fw-bold mb-0">Login</span>
                        </div>

                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>

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
                          <label class="form-label" for="form2Example17">Username</label>
                          <input type="text" id="form2Example17" class="form-control form-control-lg" placeholder="JohnWick" required name="username" autocomplete="off" />
                        </div>

                        <div class="form-outline mb-4">
                          <label class="form-label" for="form2Example27">Password</label>
                          <input type="password" id="form2Example27" class="form-control form-control-lg" placeholder="##########" required name="password" autocomplete="off" />
                        </div>

                        <div class="col-6">

                          <!-- <div class="form-check">
                            <input class="form-check-input" type="checkbox" />
                            <label class="form-check-label" for="flexCheckDefault">
                              Remember Me
                            </label>
                          </div> -->
                        </div>

                        <br />

                        <div class="d-grid gap-2">
                          <button class="btn btn-success btn-lg btn-block" type="submit" name="login">Login</button>
                        </div>
                      </form>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>

  <?php include "inc/footer.php"; ?>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <script src="bootstrap/js/bootstrap.bundle.js"></script>
</body>

</html>