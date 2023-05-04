<?php
require_once('../system/bootstrap.php');
require_once('session_admin.php');

$titlePage = 'Orders of Products';
require_once('../system/templates/admin/header.php');
require_once('../system/templates/admin/side_menu.php');

if (isset($_GET['id'])) {
    $order = $orderModel->get($_GET['id']);
    $userCostumer = $userModel->get($order->user_id);
}
?>

<?php if (isset($order)) : ?>
    <main id="adminMainContent">
        <div class="container-fluid px-3 py-4">
            <div class="row">
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <span>Data Kostumer</span>
                            <a href="<?php echo BASE_URL_ADMIN . 'users.php?id=' . $userCostumer->ID; ?>" class="btn btn-secondary">Lebih lengkap</a>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-hover mb-0">
                                <tr>
                                    <th rowspan="2">Nama Lengkap</th>
                                </tr>
                                <tr>
                                    <td><?php echo $userCostumer->first_name . ' ' . $userCostumer->last_name; ?></td>
                                </tr>

                                <tr>
                                    <th rowspan="2">Email</th>
                                </tr>
                                <tr>
                                    <td><?php echo $userCostumer->email; ?></td>
                                </tr>

                                <tr>
                                    <th rowspan="2">No HP</th>
                                </tr>
                                <tr>
                                    <td><?php echo $order->no_hp; ?></td>
                                </tr>

                                <tr>
                                    <th rowspan="2">Alamat</th>
                                </tr>
                                <tr>
                                    <td><?php echo $order->alamat; ?></td>
                                </tr>


                                <tr>
                                    <th rowspan="2">Waktu Login Terakhir</th>
                                </tr>
                                <tr>
                                    <td><?php echo toDate('d, M Y', $userCostumer->last_login); ?></td>
                                </tr>

                                <tr>
                                    <th rowspan="2">Didaftarakan pada</th>
                                </tr>
                                <tr>
                                    <td><?php echo toDate('d, M Y', $userCostumer->created_at); ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <span>
                                Pesanan <strong>#<?php echo $order->kode; ?></strong>
                            </span>

                        </div>
                        <div class="card-body">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-4">
                                        <img src="<?php echo assets('uploads/' . $order->image); ?>" alt="Gambar Pesanan <?php echo $order->kode; ?>" class="w-100">
                                    </div>
                                    <div class="col-md-8 mt-5 mt-md-0">
                                        <strong class="fs-5 text-success"><?php echo strtoupper($order->product_name); ?></strong>
                                        <hr>
                                        <div class="d-flex justify-content-between align-items-center fw-lighter mb-1">
                                            <span>Jumlah</span>
                                            <span><?php echo $order->qty; ?></span>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center fw-lighter mb-1">
                                            <span>Ukuran</span>
                                            <span><?php echo $order->order_size; ?></span>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center mb-4 fw-bold mt-3">
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

                                        <?php if (!empty($order->catatan)) : ?>
                                            <div class="mt-5 d-block">
                                                <strong>Catatan</strong>
                                                <p><?php echo $order->catatan; ?></p>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end">
                        <a href="<?php echo BASE_URL_ADMIN . 'orders.php'; ?>" class="btn btn-primary mt-3">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </main>
<?php else : ?>

    <main id="adminMainContent">
        <div class="container-fluid px-3 py-4">
            <div class="row">
                <div class="col-md-12">
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
<?php endif; ?>
<?php require_once('../system/templates/admin/footer.php') ?>