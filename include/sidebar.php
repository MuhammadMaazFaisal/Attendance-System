<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Core</div>
                    <?php if ($_SESSION['user_access'] == "Administrator") {?>
                    <a class="nav-link" href="index.php">
                        <div class="sb-nav-link-icon"><i class="feather-home"></i></div>
                        Dashboard
                    </a>
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts"
                        aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="feather-user"></i></div>
                        Employees
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                        data-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="all_users.php">All Employees</a>
                            <a class="nav-link" href="add_user.php">Add Employee</a>
                            <a class="nav-link" href="edit_user.php">Edit Employee</a>
                        </nav>
                    </div>
                    <a class="nav-link" href="leave.php">
                        <div class="sb-nav-link-icon"><i class="feather-calendar"></i></div>
                        Leaves
                    </a>
                    <a class="nav-link" href="adjustment.php">
                        <div class="sb-nav-link-icon"><i class="feather-calendar"></i></div>
                        Adjustments
                    </a>
                    <a class="nav-link" href="attendance_report.php">
                        <div class="sb-nav-link-icon"><i class="feather-calendar"></i></div>
                        Attendance Report
                    </a>
                    <a class="nav-link" href="alert.php">
                        <div class="sb-nav-link-icon"><i class="feather-bell"></i></div>
                        Alerts
                    </a>
                    <?php }
if ($_SESSION['user_access'] == "Employee") {?>
                    <a class="nav-link" href="dashboard.php">
                        <div class="sb-nav-link-icon"><i class="feather-home"></i></div>
                        Dashboard
                    </a>
                    <a class="nav-link" href="my_profile.php">
                        <div class="sb-nav-link-icon"><i class="feather-user"></i></div>
                        My Profile
                    </a>
                    <a class="nav-link" href="my_leaves.php">
                        <div class="sb-nav-link-icon"><i class="feather-calendar"></i></div>
                        My Leaves
                    </a>
                    <a class="nav-link" href="my_attendance.php">
                        <div class="sb-nav-link-icon"><i class="feather-calendar"></i></div>
                        My Attendance
                    </a>
                    <a class="nav-link" href="user_adjustment.php">
                        <div class="sb-nav-link-icon"><i class="feather-calendar"></i></div>
                        My Adjustments
                    </a>
                    <a class="nav-link" href="user_attendance_report.php">
                        <div class="sb-nav-link-icon"><i class="feather-calendar"></i></div>
                        Attendance Report
                    </a>
                    <?php }?>
                </div>
            </div>
        </nav>
    </div>