<?php
include "include/header.php";
?>

<div id="preloader" class="preloader">
    <div class='inner'>
        <div class='line1'></div>
        <div class='line2'></div>
        <div class='line3'></div>
    </div>
</div>
<section class="fxt-template-animation fxt-template-layout33">
    <div class="fxt-content-wrap">
        <div class="fxt-heading-content">
            <div class="fxt-inner-wrap fxt-transformX-R-50 fxt-transition-delay-3">
                <div class="fxt-transformX-R-50 fxt-transition-delay-10">
                    <a href="" class="fxt-logo"><img src="img/esolace logo.png" alt="Logo"></a>
                </div>
                <div class="fxt-transformX-R-50 fxt-transition-delay-10">
                    <div class="fxt-middle-content">
                        <div class="fxt-sub-title">Welcome to</div>
                        <h1 class="fxt-main-title">Esolace Tech</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="fxt-form-content">
            <div class="fxt-main-form">
                <div class="fxt-inner-wrap fxt-opacity fxt-transition-delay-13">
                    <h2 class="fxt-page-title">Log In</h2>
                    <form>
                        <div class="form-group mt-4">
                            <label for="user_id" class="fxt-label">User Id</label>
                            <input type="text" id="user_id" class="form-control" name="user_id"
                                placeholder="Enter User Id" required="required">
                        </div>
                        <div class="form-group mb-5">
                            <label for="password" class="fxt-label">Password</label>
                            <input id="password" type="password" class="form-control" name="password"
                                placeholder="Enter Password" required="required">
                        </div>
                        <div class="form-group mb-3">
                            <button id="submit" class="fxt-btn-fill">Log in</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</section>
<?php
include "include/footer.php";
?>

<script>
let submit = document.getElementById("submit");
submit.addEventListener("click", function(e) {
    e.preventDefault();
    let user_id = document.getElementById("user_id").value;
    let password = document.getElementById("password").value;
    login(user_id, password);
})
</script>