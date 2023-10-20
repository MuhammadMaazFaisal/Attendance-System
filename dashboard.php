<?php
session_start();
if (isset($_SESSION['status']) && $_SESSION['user_access'] == 'Employee') {
    include "include/header.php";
    include "include/navbar.php";
    include "include/sidebar.php";
    include "include/db_connection.php";
    ?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-5 mb-5">Dashboard</h1>
            
            <div class="row ml-auto">
                <div class="col-12 col-md-5 col-lg-4 mt-4">
                    <div class="card text-white" style="height: 150px; background-color: rgb(170, 62, 152);">
                        <div class="card-body"><span class="h5">My Profile</span>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="my_profile.php">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-5 col-lg-4 mt-4">
                    <div class="card text-white" style="height: 150px; background-color: rgb(222, 180, 225);">
                        <div class="card-body"><span class="h5">Leaves</span>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="my_leaves.php">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-5 col-lg-4 mt-4 ">
                    <div class="card text-white" style="height: 150px; background-color: rgb(249, 206, 250);">
                        <div class="card-body"><span class="h5">Apply for Leave</span>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="my_leaves.php#leave-form">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-5 col-lg-4 mt-5">
                    <div class="card text-white" style="height: 150px; background-color: rgb(204, 100, 206);">
                        <div class="card-body"><span class="h5">Attendance</span>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="my_attendance.php">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-5 col-lg-4 mt-5">
                    <div class="card text-white" style="height: 150px; background-color: rgb(222, 98, 134);">
                        <div class="card-body"><span class="h5">Attendance Report</span>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="user_attendance_report.php">View
                                Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-5 col-lg-4 mt-5">
                    <div class="card text-white" style="height: 150px; background-color: rgb(147, 104, 183);">
                        <div class="card-body"><span class="h5">Apply for Adjustment</span>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="user_adjustment.php">View
                                Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
            </div>
    </main>
    <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid">
            <div class="d-flex align-items-center justify-content-between small">
                <div class="text-muted">Copyright &copy; 
                <a href="http://esolacetech.com/" target="_blank" style="color: #cd71f5;"><b>Esolace Tech</b>.</a>.</a>
                </div>
                <div>
                    <a href="#">Privacy Policy</a>
                    &middot;
                    <a href="#">Terms &amp; Conditions</a>
                </div>
            </div>
        </div>
    </footer>
</div>
</div>

<?php
include "include/footer.php";

} else {
    header("location:login.php");
    exit();
}
?>