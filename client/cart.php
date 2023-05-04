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
                            Keranjang Belanja
                        </div>
                        <div class="card-body overflow-auto" style="height: 450px;">
                            <?php if (empty($costumerCartModel->getAllByUserLogin($_SESSION['userEleven']['id']))) : ?>
                                <div class="w-100 h-100 d-flex justify-content-center align-items-center">
                                    <strong class="fs-3 text-secondary">Keranjang Kosong</strong>
                                </div>
                            <?php else : ?>
                                <div class="row">
                                    <?php foreach ($costumerCartModel->getAllByUserLogin($_SESSION['userEleven']['id']) as $cart) : ?>
                                        <div class="col-md-12">
                                            <div class="card mb-3">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="d-flex">
                                                                <img src="<?php echo assets('uploads/' . $cart->image); ?>" alt="" class="order-client-thumbnail">
                                                                <div class="ms-3">
                                                                    <div class="fw-bold"><?php echo $cart->nama; ?></div>
                                                                    <small class="text-secondary">Rp <?php echo toRupiah($cart->harga_jual); ?></small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 d-flex justify-content-end align-items-center mt-3">
                                                            <a href="<?php echo BASE_URL_LANDING . 'product.php?id=' . $cart->id; ?>" class="btn btn-success me-2">Buat Pesanan</a>
                                                            <form action="../system/request.php" method="post">
                                                                <input type="hidden" name="user_id" value="<?php echo $_SESSION['userEleven']['id']; ?>">
                                                                <input type="hidden" name="product_id" value="<?php echo $cart->id; ?>">
                                                                <button type="submit" name="remove_cart_client" class="btn btn-outline-danger">Hapus</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<?php require_once('../system/templates/client/mobile_menu.php') ?>
<?php require_once('../system/templates/landing/footer.php') ?>