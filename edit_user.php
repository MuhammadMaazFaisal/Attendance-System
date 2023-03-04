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
            <h1 class="mt-4">Edit Employee</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                <li class="breadcrumb-item active">Edit Employee</li>
            </ol>
            <div class="col-6 col-md-2 col-lg-2">
                <div class="form-group">
                    <label>Employee Name</label>
                    <div>
                        <select id="drop_down" class="custom-select">
                            <option>Employee Name</option>
                        </select>
                    </div>
                </div>
            </div>
            <form class="invisible" id="form" method="post" enctype="multipart/form-data">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card mb-4 order-list">
                                <div class="gold-members p-4">
                                    <a href="#">
                                    </a>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Profile Picture</label>
                                            <div class="form-group mx-auto mt-0 mt-md-5 " style="width: 200px;">
                                                <input class="invisible" type="file" name="image" id="image"
                                                    accept=".jpg, .png, .gif"><label id="label" for="image">+</label>
                                                <p id=num_images class="text-center mx-auto mt-2"></p>
                                            </div>
                                        </div>
                                        <div class="col-md-8 add_top_30">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Employee Name *</label>
                                                        <input id="employee_name" name="employee_name" type="text"
                                                            class="form-control" placeholder="First Name" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Gender *</label>
                                                        <div>
                                                            <select id="gender" name="gender" class="custom-select">
                                                                <option>Male</option>
                                                                <option>Female</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /row-->
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Department *</label>
                                                        <div>
                                                            <select id="department" name="department"
                                                                class="custom-select">
                                                                <option>Sales</option>
                                                                <option>Development</option>
                                                                <option>Graphics</option>
                                                                <option>HR</option>
                                                                <option>Accounts</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Designation *</label>
                                                        <div>
                                                            <select id="designation" name="designation"
                                                                class="custom-select">
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /row-->
                                            <div class="row">

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Shift *</label>
                                                        <div>
                                                            <select id="user_shift" name="user_shift"
                                                                class="custom-select">
                                                                <option>Full Time</option>
                                                                <option>Part Time</option>
                                                                <option>Remote</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Joining Date *</label>
                                                        <input id="joining_date" name="joining_date" type="text"
                                                            class="form-control" placeholder="Joining Date" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /row-->
                                            <div class="row">
                                                <div class="col-6">
                                                    <label for="time_in" class="form-label">Time In: *</label>
                                                    <input id="time_in" name="time_in" class="form-control" step="900"
                                                        type="time" ng-model="endTime" pattern="[0-9]*" value="--:--"
                                                        required />
                                                </div>
                                                <div class="col-6">
                                                    <label for="time_out" class="form-label">Time Out: *</label>
                                                    <input class="form-control" id="time_out" name="time_out" step="900"
                                                        type="time" ng-model="endTime" pattern="[0-9]*" value="--:--"
                                                        required />
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <!-- /row-->
                                    <div class="row mt-3">
                                        <h1>Personal Details</h1>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input id=email name=email type="email" class="form-control"
                                                    placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Contact Number</label>
                                                <input id="contact_number" name="contact_number" type="text"
                                                    class="form-control" placeholder="Contact Number">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Qualification</label>
                                                <input id="qualification" name="qualification" type="text"
                                                    class="form-control" placeholder="Qualification">
                                            </div>
                                        </div>

                                    </div>
                                    <!-- /row-->
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>CNIC</label>
                                                <input id="cnic" name="cnic" type="text" class="form-control"
                                                    placeholder="CNIC">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Date of Birth</label>
                                                <input id="date_of_birth" name="date_of_birth" type="text"
                                                    class="form-control" placeholder="Date of Birth">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Current Address</label>
                                                <input id="current_address" name="current_address" type="text"
                                                    class="form-control" placeholder="Current Address">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Martial Status</label>
                                                <div>
                                                    <select id="martial_status" name="martial_status"
                                                        class="custom-select">
                                                        <option>Single</option>
                                                        <option>Married</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row mt-5">
                                        <h1>User Access</h1>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>User Role</label>
                                                <div>
                                                    <select id="user_access" name="user_access" class="custom-select">
                                                        <option>Administrator</option>
                                                        <option>Employee</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Password *</label>
                                                <input id="password" name="password" type="text" class="form-control"
                                                    placeholder="Password" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>User Status</label>
                                                <div>
                                                    <select id="user_status" name="user_status" class="custom-select">
                                                        <option>Active</option>
                                                        <option>Inactive</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /row-->


                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-right mb-4">
                        <button id="submit" type="submit" class="btn btn-success">
                            <i class="feather-send"></i> SAVE
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </main>
    <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid">
            <div class="d-flex align-items-center justify-content-between small">
                <div class="text-muted">Copyright &copy; Your Website 2022</div>
                <div>
                    <a href="#">Privacy Policy</a>
                    &middot;
                    <a href="#">Terms &amp; Conditions</a>
                </div>
            </div>
        </div>
    </footer>
</div>

<?php
include "include/footer.php";

} else {
    header("location:login.php");
    exit();
}
?>
<script>
let department = document.getElementById('department');
$(document).ready(function() {
    get_designation(department.value);
});

department.addEventListener('change', function() {
    $("#designation").empty();
    get_designation(department.value);
});

let image = document.getElementById("image");
image.addEventListener("change", function() {
    let num_of_images = $("#image")[0].files.length;
    let num_images = document.getElementById("num_images");
    num_images.innerHTML = num_of_images + " Image Selected";
})
let user_id = "";
$(document).ready(function() {
    load_edit_user_page();
});

let drop_down = document.getElementById("drop_down");
drop_down.addEventListener("change", function() {
    edit_user_details(drop_down);
});


$("#form").on('submit', (function(e) {
    e.preventDefault();
    let form = new FormData(this);
    form.append("action", "edit_employee");
    form.append("user_id", user_id);
    edit_user(form);
}));
</script>


<style>
#label {
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 150%;
    cursor: pointer;
    width: 100px;
    height: 100px;
    border: solid 1px black;
    border-radius: 5px;
    object-fit: cover;
    margin: 0 auto;
}
</style>