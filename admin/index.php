<?php
require_once('../system/bootstrap.php');
require_once('session_admin.php');


$titlePage = 'Fashion Dashboard';
require_once('../system/templates/admin/header.php');
require_once('../system/templates/admin/side_menu.php');

?>

<main id="adminMainContent">

    <!-- Summary Data -->
    <div class="container-fluid px-3 py-4">
        <div class="row gy-4">
            <div class="col-lg-4">
                <div class="card border-0 rounded-4 shadow-sm" style="background-color: #fcc9c9;">
                    <div class="card-body">
                        <small>Total harga produk</small>
                        <strong class="d-block fs-3">Rp <?php echo toRupiah($productsModel->getTotalProductPrice()->totalProductPrice); ?></strong>

                        <div class="mt-3 d-flex justify-content-between align-items-center">
                            <div class="text-dark fw-bold btn btn-light">
                                Produk <span class="badge bg-primary ms-2"><?php echo count($productsModel->getAll()); ?></span>
                            </div>
                            <div class="text-dark fw-bold btn btn-light">
                                Kategori <span class="badge bg-secondary ms-2"><?php echo count($typesProductModel->getAll()); ?></span>
                            </div>
                            <a href="products.php" class="btn btn-light"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" style="width: 20px; height: 20px" class="pb-1">
                                    <path fill-rule="evenodd" d="M5.22 14.78a.75.75 0 001.06 0l7.22-7.22v5.69a.75.75 0 001.5 0v-7.5a.75.75 0 00-.75-.75h-7.5a.75.75 0 000 1.5h5.69l-7.22 7.22a.75.75 0 000 1.06z" clip-rule="evenodd" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card border-0 rounded-4 shadow-sm" style="background-color: #F9D0B6;">
                    <div class="card-body">
                        <small>Total harga pesanan</small>
                        <strong class="d-block fs-3">Rp <?php echo toRupiah($orderModel->getTotalOrderPrice()); ?></strong>

                        <div class="mt-3 d-flex justify-content-between align-items-center">
                            <div class="text-dark fw-bold btn btn-light">
                                Pesanan <span class="badge bg-info ms-2"><?php echo count($orderModel->getAll()); ?></span>
                            </div>
                            <a href="orders.php" class="btn btn-light"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" style="width: 20px; height: 20px" class="pb-1">
                                    <path fill-rule="evenodd" d="M5.22 14.78a.75.75 0 001.06 0l7.22-7.22v5.69a.75.75 0 001.5 0v-7.5a.75.75 0 00-.75-.75h-7.5a.75.75 0 000 1.5h5.69l-7.22 7.22a.75.75 0 000 1.06z" clip-rule="evenodd" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card border-0 rounded-4 shadow-sm" style="background: rgb(130,198,206); background: linear-gradient(29deg, rgba(130,198,206,0.76234243697479) 0%, rgba(108,193,114,0.7231267507002801) 100%);">
                    <div class="card-body">
                        <small>Costumer terdaftar</small>
                        <strong class="d-block fs-3"><?php echo count($userModel->getAll()); ?></strong>

                        <div class="mt-3 d-flex justify-content-between align-items-center">
                            <div class="text-dark fw-bold btn btn-light">
                                Administrator <span class="badge bg-warning ms-2"><?php echo $userModel->getCountAdmin()->admin; ?></span>
                            </div>
                            <a href="users.php" class="btn btn-light"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" style="width: 20px; height: 20px" class="pb-1">
                                    <path fill-rule="evenodd" d="M5.22 14.78a.75.75 0 001.06 0l7.22-7.22v5.69a.75.75 0 001.5 0v-7.5a.75.75 0 00-.75-.75h-7.5a.75.75 0 000 1.5h5.69l-7.22 7.22a.75.75 0 000 1.06z" clip-rule="evenodd" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid px-3 py-4 mb-5">
        <!-- Summary Product Order -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="fw-bold mb-3 m-0 p-0">Pesanan Terbaru</h5>
            <a href="#" class="btn btn-outline-dark rounded-0">Lihat Semua <i class="ms-2 fas fa-arrow-right"></i></a>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode</th>
                                        <th>Pelanggan</th>
                                        <th>Tanggal</th>
                                        <th>Email</th>
                                        <th>Qty</th>
                                        <th>Ukuran</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $number = 1;
                                    foreach ($orderModel->getAll() as $order) : ?>
                                        <tr>
                                            <td><?php echo $number; ?></td>
                                            <td><?php echo $order->kode; ?></td>
                                            <td><?php echo $order->nama; ?></td>
                                            <td><?php echo toDate('d, m Y', $order->tgl_pemesanan); ?></td>
                                            <td><?php echo $order->email; ?></td>
                                            <td><?php echo $order->qty; ?></td>
                                            <td><?php echo $order->order_size; ?></td>
                                            <td>
                                                <div class="d-flex">
                                                    <a href="orders.php?id=<?php echo $order->order_id; ?>" class="btn btn-warning">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php
                                        $number++;
                                    endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode</th>
                                        <th>Pelanggan</th>
                                        <th>Tanggal</th>
                                        <th>Email</th>
                                        <th>Qty</th>
                                        <th>Ukuran</th>
                                        <th>Aksi</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>  
            </div>
        </div>
    </div>
</main>
<?php require_once('../system/templates/admin/footer.php') ?>