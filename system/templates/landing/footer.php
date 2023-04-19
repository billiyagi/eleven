<footer class="bg-dark">
    <div class="container text-light text-center">
        <div class="nav justify-content-around">
            <a href="index.php" class="nav-link p-4 text-light">Beranda</a>
            <a href="products.php" class="nav-link p-4 text-light">Produk</a>
            <a href="reseller.php" class="nav-link p-4 text-light">Reseller</a>
            <a href="about.php" class="nav-link p-4 text-light">Tentang</a>
        </div>
        <p class="py-5 m-0">Sistem Website E-commerce bertema menjual pakaian dengan gaya desain yang unik.</p>
    </div>
    <div style="background-color: #000;" class="p-3 text-center text-light">
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
            <a href="index.php" class="nav-link d-block w-100 fs-3 text-light mb-2 hover-bg-light">Home</a>
            <a href="products.php" class="nav-link d-block w-100 fs-3 text-light mb-2 hover-bg-light">Produk</a>
            <a href="reseller.php" class="nav-link d-block w-100 fs-3 text-light mb-2 hover-bg-light">Reseller</a>
            <a href="about.php" class="nav-link d-block w-100 fs-3 text-light mb-2 hover-bg-light">Tentang</a>
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
                <form action="#" method="post">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" name="email" class="form-control" id="email" autofocus>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="#" class="btn btn-outline-dark rounded-0 border-3" data-bs-target="#signUpModal" data-bs-toggle="modal"><i class="fas fa-user-plus"></i> Daftar</a>
                        <a href="#" class="btn btn-outline-dark rounded-0 border-3"><i class="fas fa-sign-in-alt me-2"></i> Login</a>
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
                <form action="#" method="post">
                    <div class="mb-3">
                        <div class="container-fluid px-0">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="first_name" class="form-label">Nama Depan</label>
                                    <input type="text" name="first_name" class="form-control" id="first_name">
                                </div>
                                <div class="col-md-6">
                                    <label for="last_name" class="form-label">Nama Belakang</label>
                                    <input type="text" name="last_name" class="form-control" id="last_name">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" name="email" class="form-control" id="email">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="#" class="btn btn-outline-dark rounded-0 border-3" data-bs-target="#loginModal" data-bs-toggle="modal"><i class="fas fa-sign-in-alt me-2"></i> Login</a>
                        <a href="#" class="btn btn-outline-dark rounded-0 border-3">Submit</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

<!-- JQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<!-- Primary JS -->
<script src="<?php echo assets('js/eleven.js'); ?>"></script>
</body>

</html>