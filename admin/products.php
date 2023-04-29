<?php
require_once('../system/bootstrap.php');
require_once('../system/templates/admin/header.php');
require_once('../system/templates/admin/side_menu.php');

if (isset($_GET['id'])) :
    $product = $productsModel->get($_GET['id']);
?>

    <main id="adminMainContent">
        <div class="container-fluid px-3 py-4">
            <div class="row">
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header border-0">
                            Thumbnail Produk
                        </div>
                        <div class="card-body">
                            <img src="<?php echo assets('uploads/' . $product->image); ?>" alt="Produk <?php echo $product->nama; ?>" class="w-100">
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header border-0">
                            Produk Detail
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-bordered table-hover mb-0">
                                <tr>
                                    <th rowspan="2">Kode</th>
                                </tr>
                                <tr>
                                    <td><?php echo $product->kode; ?></td>
                                </tr>

                                <tr>
                                    <th rowspan="2">Nama</th>
                                </tr>
                                <tr>
                                    <td><?php echo $product->nama; ?></td>
                                </tr>

                                <tr>
                                    <th rowspan="2">Harga</th>
                                </tr>
                                <tr>
                                    <td><?php echo $product->harga_jual; ?></td>
                                </tr>

                                <tr>
                                    <th rowspan="2">Harga Supplier</th>
                                </tr>
                                <tr>
                                    <td><?php echo $product->harga_beli; ?></td>
                                </tr>

                                <tr>
                                    <th rowspan="2">Stok</th>
                                </tr>
                                <tr>
                                    <td><?php echo $product->stok; ?></td>
                                </tr>

                                <tr>
                                    <th rowspan="2">Minimal stok tersedia</th>
                                </tr>
                                <tr>
                                    <td><?php echo $product->min_stok; ?></td>
                                </tr>

                                <tr>
                                    <th rowspan="2">Deskripsi</th>
                                </tr>
                                <tr>
                                    <td><?php echo $product->deskripsi; ?></td>
                                </tr>

                                <tr>
                                    <th rowspan="2">Tipe</th>
                                </tr>
                                <tr>
                                    <td><?php echo $product->tipe; ?></td>
                                </tr>

                                <tr>
                                    <th rowspan="2">Ukuran</th>
                                </tr>
                                <tr>
                                    <td><?php echo $product->ukuran; ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <a href="<?php echo BASE_URL_ADMIN . 'products.php'; ?>" class="btn btn-primary mt-4"><i class="fas fa-sign-out-alt"></i> Kembali</a>
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
                    <a href="products/create.php" class="btn btn-primary mb-3">Tambah Produk</a>
                    <a href="type/index.php" class="btn btn-secondary mb-3">Kategori Produk</a>
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="table table-striped" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode</th>
                                            <th>Produk</th>
                                            <th>Penjualan</th>
                                            <th>Pembelian</th>
                                            <th>Stok</th>
                                            <th>Kategori</th>
                                            <th>Ukuran</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $number = 1;
                                        foreach ($productsModel->getAll() as $product) : ?>
                                            <tr>
                                                <td><?php echo $number; ?></td>
                                                <td><?php echo $product->kode; ?></td>
                                                <td><?php echo $product->nama; ?></td>
                                                <td><?php echo $product->harga_jual; ?></td>
                                                <td><?php echo $product->harga_beli; ?></td>
                                                <td><?php echo $product->stok; ?></td>
                                                <td><?php echo $product->tipe; ?></td>
                                                <td><?php echo $product->ukuran; ?></td>
                                                <td>
                                                    <div class="d-flex">
                                                        <a href="products.php?id=<?php echo $product->id; ?>" class="btn btn-warning">
                                                            <i class="fas fa-eye"></i>
                                                        </a>
                                                        <a href="products/update.php?id=<?php echo $product->id; ?>" class="btn btn-primary mx-3">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <form action="../system/request.php" method="post" class="delete-form">
                                                            <input type="hidden" name="id" value="<?php echo $product->id; ?>">
                                                            <input type="hidden" name="product_delete">
                                                            <div class="btn btn-danger delete-btn">
                                                                <i class="fas fa-times-circle"></i>
                                                            </div>
                                                        </form>
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
                                            <th>Produk</th>
                                            <th>Penjualan</th>
                                            <th>Pembelian</th>
                                            <th>Stok</th>
                                            <th>Kategori</th>
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