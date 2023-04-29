<?php
require_once('../../system/bootstrap.php');
require_once('../../system/templates/admin/header.php');
require_once('../../system/templates/admin/side_menu.php');
?>

<main id="adminMainContent">
    <div class="container-fluid px-3 py-4" style="height: 480px;">
        <div class="row">
            <div class="col-md-12">
                <a href="create.php" class="btn btn-primary mb-3">Tambah Kategori</a>
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $number = 1;
                                    foreach ($typesProductModel->getAll() as $typeProduct) : ?>
                                        <tr>
                                            <td><?php echo $number; ?></td>
                                            <td><?php echo $typeProduct->nama; ?></td>
                                            <td>
                                                <div class="d-flex">
                                                    <a href="update.php?id=<?php echo $typeProduct->id; ?>" class="btn btn-primary mx-3">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <form action="../../system/request.php" method="post" class="delete-form">
                                                        <input type="hidden" name="id" value="<?php echo $typeProduct->id; ?>">
                                                        <input type="hidden" name="type_delete">
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
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php require_once('../../system/templates/admin/footer.php') ?>