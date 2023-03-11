<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Student Management System</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/jquery-3.6.3.min.js"></script>
</head>

<body>

    <div class="main-wrap">
        <div class="box-container">
            <div class="img-box">
                <div class="fill">

                </div>
            </div>
            <div class="form-box">
                <div class="mid-container">
                    <h1>Welcome Back</h1>
                    <h6>Login to your account</h6>
                    <form action="" method="post" class="form">
                        <label for="username">Username</label><br>
                        <input type="text" name="username" id="username" placehoder="Your Email" autocomplete="off"><br><br>
                        <label for="password">Password</label><br>
                        <input type="password" name="password" id="password" placehoder="Password" autocomplete="off"><br><br>
                        <label for="role">Role</label><br>
                        <select>
                            <option value="0">-- Select who you are --</option>
                            <option value="Admin">Admin</option>
                            <option value="Teacher">Teacher</option>
                            <option value="Student">Student</option>
                        </select>

                        <button class="login" type="submit">Login</button>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="bootstrap/js/bootstrap.bundle.js"></script>
</body>

</html>