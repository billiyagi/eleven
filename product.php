<?php require_once('system/templates/landing/header.php'); ?>
<?php require_once('system/templates/landing/navbar.php'); ?>
<?php

$product = $productsModel->get($_GET['id']);

if (!isset($_GET['id']) || empty($product)) {
    header('Location: ' . BASE_URL_LANDING);
}
?>

<main>
    <form action="system/request.php" method="post">
        <input type="hidden" name="user_id" value="<?php echo (isset($_SESSION['userEleven']['id'])) ? $_SESSION['userEleven']['id'] : ''; ?>">
        <input type="hidden" name="product_id" value="<?php echo $product->id; ?>">
        <section class="container my-3 my-md-5 pb-5 p-3 p-md-0">
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo BASE_URL_LANDING . 'products.php'; ?>">Products</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?php echo $product->nama; ?></li>
                </ol>
            </nav>
            <div class="row">
                <div class="col-md-5">
                    <img src="<?php echo assets('uploads/' . $product->image); ?>" alt="Produk" class="w-100">
                </div>
                <div class="col-md-7">
                    <div class="mb-3 mt-md-0 mt-5">
                        <h1 class="fs-1 fw-bold eleven-font">
                            <?php echo $product->nama; ?>
                        </h1>
                        <span class="text-primary fs-5">
                            Rp <?php echo toRupiah($product->harga_jual); ?>
                        </span>
                    </div>

                    <strong class="mb-2 d-block">Deskripsi</strong>
                    <div class="fw-light">
                        <?php echo $product->deskripsi; ?>
                    </div>
                    <span><strong>Jenis: </strong><?php echo $product->tipe; ?></span>
                    <hr>

                    <!-- Size -->
                    <strong class="mb-2 d-block">Ukuran</strong>
                    <div class="d-flex">
                        <div class="mb-3 me-3">
                            <input type="radio" name="size" id="S" class="size-button d-none" value="S">
                            <button type="button" class="mb-3 btn btn-outline-dark rounded-0 cursor-pointer">
                                <label for="S">
                                    <div class="fw-bold fs-4">
                                        S
                                    </div>
                                    <span>Small</span>
                                </label>
                            </button>
                        </div>
                        <div class="mb-3 me-3">
                            <input type="radio" name="size" id="M" class="size-button d-none" value="M">
                            <button type="button" class="mb-3 btn btn-outline-dark rounded-0 cursor-pointer">
                                <label for="M">
                                    <div class="fw-bold fs-4">
                                        M
                                    </div>
                                    <span>Medium</span>
                                </label>
                            </button>
                        </div>
                        <div class="mb-3 me-3">
                            <input type="radio" name="size" id="L" class="size-button d-none" value="L">
                            <button type="button" class="mb-3 btn btn-outline-dark rounded-0 cursor-pointer">
                                <label for="L">
                                    <div class="fw-bold fs-4">
                                        L
                                    </div>
                                    <span>Large</span>
                                </label>
                            </button>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="mb-3 me-3">
                            <input type="radio" name="size" id="XL" class="size-button d-none" value="XL">
                            <button type="button" class="mb-3 btn btn-outline-dark rounded-0 cursor-pointer">
                                <label for="XL">
                                    <div class="fw-bold fs-4">
                                        XL
                                    </div>
                                    <span>Extra Large</span>
                                </label>
                            </button>
                        </div>
                        <div class="mb-3 me-3">
                            <input type="radio" name="size" id="XXL" class="size-button d-none" value="XXL">
                            <button type="button" class="mb-3 btn btn-outline-dark rounded-0 cursor-pointer">
                                <label for="XXL">
                                    <div class="fw-bold fs-4">
                                        XXL
                                    </div>
                                    <span>Double Extra Large</span>
                                </label>
                            </button>
                        </div>
                    </div>

                    <div class="mb-5">
                        <strong class="mb-2 d-block">Pengiriman</strong>
                        <div class="border border-secondary p-2">
                            <div class="d-flex align-items-center mb-2">
                                <i class="fas fa-map-marker-alt me-4"></i>
                                <small class="d-block">Dikirim dari <strong>DKI Jakarta</strong></small>
                            </div>
                            <div class="d-flex align-items-center">
                                <i class="fas fa-shipping-fast me-3"></i>
                                <small class="d-block">Ekpedisi <strong>Sikilat</strong>, Regular (Gratis Ongkir)</small>
                            </div>
                        </div>
                    </div>

                    <!-- Ceheck Out -->
                    <strong class="d-block mb-2">Checkout</strong>
                    <?php if (isset($_SESSION['userEleven']) && $_SESSION['userEleven']['role'] == 1) : ?>
                        <div class="row gy-4">
                            <div class="col-md-12">
                                <button class="btn btn-dark rounded-0 w-100 h-100 fs-5">Hanya Costumer yang dapat membuat pesanan.</button>
                            </div>
                        </div>
                    <?php elseif (isset($_SESSION['userEleven']) && $_SESSION['userEleven']['role'] == 2) : ?>
                        <div class="row gy-4">
                            <div class="col-md-6">
                                <?php if ($costumerCartModel->isProductSavedToCart($product->id, $_SESSION['userEleven']['id'])) : ?>
                                    <button class="btn btn-success rounded-0 w-100 h-100 fs-5" name="remove_cart" title="Hapus dari keranjang"><i class="fas fa-check-circle"></i> Disimpan di Keranjang</button>
                                <?php else : ?>
                                    <button class="btn btn-outline-secondary rounded-0 w-100 h-100 fs-5" name="save_cart" title="Simpan ke keranjang"><i class="fas fa-cart-plus"></i> Simpan Ke Keranjang</button>
                                <?php endif; ?>
                            </div>
                            <div class="col-md-6">
                                <a href="#" class="btn btn-dark rounded-0 w-100 h-100 fs-5" data-bs-toggle="modal" data-bs-target="#confirmOrder"><i class="fas fa-dollar-sign"></i> Pesan</a>
                            </div>
                        </div>


                        <!-- Modal -->
                        <div class="modal fade" id="confirmOrder" tabindex="-1" aria-labelledby="confirmOrderLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content border-0">
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="phone" class="form-label">No Handphone (Ex: 08213456789)</label>
                                                    <input type="text" name="phone" id="phone" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="qty" class="form-label">Jumlah Pesanan</label>
                                                    <input type="number" name="qty" id="qty" class="form-control">
                                                </div>
                                            </div>
                                            <div class="mb-4">
                                                <label for="note" class="form-label">Catatan</label>
                                                <textarea name="note" id="note" cols="30" rows="7" class="form-control"></textarea>
                                            </div>
                                            <div class="col-12">
                                                <div class="row justify-content-md-end justify-content-center p-md-0">
                                                    <div class="col-md-4 p-md-0">
                                                        <button type="submit" name="order_create" class="btn btn-dark rounded-0 w-100 fs-5">Konfirmasi Pesanan</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php else : ?>
                        <div class="row gy-4">
                            <div class="col-md-12">
                                <div class="btn btn-dark rounded-0 w-100 h-100 fs-5">Login terlebih dahulu untuk membuat pesanan</div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    </form>
</main>

<?php echo getFlashMessage(); ?>

<?php if (!isset($_SESSION['userEleven'])) : ?>
    <script>
        setTimeout(function() {
            Swal.fire({
                title: 'Kamu belum login',
                text: 'Mohon login terlebih dahulu untuk melakukan pemesanan.',
                icon: 'warning',
                confirmButtonText: `Login`,
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#loginModal').modal('show');
                }
            });
        }, 4000);
    </script>
<?php endif; ?>
<?php require_once('system/templates/landing/footer.php'); ?>