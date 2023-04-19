<?php require_once('system/templates/landing/header.php'); ?>

<?php require_once('system/templates/landing/navbar.php'); ?>

<main>
    <form action="" method="post">
        <section class="container my-5 pb-5">
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Products</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Yellow Jaket Versity</li>
                </ol>
            </nav>
            <div class="row">
                <div class="col-md-5">
                    <img src="<?php echo assets('img/hero.jpg'); ?>" alt="Produk" class="w-100">
                </div>
                <div class="col-md-7">
                    <div class="mb-3 mt-md-0 mt-5">
                        <h1 class="fs-1 fw-bold eleven-font">
                            Yellow versity jaket
                        </h1>
                        <span class="text-primary fs-5">
                            Rp. 750.000
                        </span>
                    </div>

                    <strong class="mb-2 d-block">Deskripsi</strong>
                    <div class="fw-light">
                        <p>- Muscle tee detail logo print dengan desain yang nyaman
                            - Warna putih
                            - Material poliester tidak transparan, ringan dan semi stretch</p>
                    </div>
                    <span><strong>Jenis: </strong>Jaket</span>
                    <hr>

                    <!-- Size -->
                    <strong class="mb-2 d-block">Ukuran</strong>
                    <div class="d-flex">
                        <div class="mb-3 me-3">
                            <input type="radio" name="size" id="S" class="size-button d-none">
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
                            <input type="radio" name="size" id="M" class="size-button d-none">
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
                            <input type="radio" name="size" id="L" class="size-button d-none">
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

                    <!-- Address
                    <div class="mb-3">
                        <label for="address" class="form-label fw-bold">Alamat</label>
                        <textarea class="form-control" id="address" name="address" rows="5" cols="30"></textarea>
                    </div> -->

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
                    <div class="row gy-4">
                        <div class="col-md-6">
                            <button class="btn btn-outline-secondary rounded-0 w-100 h-100 fs-5"><i class="fas fa-cart-plus"></i> Simpan Ke Keranjang</button>
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-dark rounded-0 w-100 h-100 fs-5"><i class="fas fa-dollar-sign"></i> Pesan</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>
</main>
<script>
    Swal.fire({
        title: 'Kamu belum login',
        text: 'Mohon login terlebih dahulu untuk melakukan pemesanan.',
        icon: 'warning',
        confirmButtonText: `Login`,
    }).then((result) => {
        if (result.isConfirmed) {
            $('#loginModal').modal('show');
        }
    })
</script>
<?php require_once('system/templates/landing/footer.php'); ?>