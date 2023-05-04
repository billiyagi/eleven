<footer class="bg-dark">
    <div class="p-3 text-center text-light bg-dark">
        &copy; <?php echo date('Y') ?> Copyright <strong>eleven</strong> by <a href="https://billiyagi.space">Febry Billiyagi</a>
    </div>
</footer>

<!-- Menu Modal -->
<div id="menu" class="position-fixed top-0 bg-dark-transparent text-light w-100 h-100 menu-close">
    <div class="container p-3">
        <div class="d-flex justify-content-between">
            <img src="<?php echo assets('img/logo/eleven-light-logo.png'); ?>" alt="Eleven Light" class="img-brand">
            <span class="fs-1 fw-bold cursor-pointer" id="menuCloseBtn">&times;</span>
        </div>
        <div class="nav mt-4">
            <a href="<?php echo BASE_URL_LANDING; ?>" class="nav-link d-block w-100 fs-3 text-light mb-2 hover-bg-light">Home</a>
            <a href="<?php echo BASE_URL_LANDING . 'products.php'; ?>" class="nav-link d-block w-100 fs-3 text-light mb-2 hover-bg-light">Produk</a>
            <a href="<?php echo BASE_URL_LANDING . 'about.php'; ?>" class="nav-link d-block w-100 fs-3 text-light mb-2 hover-bg-light">Tentang</a>
        </div>
    </div>

    <div class="position-absolute bottom-0">
        <div class="container p-3 fs-6">
            <strong>eleven</strong> Created by <a href="http://billiyagi.space">Febry Billiyagi</a>
        </div>
    </div>
</div>

<!-- Modal Login -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content border-0">
            <div class="modal-body">
                <form action="#" method="post" id="signInForm" class="needs-validation" novalidate>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" name="signin_email" class="form-control" id="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="signin_password" id="password" class="form-control" required>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="#" class="btn btn-outline-dark rounded-0 border-3" data-bs-target="#signUpModal" data-bs-toggle="modal"><i class="fas fa-user-plus"></i> Daftar</a>
                        <button type="submit" name="user_signin" id="user_signin_btn" class="btn btn-outline-dark rounded-0 border-3"><i class="fas fa-sign-in-alt me-2"></i> Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Signup -->
<div class="modal fade" id="signUpModal" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content border-0">
            <div class="modal-body">
                <form action="#" method="post" id="signupForm" class="needs-validation" novalidate>
                    <div class="mb-3">
                        <div class="container-fluid px-0">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="first_name" class="form-label">Nama Depan</label>
                                    <input type="text" name="first_name" class="form-control" id="first_name" aria-describedby="firstNameFeedback" required>
                                    <div id="first_name_feedback">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="last_name" class="form-label">Nama Belakang</label>
                                    <input type="text" name="last_name" class="form-control" id="last_name" required>
                                    <div id="last_name_feedback">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" name="signup_email" class="form-control" id="signup_email" required>
                        <div id="signup_email_feedback"></div>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Username</label>
                        <input type="text" name="signup_username" class="form-control" id="signup_username" required>
                        <div id="signup_username_feedback"></div>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="signup_password" id="signup_password" class="form-control" required>
                        <div id="signup_password_feedback"></div>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="#" class="btn btn-outline-dark rounded-0 border-3" data-bs-target="#loginModal" data-bs-toggle="modal"><i class="fas fa-sign-in-alt me-2"></i> Login</a>
                        <button type="submit" name="user_signup" id="user_signup_btn" class="btn btn-outline-dark rounded-0 border-3">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Primary JS -->
<script src="<?php echo assets('js/eleven.js'); ?>"></script>
</body>

</html>
<?php destroyFlashValidation(); ?>