    <header class="position-sticky top-0 bg-white-blur">
        <div class="container d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <div id="menuOpenBtn" class="d-md-none d-flex me-3 cursor-pointer">
                    <i class="fas fa-bars fs-4"></i>
                </div>
                <a href="<?php echo BASE_URL_LANDING; ?>"><img src="<?php echo assets('img/logo/eleven-dark-logo.png'); ?>" alt="Logo eleven" class="img-brand"></a>
                <div class="nav d-md-flex d-none">
                    <a href="<?php echo BASE_URL_LANDING; ?>" class="nav-link text-dark py-3">Beranda</a>
                    <a href="products.php" class="nav-link text-dark py-3">Produk</a>
                    <a href="reseller.php" class="nav-link text-dark py-3">Reseller</a>
                    <a href="about.php" class="nav-link text-dark py-3">Tentang</a>
                </div>
            </div>
            <div class="d-flex">

                <!-- Button trigger modal -->
                <?php if (isset($_SESSION['userEleven'])) : ?>
                    <?php if ($_SESSION['userEleven']['role'] == 1) : ?>
                        <div class="d-flex">

                        </div>
                    <?php elseif ($_SESSION['userEleven']['role'] == 2) : ?>
                        <div class="d-flex align-items-center">
                            <div class="dropdown">
                                <button class="btn btn-dark rounded-0 border-3 border-dark dropdown-toggle btn-eleven" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Hi, <?php echo $_SESSION['userEleven']['first_name']; ?>
                                </button>
                                <ul class="dropdown-menu pt-2 pb-0">
                                    <li><a class="dropdown-item" href="client/order.php">Pesanan</a></li>
                                    <li>
                                        <a class="dropdown-item mb-2" href="client/cart.php">
                                            <div class="d-flex justify-content-between align-items-center">
                                                Keranjang
                                                <span class="badge text-bg-primary">4</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <form action="system/request.php" method="post" class="dropdown-item p-0">
                                            <div class="d-flex justify-content-between">
                                                <a href="client/profile.php" class="d-block w-50 border-0 bg-secondary text-light py-2 px-3 text-decoration-none" style="border-bottom-left-radius: 3px;"><i class="fas fa-user-circle"></i> Profile</a>
                                                <button type="submit" name="user_logout" class="d-block w-50 border-0 bg-danger text-light py-2 px-3" style="border-bottom-right-radius: 3px;"><i class="fas fa-sign-out-alt"></i> Logout</button>
                                            </div>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php else : ?>
                    <a href="#" class="nav-link text-dark" data-bs-toggle="modal" data-bs-target="#loginModal">
                        <i class="fas fa-sign-in-alt"></i> Login
                    </a>
                <?php endif; ?>

            </div>
        </div>
    </header>