<?php
require_once('../system/bootstrap.php');
require_once('../system/templates/client/header.php');
require_once('../system/templates/landing/navbar.php');
require_once('session_client.php');

if (isset($_GET['id'])) {
    $order = $orderModel->getByUserLogin($_SESSION['userEleven']['id'], $_GET['id']);
}
?>

<main>
    <section>
        <div class="container">
            <div class="row my-5">
                <div class="col-md-3 pe-5 d-none d-md-block">
                    <?php require_once('../system/templates/client/side_menu.php') ?>
                </div>
                <?php if (!empty($order)) : ?>
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span>Pesanan <strong>#<?php echo $order->kode; ?></strong></span>
                                    <a href="<?php echo BASE_URL_CLIENT . 'index.php'; ?>" class="btn btn-primary">Kembali</a>
                                </div>
                            </div>
                            <div class="card-body overflow-auto" style="height: 450px;">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <img src="<?php echo assets('uploads/' . $order->image); ?>" alt="Gambar Pesanan <?php echo $order->kode; ?>" class="w-100">
                                        </div>
                                        <div class="col-md-8 mt-5 mt-md-0">
                                            <strong class="fs-5 text-success"><?php echo strtoupper($order->product_name); ?><span class="text-dark">#<?php echo $order->kode; ?></span></strong>
                                            <hr>
                                            <div class="d-flex justify-content-between align-items-center mb-4 fw-bold">
                                                <strong>TOTAL HARGA (<?php echo $order->qty; ?> BARANG)</strong>
                                                <span>Rp <?php echo toRupiah($order->harga_jual * $order->qty); ?></span>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center fw-lighter mb-1">
                                                <span>Total Ongkos Kirim</span>
                                                <span>Rp 0 (Gratis)</span>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center fw-lighter mb-3">
                                                <span>Biaya Ansuransi Pengiriman</span>
                                                <span>Ditanggung Eleven</span>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center mb-3 fw-bold border p-2 mt-4">
                                                <strong>TOTAL BELANJA </strong>
                                                <span>Rp <?php echo toRupiah($order->harga_jual * $order->qty); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php else : ?>
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="fw-bold">Pesanan</span>
                                    <a href="<?php echo BASE_URL_LANDING . 'products.php'; ?>" class="btn btn-primary">Buat Pesanan</a>
                                </div>
                            </div>
                            <div class="card-body overflow-auto" style="height: 550px;">
                                <?php if (empty($orderModel->getAllByUserLogin($_SESSION['userEleven']['id']))) : ?>
                                    <div class="w-100 h-100 d-flex justify-content-center align-items-center">

                                        <strong class="fs-3 d-block text-secondary">Belum ada pesanan</strong>
                                    </div>
                                <?php else : ?>
                                    <?php foreach ($orderModel->getAllByUserLogin($_SESSION['userEleven']['id']) as $order) : ?>
                                        <!-- Pesanan -->
                                        <div class="card mb-3">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="mb-3 d-block"><strong><i class="fas fa-shopping-bag text-success"></i> Belanja</strong> <?php echo date("d M Y", strtotime($order->tgl_pemesanan)); ?> - <span class="text-secondary text-lighter"><?php echo $order->kode; ?></span></div>
                                                        <div class="d-flex">
                                                            <img src="<?php echo assets('uploads/' . $order->image); ?>" alt="" class="order-client-thumbnail">
                                                            <div class="ms-3">
                                                                <div class="fw-bold"><?php echo $order->product_name; ?></div>
                                                                <small class="text-secondary">Ukuran: <?php echo $order->order_size; ?>, <?php echo $order->qty; ?> Barang</small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 d-flex justify-content-between justify-content-md-end align-items-center mt-4 mt-md-0">
                                                        <div class="m-0 me-md-3">
                                                            <span class="d-block">Total Belanja</span>
                                                            <strong>Rp <?php echo toRupiah($order->harga_jual * $order->qty); ?></strong>
                                                        </div>
                                                        <div class="d-flex justify-content-end">
                                                            <a href="index.php?id=<?php echo $order->order_id; ?>" class="btn btn-outline-success">Lihat Detail</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Pesanan -->
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
</main>
<?php require_once('../system/templates/client/mobile_menu.php') ?>
<?php require_once('../system/templates/landing/footer.php') ?>