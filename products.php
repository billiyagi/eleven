<?php require_once('system/templates/landing/header.php'); ?>

<?php require_once('system/templates/landing/navbar.php'); ?>

<main>
    <section class="bg-jumbotron position-relative" style="background-image: url(<?php echo assets('img/products-header.png'); ?>);">
        <div class="position-absolute top-0 bg-jumbotron-transparent w-100 h-100 text-light">
            <div class="d-flex flex-column justify-content-center align-items-center h-100 text-center">
                <div class="fs-1 eleven-font fw-bold">Fashionable disemua gaya unikmu.</div>
                <p class="fs-3 eleven-font">eleven style for everyone</p>
            </div>
        </div>
    </section>
    <section class="my-2 my-md-5">
        <div class="container p-4 p-md-5">
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Beranda</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Semua Produk</li>
                </ol>
            </nav>
            <div class="row gy-4">
                <?php foreach ($productsModel->getAll() as $product) : ?>
                    <div class="col-12 col-md-6 col-lg-4">
                        <a href="<?php echo BASE_URL_LANDING . 'product.php?id=' . $product->id; ?>" class="card border-dark-hover rounded-0">
                            <img src="<?php echo assets('uploads/' . $product->image); ?>" class="card-img-top rounded-0 img-fit" alt="..." height="400px">
                            <div class="card-body position-absolute bottom-0 bg-white w-100 text-dark px-2">
                                <h5 class="card-title m-0 fw-light pt-2">Rp. <?php echo toRupiah($product->harga_jual); ?></h5>
                                <hr class="my-2">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="fw-bold"><?php echo $product->nama; ?></div>
                                    <?php if (isset($_SESSION['userEleven'])) : ?>

                                        <?php if ($costumerCartModel->isProductSavedToCart($product->id, $_SESSION['userEleven']['id'])) : ?>
                                            <i class="fas fa-shopping-cart text-success"></i>
                                        <?php else : ?>
                                            <i class="fas fa-shopping-cart"></i>
                                        <?php endif; ?>

                                    <?php else : ?>
                                        <i class="fas fa-shopping-cart"></i>
                                    <?php endif; ?>
                                </div>
                                <small class="fw-light d-block mb-2"><?php echo excerpt($product->deskripsi, 50); ?></small>
                                <small class="badge bg-secondary rounded-0"><?php echo $product->tipe; ?></small>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</main>

<?php require_once('system/templates/landing/footer.php'); ?>