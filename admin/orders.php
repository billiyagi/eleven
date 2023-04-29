<?php
require_once('../system/bootstrap.php');
require_once('session_admin.php');

$titlePage = 'Orders of Products';
require_once('../system/templates/admin/header.php');
require_once('../system/templates/admin/side_menu.php');
?>

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
                                    <tr>
                                        <td>Tiger Nixon</td>
                                        <td>System Architect</td>
                                        <td>Edinburgh</td>
                                        <td>61</td>
                                        <td>2011-04-25</td>
                                        <td>$320,800</td>
                                        <td>$320,800</td>
                                        <td>$320,800</td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="#" class="btn btn-warning">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="#" class="btn btn-primary mx-3">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="" method="post">
                                                    <button type="submit" class="btn btn-danger">
                                                        <i class="fas fa-times-circle"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
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
<?php require_once('../system/templates/admin/footer.php') ?>