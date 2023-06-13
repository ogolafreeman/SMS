<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3" href="../../index.php"><img src="../../Media/Richmond Colleg LOGO.png" width="45"> SMS</a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
    <!-- Navbar Search-->
    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
        <div class="input-group">
            <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
            <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
        </div>
    </form>

    <!-- Navbar-->
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <span class="dropdown-item" title="User">
                    <?php
                    require '../../controls/connection.php';
                    $sql1 = "SELECT role_id FROM user_tbl WHERE username='" . $_SESSION['username'] . "'";
                    $result1 = mysqli_query($con, $sql1);
                    if (mysqli_num_rows($result1) <= 1) {
                        $data = mysqli_fetch_assoc($result1);
                        $role_id = $data['role_id'];

                        $sql2 = "SELECT role FROM user_role_tbl WHERE role_id='$role_id'";
                        $result2 = mysqli_query($con, $sql2);
                        $d = mysqli_fetch_assoc($result2);
                        $role = $d['role'];

                        if ($role == "Admin") {
                            echo "Admin";
                        } elseif ($role == "Principal" || $role == "Section Head" || $role == "Teacher") {
                            $sql3 = "SELECT first_name, last_name FROM staff_tbl WHERE nic='" . $_SESSION['username'] . "'";
                            $result3 = mysqli_query($con, $sql3);
                            $d = mysqli_fetch_assoc($result3);
                            echo $d['first_name'] . " " . $d['last_name'];
                        } else {
                            $sql3 = "SELECT name_with_initials FROM student_tbl WHERE admission_no='" . $_SESSION['username'] . "'";
                            $result3 = mysqli_query($con, $sql3);
                            $d = mysqli_fetch_assoc($result3);
                            echo $d['name_with_initials'];
                        }
                    } else {
                        echo "User";
                    }
                    ?>
                </span>
                <li>
                    <hr class="dropdown-divider" />
                </li>
                <li><a class="dropdown-item" href="#">Profile</a></li>
                <li><a class="dropdown-item" href="#!">Settings</a></li>
                <li><a class="dropdown-item" href="../../inc/logout.php">Logout</a></li>
            </ul>
        </li>
    </ul>

</nav>