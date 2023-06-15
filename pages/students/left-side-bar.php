<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <!-- <div class="sb-sidenav-menu-heading">Core</div> -->
                    <a class="nav-link" href="student-dashboard.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>

                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts3" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fa fa-pencil" aria-hidden="true"></i></div>
                        Term Test
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseLayouts3" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="show-marks.php">View</a>
                            <a class="nav-link" href="#">Analytics</a>
                        </nav>
                    </div>

                    <div class="sb-sidenav-menu-heading">Addons</div>
                    <a class="nav-link" href="#">
                        <div class="sb-nav-link-icon"><i class="fa fa-comments" aria-hidden="true"></i></div>
                        Chat
                    </a>
                    <a class="nav-link" href="profile.php">
                        <div class="sb-nav-link-icon"><i class="fa fa-user" aria-hidden="true"></i></div>
                        Profile
                    </a>
                    <a class="nav-link" href="settings.php">
                        <div class="sb-nav-link-icon"><i class="fa fa-cogs" aria-hidden="true"></i></div>
                        Settings
                    </a>
                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Logged in as:</div>
                <b><?= $_SESSION['student_role'] ?></b>
            </div>
        </nav>
    </div>