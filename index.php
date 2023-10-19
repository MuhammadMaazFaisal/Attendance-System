<?php
session_start();
if (isset($_SESSION['status']) && $_SESSION['user_access'] == 'Administrator') {
    include "include/header.php";
    include "include/navbar.php";
    include "include/sidebar.php";
    include "include/db_connection.php";
    ?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-5 mb-5">Dashboard</h1>
            <!-- <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
            </ol> -->
            <div class="row ml-auto">
                <div class="col-12 col-md-5 col-lg-4 mt-4">
                    <div class="card bg-primary text-white" style="width: 400px; height: 150px;">
                        <div class="card-body"><span class="h5">All Employees</span>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="all_users.php">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-12 col-md-5 col-lg-4 mt-4 ">
                    <div class="card bg-warning text-white">
                        <div class="card-body"><span class="h5">Add Employee</span>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="add_user.php">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div> -->
                <div class="col-12 col-md-5 col-lg-4 mt-4">
                    <div class="card bg-primary text-white" style="width: 400px; height: 150px;">
                        <div class="card-body"><span class="h5">Edit Employee</span>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="edit_user.php">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-5 col-lg-4 mt-4">
                    <div class="card bg-primary text-white" style="width: 400px; height: 150px;">
                        <div class="card-body"><span class="h5">Leaves</span>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="leave.php">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-5 col-lg-4 mt-5 ">
                    <div class="card bg-primary text-white" style="width: 400px; height: 150px;">
                        <div class="card-body"><span class="h5">Attendance Report</span>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="attendance_report.php">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-5 col-lg-4 mt-5">
                    <div class="card bg-primary text-white" style="width: 400px; height: 150px;">
                        <div class="card-body"><span class="h5">Adjustments</span>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="adjustment.php">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-5 col-lg-4 mt-5 ">
                    <div class="card bg-primary text-white" style="width: 400px; height: 150px;">
                        <div class="card-body"><span class="h5">Add Alert</span>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="alert.php">View Details</a>
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