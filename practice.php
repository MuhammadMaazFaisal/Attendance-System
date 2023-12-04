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
            <form id="form" method="post" enctype="multipart/form-data">
                <div class="container-fluid">
                    <h1 class="mt-4">Estimation</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">Calculation</li>
                    </ol>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card mb-4 order-list">
                                <div class="gold-members p-4">
                                    <a href="#">
                                    </a>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Details</label>
                                            <div class="form-group mx-auto mt-0 mt-md-5 " style="width: 200px;">


                                                <input class="invisible" type="file" name="image" id="image" accept=".jpg, .png, .gif"><label id="label" for="image">+</label>
                                                <p id=num_images class="text-center mx-auto mt-2"></p>
                                            </div>
                                        </div>
                                        <div class="col-md-8 add_top_30">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Brand *</label>
                                                        <input id="brand" name="brand" type="text" class="form-control" placeholder="Brand" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Date *</label>
                                                        <input id="date" name="date" type="text" class="form-control" placeholder="Date" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Unit *</label>
                                                        <input id="unit" name="unit" type="text" class="form-control" placeholder="Unit" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Prices *</label>
                                                        <input id="price" name="price" type="text" class="form-control" placeholder="Price" required>
                                                    </div>
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
        </main>
    <footer class="py-4 mt-auto" style="opacity: 90%;
  background-color:#20205a ;">
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


<script>
document.addEventListener('DOMContentLoaded', function() {
    fetch('fetch_cement_data.php')
        .then(response => response.json())
        .then(data => {
            document.getElementById('brand').value = data.brand;
            document.getElementById('date').value = data.date;
            document.getElementById('unit').value = data.unit;
            document.getElementById('price').value = data.price;
        })
        .catch(error => console.error('Error:', error));
});
</script>


<?php
include "include/footer.php";

} else {
    header("location:login.php");
    exit();
}
?>