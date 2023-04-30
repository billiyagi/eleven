<?php
require_once('../system/bootstrap.php');
require_once('../system/templates/client/header.php');
require_once('../system/templates/landing/navbar.php');
require_once('session_client.php');
?>

<main>
    <section>
        <div class="container">
            <div class="row my-5">
                <div class="col-md-3 pe-5 d-none d-md-block">
                    <?php require_once('../system/templates/client/side_menu.php') ?>
                </div>
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="fw-bold">Pesanan</span>
                                <a href="<?php echo BASE_URL_LANDING . 'products.php'; ?>" class="btn btn-primary">Buat Pesanan</a>
                            </div>
                        </div>
                        <div class="card-body overflow-auto" style="height: 750px;">

                            <!-- Pesanan -->
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <div class="mb-3 d-block"><strong><i class="fas fa-shopping-bag text-success"></i> Belanja</strong> 30 April 2023 - <span class="text-secondary text-lighter">PS/JHJK/H889AS</span></div>
                                            <div class="d-flex">
                                                <img src="<?php echo assets('img/designer-1'); ?>" alt="" class="order-client-thumbnail">
                                                <div class="ms-3">
                                                    <div class="fw-bold">Jaket kuning versity</div>
                                                    <small class="text-secondary">Ukuran: XL, 1 Barang</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 d-flex justify-content-between justify-content-md-center align-items-center mt-4 mt-md-0">
                                            <div class="m-0 me-md-3">
                                                <span class="d-block">Total Belanja</span>
                                                <strong>Rp 25.0000</strong>
                                            </div>
                                            <div class="d-flex justify-content-end">
                                                <a href="#" class="btn btn-outline-success">Lihat Detail</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Pesanan -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<?php require_once('../system/templates/client/mobile_menu.php') ?>
<?php require_once('../system/templates/landing/footer.php') ?>